// Configuration for Graphviz editor to visualize relations between ontologies
// use it in http://magjac.com/graphviz-visual-editor/
digraph regexp {
    fontname="Helvetica,Arial,sans-serif"
    node [fontname="Helvetica,Arial,sans-serif"]
    edge [fontname="Helvetica,Arial,sans-serif"]
    // ontologies
    car_options_ontology [label="Car Options Ontology (COO)"];
    cora [label="Core Ontology for Robotics and Automation (CORA)"];
    corax [label="CORAX"];
    data_catalog_vocabulary [label="Data Catalog Vocabulary"];
    dublin_core_elements [label="Dublin Core Elements"];
    dublin_core_media_initiative [label="Dublin Core Media Initiative"];
    dublin_core_terms [label="Dublin Core Terms"];
    fried_of_a_friend [label="Friend of a Friend"];
    good_relations [label="GoodRelations (since 2012 part of Schema.org)"];
    position [label="Position Ontology"];
    rparts [label="RPARTS"];
    schema_org [label="Schema.org"];
    simple_knowledge_organization_system [label="Simple Knowledge Organization System (SKOS)"];
    suggested_upper_merged_ontology [label="Suggest Merged Upper Ontology (SUMO)"];
    vehicle_sales_ontology [label="Vehicle Sales Ontology (VSO)"];
    volkswagen_vehicle_ontology [label="Volkswagen Vehicle Ontology (VVO)"];
    w3c_provenance [label="W3C Provenance Ontology (PROV)"];
    w3c_ontology_web_language [label="W3C Ontology Web Language (OWL)"];
    w3c_resource_description_framework [label="W3C Resource Description Framework (RDF)"];
    w3c_resource_description_framework_schema [label="W3C Resource Description Framework Schema (RDFS)"];
    w3c_vcard_ontology [label="W3C vCard Ontology (VCARD)"];
    xml_schema [label="W3C Extensible Markup Language Schema (XSD)"];
    // relations
    car_options_ontology -> good_relations
    car_options_ontology -> dublin_core_elements
    car_options_ontology -> dublin_core_terms
    cora -> corax
    cora -> suggested_upper_merged_ontology
    corax -> suggested_upper_merged_ontology
    data_catalog_vocabulary -> dublin_core_terms
    data_catalog_vocabulary -> fried_of_a_friend
    data_catalog_vocabulary -> schema_org
    data_catalog_vocabulary -> simple_knowledge_organization_system
    data_catalog_vocabulary -> w3c_provenance
    data_catalog_vocabulary -> w3c_ontology_web_language
    data_catalog_vocabulary -> w3c_resource_description_framework
    data_catalog_vocabulary -> w3c_resource_description_framework_schema
    data_catalog_vocabulary -> w3c_vcard_ontology
    data_catalog_vocabulary -> xml_schema
    good_relations -> schema_org
    position -> suggested_upper_merged_ontology
    rparts -> cora
    schema_org -> data_catalog_vocabulary
    schema_org -> dublin_core_terms
    schema_org -> fried_of_a_friend
    vehicle_sales_ontology -> good_relations
    volkswagen_vehicle_ontology -> good_relations
    volkswagen_vehicle_ontology -> vehicle_sales_ontology
}