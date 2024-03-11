<?php

/**
 * List either contains URIs of non-existing ontologies or redirects.
 *
 * @var array<string,array<mixed>>
 */
return [
    // just a redirect (related ontology is in CSV file)
    'http://bdi.si.ehu.es/bdi/ontologies/ExtruOnt/components4ExtruOnt#' => [
        'abbreviation' => 'Information not available',
        'key' => 'components4ExtruOnt',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://bdi.si.ehu.es/bdi/ontologies/ExtruOnt/components4ExtruOnt#',
    ],
    // redirect fails and it seems not to be in use
    'https://big-map.github.io/BattINFO/ontology/electrochemistry#' => [
        'abbreviation' => 'Information not available',
        'key' => 'battinfo_electrochemistry',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'https://big-map.github.io/BattINFO/ontology/electrochemistry#',
    ],
    // could not found related ontology for this ontology IRI
    // BioPortal support says: only used for internal references, no actual ontology
    'http://data.bioontology.org/metadata/' => [
        'abbreviation' => 'Information not available',
        'key' => 'open_biological_and_biomedical_ontology_foundry',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.obolibrary.org/obo/',
    ],
    // not a real ontology
    'http://dbpedia.org/resource/' => [
        'abbreviation' => 'Information not available',
        'key' => 'dbpedia_org_resource',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://dbpedia.org/resource/',
    ],
    // failing redirect reported: https://github.com/emmo-repo/EMMO/issues/285
    'http://emmo.info/emmo/middle/isq#' => [
        'abbreviation' => 'Information not available',
        'key' => 'international_system_of_quantities',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://emmo.info/emmo/middle/isq#',
    ],
    // not a real ontology
    'http://en.wikipedia.org/wiki/' => [
        'abbreviation' => 'wiki',
        'key' => 'en_wikipedia_org_wiki',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://en.wikipedia.org/wiki/',
    ],
    // redirection fails
    'https://gpo.ontology.link/' => [
        'abbreviation' => 'Information not available',
        'key' => 'gpo_ontology_link',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'https://gpo.ontology.link/',
    ],
    // probably not a real ontology, leads to 404 page
    'http://infoneer.txstate.edu/ontology/' => [
        'abbreviation' => 'Information not available',
        'key' => 'infoneer_txstate_edu_ontology',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://infoneer.txstate.edu/ontology/',
    ],
    // not a real ontology
    'http://jena.hpl.hp.com/ARQ/function#' => [
        'abbreviation' => 'Information not available',
        'key' => 'jena_hpl_hp_com_arq_function',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://jena.hpl.hp.com/ARQ/function#',
    ],
    // could not found related ontology for this ontology IRI
    // http://vocab.org does not have an appropriate entry
    'http://open.vocab.org/terms/' => [
        'abbreviation' => 'Information not available',
        'key' => 'open_vocab_org_terms',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://open.vocab.org/terms/',
    ],
    // redirects to https://www.w3.org/2005/Incubator/ssn/ssnx/ssn
    'http://purl.oclc.org/NET/ssnx/ssn#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_oclc_org_ssnx_ssn',
        'rdf_file' => null,
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
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.obolibrary.org/obo/',
    ],
    // just a redirect to https://www.dublincore.org/specifications/dublin-core/dcmi-terms/
    'http://purl.org/dc/elements/1.1#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_org_dc_elements_1_1',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://purl.org/dc/elements/1.1#',
    ],
    // all Dublin Core IRIs (e.g. http://purl.org/dc/terms/, http://purl.org/dc/dcam/) point/redirect to
    // https://www.dublincore.org/specifications/dublin-core/dcmi-terms/
    // both DCTerms and DCElements also reference the same terms/elements
    'http://purl.org/dc/dcmitype/' => [
        'abbreviation' => 'dcmitype',
        'key' => 'dcmi_type',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/dc/dcmitype/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    'http://purl.org/dc/dcam/' => [
        'abbreviation' => 'dcam',
        'key' => 'dcam',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/dc/dcam/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // GoodRelations vocabulary was merged into schema.org in 2012 and no longer has a RDF file of its own
    'http://purl.org/goodrelations/v1#' => [
        'abbreviation' => 'GR',
        'key' => 'good_relations_ontology',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/goodrelations/v1#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/net/vocab/2004/03/label#' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_net_vocab_2004_03_label',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/net/vocab/2004/03/label#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/obo/owl/' => [
        'abbreviation' => 'Information not available',
        'key' => 'obo_owl',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/obo/owl/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://purl.org/obo/oban/' => [
        'abbreviation' => 'Information not available',
        'key' => 'obo_oban',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/obo/oban/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just another IRI for the already known ontology (CiTO)
    'http://purl.org/spar/cito/cito:' => [
        'abbreviation' => 'Information not available',
        'key' => 'purl_spar_cito_dd',
        'rdf_file' => null,
        'ontology_iri' => 'http://purl.org/spar/cito/cito:',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // Sometimes authors use https://schema.org/ instead of the original URL http://schema.org/
    // this entry is only for easing data management
    'https://schema.org/' => [
        'abbreviation' => 'sdo',
        'key' => 'schema_org',
        'rdf_file' => null,
        'ontology_iri' => 'https://schema.org/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://spinrdf.org/arg#' => [
        'abbreviation' => 'Information not available',
        'key' => 'spinrdf_org_arg',
        'rdf_file' => null,
        'ontology_iri' => 'http://spinrdf.org/arg#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://w3id.org/emmo#' => [
        'abbreviation' => 'emmo',
        'key' => 'elemental_multiperspective_material_ontology',
        'rdf_file' => null,
        'ontology_iri' => 'http://emmo.info/emmo#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    'https://w3id.org/emmo/top/annotations#' => [
        'abbreviation' => 'Information not available',
        'key' => 'elemental_multiperspective_material_ontology_annotation',
        'rdf_file' => null,
        'ontology_iri' => 'https://w3id.org/emmo/top/annotations#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // points to a valid RDF file (with statements about 1 ontology and 1 property)
    // ontology is not actively used
    'https://w3id.org/obda/vocabulary#' => [
        'abbreviation' => 'Information not available',
        'key' => 'ontology_based_data_access',
        'rdf_file' => null,
        'ontology_iri' => 'https://w3id.org/obda/vocabulary#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // link leads to 404 page
    // seems to be an ontology, but no RDf data found
    'https://w3id.org/requirement-ontology/rdl/' => [
        'abbreviation' => 'Information not available',
        'key' => 'w3id_requirement_ontoloy',
        'rdf_file' => null,
        'ontology_iri' => 'https://w3id.org/requirement-ontology/rdl/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect, because sometimes people use
    // https://w3id.org/spar/cito without the / at the end
    'https://w3id.org/spar/cito' => [
        'abbreviation' => 'cito',
        'key' => 'w3id_cito',
        'rdf_file' => null,
        'ontology_iri' => 'https://w3id.org/spar/cito',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // link broken, but it references https://raw.githubusercontent.com/OntoUA/ua-nodeset-core-ont/master/owl/OpcUaNodeSet2.owl
    'http://www.fortiss.org/kb/opcua/OpcUaNodeSet2.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'opc_ua_node_set_2',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.fortiss.org/kb/opcua/OpcUaNodeSet2.owl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not find related ontology design pattern
    'http://www.ontologydesignpatterns.org/schemas/cpannotationschema.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'odp_cpannotationschema',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologydesignpatterns.org/schemas/cpannotationschema.owl#',
    ],
    // just a redirect (related ontoloy is used without #)
    'http://www.ontologydesignpatterns.org/cp/owl/situation.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'odp_situation',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologydesignpatterns.org/cp/owl/situation.owl#',
    ],
    // could not found related ontology for this ontology IRI
    'http://www.ontologyrepository.com/CommonCoreOntologies/' => [
        'abbreviation' => 'Information not available',
        'key' => 'ontology_repository_common_core_ontologies',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.ontologyrepository.com/CommonCoreOntologies/',
    ],
    // could not found related ontology for this ontology IRI
    // redirects to:
    // https://www1.owl-ontologies.com/?tm=1&subid4=170990725http://www.owl-ontologies.com/2005/08/07/xsp.owl#5.0125660000&KW1=Semantic%20Data%20Model%20Ontology&KW2=Data%20Analytics%20Database&KW3=Human%20Disease%20Document%20Management%20Software&searchbox=0&domainname=0&backfill=0
    'http://www.owl-ontologies.com/2005/08/07/xsp.owl#' => [
        'abbreviation' => 'Information not available',
        'key' => 'owl_ontologies_com_xsp_owl',
        'rdf_file' => null,
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
        'ontology_iri' => 'http://www.owl-ontologies.com/2005/08/07/xsp.owl#',
    ],
    // leads to 404 page
    'http://semanticscience.org/resource/' => [
        'abbreviation' => 'Information not available',
        'key' => 'semanticscience_resource',
        'rdf_file' => null,
        'ontology_iri' => 'http://semanticscience.org/resource/',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2002/07/owl#' => [
        'abbreviation' => 'owl',
        'key' => 'web_ontology_language',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2002/07/owl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/1999/02/22-rdf-syntax-ns#' => [
        'abbreviation' => 'rdf',
        'key' => 'resource_description_framework',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2000/01/rdf-schema#' => [
        'abbreviation' => 'rdfs',
        'key' => 'resource_description_framework_schema_vocabulary',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2000/01/rdf-schema#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'https://www.w3.org/2001/XMLSchema#' => [
        'abbreviation' => 'xsd',
        'key' => 'extensible_markup_language_schema',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2001/XMLSchema#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://www.w3.org/2003/11/swrl#' => [
        'abbreviation' => 'swrl',
        'key' => 'semantic_Web_rule_language',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/11/swrl#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    'http://www.w3.org/2003/11/swrlb#' => [
        'abbreviation' => 'Information not available',
        'key' => 'swrl_b',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/11/swrlb#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    // https://www.w3.org/2003/g/data-view#
    'http://www.w3.org/2003/g/data-view#' => [
        'abbreviation' => 'Information not available',
        'key' => 'grddl_data_views',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2003/g/data-view#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // could not found related ontology for this ontology IRI
    // http://www.w3.org/2005/xpath-functions#
    'http://www.w3.org/2005/xpath-functions#' => [
        'abbreviation' => 'fn',
        'key' => 'xpath_functions',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/2005/xpath-functions#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // sosa ontology in CSV, this is just to avoid warnings
    'http://www.w3.org/ns/sosa#' => [
        'abbreviation' => 'sosa',
        'key' => 'w3c_sosa',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3.org/ns/sosa#',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // just a redirect
    'http://www.w3id.org/hsu-aut/css#' => [
        'abbreviation' => 'css',
        'key' => 'capability_skill_and_service_ontology',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.w3id.org/hsu-aut/css',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
    // redirects to http://www.foodvoc.org/page/WV which is an empty page
    // related ontology not found
    'http://www.wurvoc.org/vocabularies/WV/' => [
        'abbreviation' => 'Information not available',
        'key' => 'wurvoc_mv',
        'rdf_file' => null,
        'ontology_iri' => 'http://www.wurvoc.org/vocabularies/WV',
        'ignore_it' => true, // if true, it will be ignored when loading RDF file later on
    ],
];