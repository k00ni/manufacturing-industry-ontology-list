<?php

/**
 * List of URIs of non-existing ontologies and redirects.
 * Some ontologies use uncommon namespace URIs which lead to broken links.
 * These are also part of the list to avoid false positive errors.
 *
 * @var array<string,array<mixed>>
 */
return [
    // just a redirect (related ontology is in CSV file)
    'http://bdi.si.ehu.es/bdi/ontologies/ExtruOnt/components4ExtruOnt#' => [
        'abbreviation' => 'Information not available',
        'key' => 'components4ExtruOnt',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://bdi.si.ehu.es/bdi/ontologies/ExtruOnt/components4ExtruOnt#',
    ],
    // redirect fails and it seems not to be in use
    'https://big-map.github.io/BattINFO/ontology/electrochemistry#' => [
        'abbreviation' => 'Information not available',
        'key' => 'battinfo_electrochemistry',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'https://big-map.github.io/BattINFO/ontology/electrochemistry#',
    ],
    // could not found related ontology for this ontology IRI
    // BioPortal support says: only used for internal references, no actual ontology
    'http://data.bioontology.org/metadata/' => [
        'abbreviation' => 'Information not available',
        'key' => 'open_biological_and_biomedical_ontology_foundry',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.obolibrary.org/obo/',
    ],
    // not a real ontology
    'http://dbpedia.org/resource/' => [
        'abbreviation' => 'Information not available',
        'key' => 'dbpedia_org_resource',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://dbpedia.org/resource/',
    ],
    // just a redirect
    'http://emmo.info/emmo/1.0.0-beta4' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://emmo.info/emmo/1.0.0-beta4',
    ],
    // just a redirect
    'http://emmo.info/emmo/1.0.0-beta/middle' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://emmo.info/emmo/1.0.0-beta/middle',
    ],
    // not a real ontology
    'http://en.wikipedia.org/wiki/' => [
        'abbreviation' => 'wiki',
        'key' => 'en_wikipedia_org_wiki',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://en.wikipedia.org/wiki/',
    ],
    // redirection fails
    'https://gpo.ontology.link/' => [
        'abbreviation' => 'Information not available',
        'key' => 'gpo_ontology_link',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'https://gpo.ontology.link/',
    ],
    // probably not a real ontology, leads to 404 page
    'http://infoneer.txstate.edu/ontology/' => [
        'abbreviation' => 'Information not available',
        'key' => 'infoneer_txstate_edu_ontology',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://infoneer.txstate.edu/ontology/',
    ],
    // not a real ontology
    'http://jena.hpl.hp.com/ARQ/function#' => [
        'abbreviation' => 'Information not available',
        'key' => 'jena_hpl_hp_com_arq_function',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://jena.hpl.hp.com/ARQ/function#',
    ],
    // could not found related ontology for this ontology IRI
    // http://vocab.org does not have an appropriate entry
    'http://open.vocab.org/terms/' => [
        'abbreviation' => 'Information not available',
        'key' => 'open_vocab_org_terms',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://open.vocab.org/terms/',
    ],
    // redirects to https://www.w3.org/2005/Incubator/ssn/ssnx/ssn
    'http://purl.oclc.org/NET/ssnx/ssn#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_oclc_org_ssnx_ssn',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.oclc.org/NET/ssnx/ssn#',
    ],
    // added because it doesn't reference a certain ontology, but seems to be a placeholder
    // which points to a list of ontologies (https://obofoundry.org/).
    // in RDF data you might see entries like "obo:RO_0001900" which point to an entry in
    // https://obofoundry.org/ontology/ro.html, which has http://purl.obolibrary.org/obo/ro.owl#
    // as ontology IRI.
    'http://purl.obolibrary.org/obo/' => [
        'abbreviation' => 'obo',
        'key' => 'open_biological_and_biomedical_ontology_foundry',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.obolibrary.org/obo/',
    ],
    // just a redirect to https://www.dublincore.org/specifications/dublin-core/dcmi-terms/
    'http://purl.org/dc/elements/1.1#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_org_dc_elements_1_1',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.org/dc/elements/1.1#',
    ],
    // all Dublin Core IRIs (e.g. http://purl.org/dc/terms/, http://purl.org/dc/dcam/) point/redirect to
    // https://www.dublincore.org/specifications/dublin-core/dcmi-terms/
    // both DCTerms and DCElements also reference the same terms/elements
    'http://purl.org/dc/dcmitype/' => [
        'abbreviation' => 'dcmitype',
        'key' => 'dcmi_type',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/dc/dcmitype/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    'http://purl.org/dc/dcam/' => [
        'abbreviation' => 'dcam',
        'key' => 'dcam',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/dc/dcam/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // GoodRelations vocabulary was merged into schema.org in 2012 and no longer has a RDF file of its own
    'http://purl.org/goodrelations/v1#' => [
        'abbreviation' => 'GR',
        'key' => 'good_relations_ontology',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/goodrelations/v1#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/net/vocab/2004/03/label#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_net_vocab_2004_03_label',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/net/vocab/2004/03/label#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/obo/owl/' => [
        'abbreviation' => 'Information not available',
        'key' => 'obo_owl',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/obo/owl/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/obo/oban/' => [
        'abbreviation' => 'Information not available',
        'key' => 'obo_oban',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/obo/oban/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just another IRI for the already known ontology (CiTO)
    'http://purl.org/spar/cito/cito:' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_spar_cito_dd',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://purl.org/spar/cito/cito:',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // http://www.w3id.org/hsu-aut/cask imports this IRI instead of using the appropriate ontology IRI
    'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-DINEN61360/v1.4.2/DINEN61360.owl' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-DINEN61360/v1.4.2/DINEN61360.owl',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // related Github repository redirects to https://github.com/hsu-aut/IndustrialStandard-ODP-PackML
    // PackML is known
    'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-ISA88/v2.0.0/ISA88.owl' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-ISA88/v2.0.0/ISA88.owl',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // points to certain version file of known "VDI 2206 Ontology-Design-Pattern"
    'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-VDI2206/v1.4.2/VDI2206.owl' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-VDI2206/v1.4.2/VDI2206.owl',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // Sometimes authors use https://schema.org/ instead of the original URL http://schema.org/
    // this entry is only for easing data management
    'https://schema.org/' => [
        'abbreviation' => 'sdo',
        'key' => 'schema_org',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://schema.org/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://spinrdf.org/arg#' => [
        'abbreviation' => 'Information not available',
        'key' => 'spinrdf_org_arg',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://spinrdf.org/arg#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://w3id.org/emmo#' => [
        'abbreviation' => 'emmo',
        'key' => 'elemental_multiperspective_material_ontology',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://emmo.info/emmo#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    'https://w3id.org/emmo/top/annotations#' => [
        'abbreviation' => 'Information not available',
        'key' => 'elemental_multiperspective_material_ontology_annotation',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://w3id.org/emmo/top/annotations#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // points to a valid RDF file (with statements about 1 ontology and 1 property)
    // ontology is not actively used
    'https://w3id.org/obda/vocabulary#' => [
        'abbreviation' => 'Information not available',
        'key' => 'ontology_based_data_access',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://w3id.org/obda/vocabulary#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // link leads to 404 page
    // seems to be an ontology, but no RDf data found
    'https://w3id.org/requirement-ontology/rdl/' => [
        'abbreviation' => 'Information not available',
        'key' => 'w3id_requirement_ontoloy',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://w3id.org/requirement-ontology/rdl/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect, because sometimes people use
    // https://w3id.org/spar/cito without the / at the end
    'https://w3id.org/spar/cito' => [
        'abbreviation' => 'cito',
        'key' => 'w3id_cito',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'https://w3id.org/spar/cito',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // link broken, but it references https://raw.githubusercontent.com/OntoUA/ua-nodeset-core-ont/master/owl/OpcUaNodeSet2.owl
    'http://www.fortiss.org/kb/opcua/OpcUaNodeSet2.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'opc_ua_node_set_2',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.fortiss.org/kb/opcua/OpcUaNodeSet2.owl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // older version of http://www.w3id.org/hsu-aut/DINEN61360
    // source https://raw.githubusercontent.com/hsu-aut/IndustrialStandard-ODP-DINEN61360/master/DINEN61360.owl
    'http://www.hsu-ifa.de/ontologies/DINEN61360' => [
        'abbreviation' => 'Information not available',
        'key' => '',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.hsu-ifa.de/ontologies/DINEN61360',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not find related ontology design pattern
    'http://www.ontologydesignpatterns.org/schemas/cpannotationschema.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'odp_cpannotationschema',
        'rdfxml_file' => 'http://www.ontologydesignpatterns.org/schemas/cpannotationschema.owl',
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologydesignpatterns.org/schemas/cpannotationschema.owl#',
    ],
    // just a redirect (related ontoloy is used without #)
    'http://www.ontologydesignpatterns.org/cp/owl/situation.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'odp_situation',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologydesignpatterns.org/cp/owl/situation.owl#',
    ],
    // could not found related ontology for this ontology IRI
    'http://www.ontologyrepository.com/CommonCoreOntologies/' => [
        'abbreviation' => 'Information not available',
        'key' => 'ontology_repository_common_core_ontologies',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologyrepository.com/CommonCoreOntologies/',
    ],
    // could not found related ontology for this ontology IRI
    // redirects to:
    // https://www1.owl-ontologies.com/?tm=1&subid4=170990725http://www.owl-ontologies.com/2005/08/07/xsp.owl#5.0125660000&KW1=Semantic%20Data%20Model%20Ontology&KW2=Data%20Analytics%20Database&KW3=Human%20Disease%20Document%20Management%20Software&searchbox=0&domainname=0&backfill=0
    'http://www.owl-ontologies.com/2005/08/07/xsp.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'owl_ontologies_com_xsp_owl',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.owl-ontologies.com/2005/08/07/xsp.owl#',
    ],
    // leads to 404 page
    'http://semanticscience.org/resource/' => [
        'abbreviation' => 'Information not available',
        'key' => 'semanticscience_resource',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://semanticscience.org/resource/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2002/07/owl#' => [
        'abbreviation' => 'owl',
        'key' => 'web_ontology_language',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2002/07/owl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/1999/02/22-rdf-syntax-ns#' => [
        'abbreviation' => 'rdf',
        'key' => 'resource_description_framework',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2000/01/rdf-schema#' => [
        'abbreviation' => 'rdfs',
        'key' => 'resource_description_framework_schema_vocabulary',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2000/01/rdf-schema#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2001/XMLSchema#' => [
        'abbreviation' => 'xsd',
        'key' => 'extensible_markup_language_schema',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2001/XMLSchema#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'http://www.w3.org/2002/07/owl#' => [
        'abbreviation' => 'owl',
        'key' => 'owl',
        'rdfxml_file' => null,
        'turtle_file' => 'http://www.w3.org/2002/07/owl#',
        'ontology_iri' => 'http://www.w3.org/2002/07/owl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://www.w3.org/2003/11/swrl#' => [
        'abbreviation' => 'swrl',
        'key' => 'semantic_Web_rule_language',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/11/swrl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://www.w3.org/2003/11/swrlb#' => [
        'abbreviation' => 'Information not available',
        'key' => 'swrl_b',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/11/swrlb#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    // https://www.w3.org/2003/g/data-view#
    'http://www.w3.org/2003/g/data-view#' => [
        'abbreviation' => 'Information not available',
        'key' => 'grddl_data_views',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/g/data-view#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    // http://www.w3.org/2005/xpath-functions#
    'http://www.w3.org/2005/xpath-functions#' => [
        'abbreviation' => 'fn',
        'key' => 'xpath_functions',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/2005/xpath-functions#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // sosa ontology in CSV, this is just to avoid warnings
    'http://www.w3.org/ns/sosa#' => [
        'abbreviation' => 'sosa',
        'key' => 'w3c_sosa',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3.org/ns/sosa#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'http://www.w3id.org/hsu-aut/css#' => [
        'abbreviation' => 'css',
        'key' => 'capability_skill_and_service_ontology',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.w3id.org/hsu-aut/css',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // redirects to http://www.foodvoc.org/page/WV which is an empty page
    // related ontology not found
    'http://www.wurvoc.org/vocabularies/WV/' => [
        'abbreviation' => 'Information not available',
        'key' => 'wurvoc_mv',
        'rdfxml_file' => null,
        'turtle_file' => null,
        'ontology_iri' => 'http://www.wurvoc.org/vocabularies/WV',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
];