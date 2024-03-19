<?php

declare(strict_types=1);

use Curl\Curl;
use quickRdf\DataFactory;
use quickRdfIo\RdfIoException;
use quickRdfIo\Util;
use sweetrdf\InMemoryStoreSqlite\Store\InMemoryStoreSqlite;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

function getContentOfRdfFile(string $link): string
{
    $cache = new FilesystemAdapter('ind_ontos', 0, __DIR__.'/../../cache');

    $key = md5($link);

    // ask cache for entry
    // if there isn't one, run HTTP request and return response content
    return $cache->get($key, function(ItemInterface $item) use ($link): string  {
        $curl = new Curl();
        $curl->setConnectTimeout(3);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); // follow redirects
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);

        $curl->get($link);

        return $curl->rawResponse;
    });
}

function getCSVLineForOntology(
    string $rdfFileUrl,
    InMemoryStoreSqlite $store,
    string $format
): string {
    list($ontologyIri, $ontologyData) = getOntologyDataAsArray($store);

    // contains data for CSV line in the end
    $dataArray = [];

    // title (e.g. dcterms:title)
    $title = null;
    foreach ([
        'http://purl.org/dc/elements/1.1/title',
        'http://purl.org/dc/terms/title',
        'http://www.w3.org/2000/01/rdf-schema#label',
    ] as $property) {
        if (isset($ontologyData[$property])) {
            $title = $ontologyData[$property];
            break;
        }
    }
    if (null !== $title) {
        $dataArray[] = $title;
    } else {
        $dataArray[] = 'TODO no title property';
    }

    // is industry related
    $dataArray[] = 'TODO';

    // abbreviation
    $dataArray[] = 'TODO';

    // abstract (e.g. dcterms:abstract), but only take first sentence
    $abstract = 'TODO';
    foreach ([
        'http://purl.org/dc/elements/1.1/description',
        'http://purl.org/dc/terms/abstract',
        'http://purl.org/dc/terms/description',
        'http://www.w3.org/2000/01/rdf-schema#comment',
    ] as $property) {
        if (isset($ontologyData[$property])) {
            $abstract = $ontologyData[$property];
            if (is_array($abstract)) {
                $abstract = implode('', $abstract);
            }

            if (false !== strpos($abstract, '.')) {
                $abstract = substr($abstract, 0, strpos($abstract, '.')+1);
            }
            $abstract = preg_replace('/\n|\n\r/smi', '', $abstract);
            $abstract = trim($abstract);
            break;
        }
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
        if (is_array($ontologyData['http://purl.org/dc/terms/modified'])) {
            $latestChange = implode('', $ontologyData['http://purl.org/dc/terms/modified']);
        } else {
            $latestChange = $ontologyData['http://purl.org/dc/terms/modified'];
        }
    }
    $dataArray[] = $latestChange;

    // project page
    $projectPage = 'TODO';
    foreach ([
        'http://www.w3.org/2000/01/rdf-schema#seeAlso'
    ] as $property) {
        if (isset($ontologyData[$property])) {
            if (is_array($ontologyData[$property])) {
                $projectPage = array_values($ontologyData[$property])[0];
            } else {
                $projectPage = $ontologyData[$property];
            }

            break;
        }
    }
    $dataArray[] = $projectPage;

    // ontology IRI
    $dataArray[] = $ontologyIri;

    // turtle file
    if ('turtle' == $format) {
        $dataArray[] = '';
        $dataArray[] = $rdfFileUrl;
    } else { // RDF/XML
        $dataArray[] = $rdfFileUrl;
        $dataArray[] = '';
    }

    // download location
    $dataArray[] = '';

    // creator
    $creators = [];
    foreach ([
        'http://purl.org/dc/elements/1.1/creator',
        'http://purl.org/dc/terms/creator',
        'http://xmlns.com/foaf/0.1/maker',
    ] as $property) {
        if (isset($ontologyData[$property])) {
            if (is_string($ontologyData[$property])) {
                $ontologyData[$property] = [$ontologyData[$property]];
            }
            foreach ($ontologyData[$property] as $creator) {
                $creators[] = trim($creator);
            }
        }
    }
    $dataArray[] = implode(',', $creators);

    // license
    $license = 'TODO';
    if (isset($ontologyData['http://purl.org/dc/terms/license'])) {
        if (isset(getValidLicenses()[$ontologyData['http://purl.org/dc/terms/license']])) {
            $license = getValidLicenses()[$ontologyData['http://purl.org/dc/terms/license']];
        } else {
            $license = 'TODO ('.$ontologyData['http://purl.org/dc/terms/license'].')';
        }
    }
    $dataArray[] = $license;

    return '"'.implode('","', $dataArray).'"';
}

