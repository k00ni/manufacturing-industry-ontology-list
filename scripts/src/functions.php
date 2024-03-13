<?php

declare(strict_types=1);

use Curl\Curl;
use sweetrdf\InMemoryStoreSqlite\Store\InMemoryStoreSqlite;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

function getContentOfRdfFile(string $link): string
{
    $cache = new FilesystemAdapter('ind_ontos', 3600, __DIR__.'/../../cache');

    $key = md5($link);

    // ask cache for entry
    // if there isn't one, run HTTP request and return response content
    return $cache->get($key, function(ItemInterface $item) use ($link): string  {
        $curl = new Curl();
        $curl->setConnectTimeout(3);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); // follow redirects
        curl_setopt($curl->curl, CURLOPT_SSL_VERIFYHOST, false); // ignore SSL errors (because of broken SSL-certificates)

        $curl->get($link);

        return $curl->rawResponse;
    });
}

function storeResultToAssocArray(array $result): array
{
    $arr = [];
    foreach ($result['result']['rows'] as $row) {
        // entry exists and is array
        if (isset($arr[$row['p']]) && is_array($arr[$row['p']])) {
            $arr[$row['p']][] = $row['o'];
        } elseif (isset($arr[$row['p']])) {
            $arr[$row['p']] = [$arr[$row['p']], $row['o']];
        } else {
            $arr[$row['p']] = $row['o'];
        }
    }

    return $arr;
}

function getCSVLineForOntology(
    string $rdfFileUrl,
    InMemoryStoreSqlite $store,
    string $format,
    array $knownNamespaces = []
): string {
    $result = $store->query('SELECT ?iri WHERE {?iri a owl:Ontology.}');

    if (1 == count($result['result']['rows'])) {
        $ontologyIRI = $result['result']['rows'][0]['iri'];

        $result = $store->query('SELECT ?p ?o WHERE {<'.$ontologyIRI.'> ?p ?o}');

        /**
         * Looks like:
         *
         * [
         *      "http://www.w3.org/1999/02/22-rdf-syntax-ns#type"] => "http://www.w3.org/2002/07/owl#Ontology",
         *      "http://www.w3.org/2002/07/owl#versionIRI"] => "http://emmo.info/emmo/1.0.0-beta/middle/units-extension"
         *      ...
         * ]
         */
        $ontologyData = storeResultToAssocArray($result);

        // contains data for CSV line in the end
        $dataArray = [];

        // title (e.g. dcterms:title)
        if (isset($ontologyData['http://purl.org/dc/terms/title'])) {
            $dataArray[] = $ontologyData['http://purl.org/dc/terms/title'];
        } elseif (isset($ontologyData['http://www.w3.org/2000/01/rdf-schema#label'])) {
            $dataArray[] = $ontologyData['http://www.w3.org/2000/01/rdf-schema#label'];
        } else {
            $dataArray[] = 'TODO no title property';
        }

        // is industry related
        $dataArray[] = 'TODO';

        // abbreviation
        $dataArray[] = 'Information not available';

        // abstract (e.g. dcterms:abstract), but only take first sentence
        $abstract = null;
        if (isset($ontologyData['http://purl.org/dc/terms/abstract'])) {
            $abstract = $ontologyData['http://purl.org/dc/terms/abstract'];
        } elseif (isset($ontologyData['http://purl.org/dc/terms/description'])) {
            $abstract = $ontologyData['http://purl.org/dc/terms/description'];
        } elseif (isset($ontologyData['http://www.w3.org/2000/01/rdf-schema#comment'])) {
            $abstract = $ontologyData['http://www.w3.org/2000/01/rdf-schema#comment'];
        }
        if (null != $abstract) {
            $abstract = substr($abstract, 0, strpos($abstract, '.')+1);
            $abstract = preg_replace('/\n|\n\r/smi', '', $abstract);
            $abstract = trim($abstract);
        }
        $dataArray[] = $abstract;

        // latest version
        $version = 'TODO';
        if (
            isset($ontologyData['http://www.w3.org/2002/07/owl#versionInfo'])
            && is_string($ontologyData['http://www.w3.org/2002/07/owl#versionInfo'])
        ) {
            $version = trim($ontologyData['http://www.w3.org/2002/07/owl#versionInfo']);
        }
        $dataArray[] = $version;

        // latest change
        $latestChange = 'TODO';
        if (isset($ontologyData['http://purl.org/dc/terms/modified'])) {
            $latestChange = $ontologyData['http://purl.org/dc/terms/modified'];
        }
        $dataArray[] = $latestChange;

        // project page
        $projectPage = 'TODO';
        if (isset($ontologyData['http://www.w3.org/2000/01/rdf-schema#seeAlso'])) {
            $projectPage = $ontologyData['http://www.w3.org/2000/01/rdf-schema#seeAlso'];
        }
        $dataArray[] = $projectPage;

        // ontology IRI
        $dataArray[] = $ontologyIRI;

        // turtle file
        if ('turtle' == $format) {
            $dataArray[] = '';
            $dataArray[] = $rdfFileUrl;
        } else { // RDF/XML
            $dataArray[] = $rdfFileUrl;
            $dataArray[] = '';
        }

        // dcterms:creator
        $creators = [];
        if (isset($ontologyData['http://purl.org/dc/terms/creator'])) {
            foreach ($ontologyData['http://purl.org/dc/terms/creator'] as $creator) {
                $creators[] = trim($creator);
            }
        }
        $dataArray[] = implode(',', $creators);

        // license
        $license = 'TODO';
        if (isset($ontologyData['http://purl.org/dc/terms/license'])) {
            $license = getLicenseShortcut($ontologyData['http://purl.org/dc/terms/license']);
        }
        $dataArray[] = $license;

        return '"'.implode('","', $dataArray).'"';
    } elseif (1 < count($result['result']['rows'])) {
        $knownNamespaces[] = $rdfFileUrl;
        $str = '';
        foreach ($result['result']['rows'] as $entry) {
            if ($entry['iri'] != $rdfFileUrl && false === in_array($entry['iri'], $knownNamespaces, true)) {
                $str .= getCSVLineForOntology($entry['iri'], $store, $format, $knownNamespaces).PHP_EOL;
            }
        }
        return $str;
    } else {
        // show error if no ontology instance was found.
        throw new Exception('No instance of owl:Ontology was found.');
    }
}

