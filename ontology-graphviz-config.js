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
    dublin_core_elements [label="Dublin Core Elements"];
    dublin_core_terms [label="Dublin Core Terms"];
    good_relations [label="GoodRelations (since 2012 parts of Schema.org)"];
    position [label="Position Ontology"];
    rparts [label="RPARTS"];
    schema_org [label="Schema.org"];
    suggested_upper_merged_ontology [label="Suggest Merged Upper Ontology (SUMO)"];
    vehicle_sales_ontology [label="Vehicle Sales Ontology (VSO)"];
    volkswagen_vehicle_ontology [label="Volkswagen Vehicle Ontology (VVO)"];
    // relations
    car_options_ontology -> good_relations
    car_options_ontology -> dublin_core_elements
    car_options_ontology -> dublin_core_terms
    cora -> corax
    cora -> suggested_upper_merged_ontology
    corax -> suggested_upper_merged_ontology
    good_relations -> schema_org
    position -> suggested_upper_merged_ontology
    rparts -> cora
    schema_org -> dublin_core_terms
    vehicle_sales_ontology -> good_relations
    volkswagen_vehicle_ontology -> good_relations
    volkswagen_vehicle_ontology -> vehicle_sales_ontology
}