function getValidLicenses(): array
{
    $list = [
        'https://www.apache.org/licenses/LICENSE-2.0' => 'Apache-2.0 license',
        'http://purl.org/NET/rdflicense/cc-by3.0' => 'CC-BY 3.0',
        'http://purl.org/NET/rdflicense/cc-by4.0' => 'CC-BY 4.0',
        'http://creativecommons.org/publicdomain/zero/1.0/' => 'CC0 1.0 DEED',
        'https://creativecommons.org/licenses/by/4.0/' => 'CC-BY 4.0',
        'https://creativecommons.org/licenses/by/4.0/legalcode' => 'CC-BY 4.0',
        'https://creativecommons.org/licenses/by-nc/4.0/' => 'CC-BY-NC 4.0',
        'https://creativecommons.org/licenses/by-sa/4.0/' => 'CC-BY-SA 4.0',
        'http://opensource.org/licenses/MIT' => 'MIT',
        'http://www.opendatacommons.org/licenses/pddl/1.0/' => 'PDDL 1.0',
    ];

    // licenses with no related URL
    $list[] = 'BSD-2-Clause';
    $list[] = 'BSD-3-Clause';
    $list[] = 'CC-BY 1.0';
    $list[] = 'CC-BY 2.0';
    $list[] = 'CC-BY-SA 3.0';
    $list[] = 'Custom license'; // if a custom license is used
    $list[] = 'GPL-1.0';
    $list[] = 'GPL-3.0';
    $list[] = 'Information not available';
    $list[] = 'OGC Document License Agreement';
    $list[] = 'W3C Document License (2023)';

    return $list;
}

/**
 * @param string $type One of: turtle,xml
 *
 * @return array<string>
 */
function getNamespaceUriListUsedInRdfFile(string $rdfFileContent, string $type): array
{
    if ('turtle' == $type) {
        $regex = '/[@prefix]+\s+[a-z\-]+:\s*<(.*?)>/msi';
    } else { // == RDF/XML
        $regex = '/xmlns:[a-z\-]+="(.*?)"/smi';
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

function getOntologyDataAsArray(InMemoryStoreSqlite $store): array
{
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
        return [$ontologyIRI, $arr];

    } elseif (1 < count($result['result']['rows'])) {
        throw new Exception('More than one instance of owl:Ontology was found.');
    } else {
        throw new Exception('No instance of owl:Ontology was found.');
    }
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

    if (
        str_contains($subStr, '@prefix')
        || str_contains($subStr, 'a owl:Ontology ;')
    ) {
        return 'turtle';
    } elseif (
        str_contains($subStr, '<rdf:RDF')
        || str_contains($subStr, '<?xml version="1.0"?>')
    ) {
        return 'rdf';
    }

    return null;
}

/**
 * It seems that empty() is not enough to check, if something is really empty.
 * This function takes care of the edge cases.
 *
 * @see https://stackoverflow.com/questions/718986/checking-if-the-string-is-empty
 */
function isEmpty(string|null $input): bool
{
    if (null === $input) {
        return true;
    } else { // its a string
        $input = trim($input);
        $input = (string) preg_replace('/\s/', '', $input);

        return 0 == strlen($input);
    }
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
        || in_array(str_replace('https://', 'http://', $ontologyIri), $irisToCheck, true) // https vs http
        || in_array(str_replace('http://', 'https://', $ontologyIri), $irisToCheck, true) // http vs https
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

function loadQuadsIntoInMemoryStore(string $rdfFileUrl): InMemoryStoreSqlite|null
{
    $maxQuadAmount = 100;

    // download file and read content
    $rdfFileContent = getContentOfRdfFile($rdfFileUrl);

    if (
        0 === strlen($rdfFileContent)
        || '404: Not Found' == $rdfFileContent
        || str_contains($rdfFileContent, '<html ')
    ) {
        echo PHP_EOL.$rdfFileUrl.' > no data or 404 > IGNORED';
        return null;
    } elseif (null === guessFormat($rdfFileContent)) {
        echo PHP_EOL.$rdfFileUrl.' > it neither RDF/XML nor Turtle data > IGNORED'.PHP_EOL;
        return null;
    }

    $relevantQuads = [];
    try {
        // parse a file
        $iterator = Util::parse($rdfFileContent, new DataFactory(), guessFormat($rdfFileContent));
        $i = 0;
        foreach ($iterator as $item) {
            $relevantQuads[] = $item;
            if ($i++ > $maxQuadAmount) {
                // only take a limit amount to avoid the script run too long
                break;
            }
        }
    } catch (RdfIoException $e) {
        echo PHP_EOL.' > Exception while parsing content for IRI ('.$rdfFileUrl.'): '.$e->getMessage();
        return null;
    }

    $store = InMemoryStoreSqlite::createInstance();
    $store->addQuads($relevantQuads);

    return $store;
}