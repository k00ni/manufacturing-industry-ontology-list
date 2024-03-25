<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

global $simplifiedOntologyList;
/**
 * Saves information about ontologies and their interrelations.
 *
 * @var array<string,array{abbreviation:string,rdfxml_file:string|null,turtle_file:string|null,ontology_iri:string}>
 */
$simplifiedOntologyList = [];

// load CSV file and build simplified ontology list
foreach (array_map('str_getcsv', file(__DIR__.'/../../ontologies.csv')) as $line => $entry) {
    if (0 == $line) {
        continue;
    }

    // abbreviation
    $abbreviation = strtolower($entry[2]);
    $abbreviation = str_replace('-', '', $abbreviation);

    // ontology IRI
    $ontologyIRI = $entry[7];

    // related RDF file(s)
    $rdfXmlFile = isEmpty($entry[8]) ? '' : $entry[8];
    $turtleFile = isEmpty($entry[9]) ? '' : $entry[9];

    $simplifiedOntologyList[$ontologyIRI] = [
        'abbreviation' => $abbreviation,
        'rdfxml_file' => $rdfXmlFile,
        'turtle_file' => $turtleFile,
        'download_location' => $entry[10],
        'ontology_iri' => $ontologyIRI,
    ];
}

global $brokenLinksRedirects;
/**
 * Build a simple array which contains information about broken links and redirects.
 *
 * @var array<string,array{url:string,comment:string}>
 */
$brokenLinksRedirects = [];

// load CSV file and build simplified ontology list
foreach (array_map('str_getcsv', file(__DIR__.'/../../broken-links-redirects.csv')) as $line => $entry) {
    $brokenLinksRedirects[$entry[0]] = [
        'url' => $entry[0],
        'comment' => (string) $entry[1],
    ];
}