/**
 * For a given license URL it returns appropriate shortcut.
 *
 * Example: for https://creativecommons.org/licenses/by/4.0/legalcode it returns CC-BY 4.0
 */
function getLicenseShortcut(string $value): string
{
    if ('https://creativecommons.org/licenses/by/4.0/legalcode' == $value) {
        return 'CC-BY 4.0';
    } elseif ('https://creativecommons.org/licenses/by-sa/4.0/' == $value) {
        return 'CC-BY-SA 4.0';
    }

    return 'Information not available';
}

/**
 * @param string $type One of: turtle,xml
 *
 * @return array<string>
 */
function getNamespaceUriListUsedInRdfFile(string $rdfFileContent, string $type): array
{
    if ('turtle' == $type) {
        $regex = '/[@prefix]+\s+[a-z]+:\s*<(.*?)>/msi';
    } else { // == RDF/XML
        $regex = '/xmlns:[a-z]+="(.*?)"/smi';
    }

    $list = [];
    preg_match_all($regex, $rdfFileContent, $namespaceIRIs);
    if (isset($namespaceIRIs[1])) {
        foreach ($namespaceIRIs[1] as $iri) {
            $list[] = $iri;
        }
    }

    return $list;
}

/**
 * It assumes there is only one instance of owl:Ontology.
 * It returns a list of all IRIs referenced in related owl:import statements.
 *
 * @return array<string> List of IRIs used in owl:import statements.
 */
function getOwlImportIris(InMemoryStoreSqlite $store): array
{
    $list = [];

    $result = $store->query('SELECT ?s WHERE {?s a owl:Ontology.}');

    if (1 == count($result['result']['rows'])) {
        $ontologyUri = $result['result']['rows'][0]['s'];
        $importsResult = $store->query('SELECT ?import WHERE {<'.$ontologyUri.'> owl:imports ?import.}');

        foreach ($importsResult['result']['rows'] as $row) {
            $list[] = $row['import'];
        }
    }

    return $list;
}

/**
 * @return string|null If string, its one of: rdf,turtle
 */
function guessFormat(string $data): string|null
{
    $subStr = substr($data, 0, 1000);

    if (str_contains($subStr, '@prefix')) {
        return 'turtle';
    } elseif (str_contains($subStr, '<rdf:RDF xmlns=')) {
        return 'rdf';
    }

    return null;
}

/**
 * Checks if a given ontology IRI is already known, which means its either part of
 * the ontologies.csv or broken-links-redirects.csv.
 */
function isOntologyIriAlreadyKnown(string $ontologyIri): bool
{
    global $brokenLinksRedirects, $simplifiedOntologyList;

    $irisToCheck = array_merge(
        array_keys($simplifiedOntologyList),
        array_keys($brokenLinksRedirects),
    );

    if (
        in_array($ontologyIri, $irisToCheck, true)
        || in_array($ontologyIri.'/', $irisToCheck, true)
        || in_array($ontologyIri.'#', $irisToCheck, true)
        || in_array(str_replace('#', '', $ontologyIri), $irisToCheck, true) // IRI without # at the end
    ) {
        return true;
    } else {
        // also check file URI
        foreach ($simplifiedOntologyList as $entry) {
            if ($entry['rdfxml_file'] == $ontologyIri) {
                return true;
            } elseif ($entry['turtle_file'] == $ontologyIri) {
                return true;
            }
        }

        return false;
    }
}