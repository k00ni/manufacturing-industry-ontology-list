<?php

declare(strict_types=1);

function getContentOfRdfFile(string $link): string
{
    // ignore SSL problems in https-based connections
    $context = stream_context_create([
        'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        ]
    ]);

    return file_get_contents($link, false, $context);
}

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
