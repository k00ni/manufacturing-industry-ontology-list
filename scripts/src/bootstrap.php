<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

global $simplifiedOntologyList;
/**
 * Saves information about ontologies and their interrelations.
 *
 * There are some predefined entries which do point to either no valid ontologies or redirect to correct URLs.
 *
 * @var array<string,array{
 *  abbreviation:string,
 *  key:string,
 *  rdfxml_file:string|null,
 *  turtle_file:string|null,
 *  ontology_iri:string,
 *  ignore_it:bool
 * }>
 */
$simplifiedOntologyList = require __DIR__.'/simplified-ontology-list.php';

// load CSV file and build simplified ontology list
foreach (array_map('str_getcsv', file(__DIR__.'/../../ontologies.csv')) as $line => $entry) {
    if (0 == $line) {
        continue;
    }

    // build line with entry ID and label
    $key = strtolower($entry[0]);
    $key = str_replace([' ', '.', ':', ',', '-'], '_', $key);

    // abbreviation
    $abbreviation = strtolower($entry[2]);
    $abbreviation = str_replace('-', '', $abbreviation);

    // related RDF file
    $ontologyIRI = $entry[7];
    if (
        false === str_starts_with($entry[7], 'http')
    ) {
        // if ontology IRI isn't starting with http, therefore its not an URI
        // in this case use RDF file instead
        $ontologyIRI = $entry[6];
    }

    // related RDF file(s)
    $rdfXmlFile = empty($entry[8]) ? '' : $entry[8];
    $turtleFile = empty($entry[9]) ? '' : $entry[9];

    if (0 == strlen($rdfXmlFile) && 0 == strlen($turtleFile)) {
        // throw new Exception($title.' has no RDF file URL');
        continue;
    }

    $simplifiedOntologyList[$ontologyIRI] = [
        'abbreviation' => $abbreviation,
        'key' => $key,
        'rdfxml_file' => $rdfXmlFile,
        'turtle_file' => $turtleFile,
        'ontology_iri' => $ontologyIRI,
        'ignore_it' => false,
    ];
}