# Working repository: List of industry ontologies

## TODOs

* [ ] Remove KIF related content, because its more clear when there is only RDF (e.g. ontology relations)
* Validate ontologies.csv
  * [ ] by loading each referenced RDF file and try to find ontology IRI
  * [ ] no TODO in any column
  * [ ] Align Github links to raw files (https://raw.githubusercontent.com/srfiorini/IEEE1872-owl/master/corax.owl vs. https://github.com/Battery-Value-Chain-Ontology/ontology/raw/master/BVCO.ttl)
* [ ] Create at least 1 image which shows ALL ontologies and their relation
* [ ] Remove obsolete entries from paper.bib
* [ ] Mention Graphviz config + image somewhere in the documentation (and paper)
* Find further ontology candidates:
  * [ ] Check https://bartoc.org/
  * [ ] Check BioPortal
* [ ] Stats:
  * [ ] Number of owl Imports + Namespaces checked
  * [ ] Amount of each license used

Check and if matching, work in the following ontologies:

* [ ] **Additive manufacturing** - Paper "A product life cycle ontology for additive manufacturing": https://philarchive.org/archive/ALIAPLv1
  * Gibt es dazu noch irgendwo die öffentlich zugänglichen RDF Daten
  * ODER
    * Prüfe, ob sie zu folgender Publikation Rohdaten finden lassen: A Design for Additive Manufacturing Ontology: https://citeseerx.ist.psu.edu/documentrepid=rep1&type=pdf&doi=b18539e972dfd14782d6a907dd04d1b91819e8b2
* [x] **Additive manufacturing ontology (AMontology)** - https://github.com/iassouroko/AMontology
* [ ] **Additive Manufacturing and Maintenance Operations Ontology (AMMO)** - https://github.com/LA3D/ammo
* [x] **Automotive Industry Ontology** - Automotive Industry Ontology, https://github.com/iurianu/auto-ontology/tree/master, Frage an Autor ob Projekt noch forgesetzt wird: https://github.com/iurianu/auto-ontology/issues/1
* [x] **Battery Interface Ontology (BattINFO)** - Is it a fit
  * https://big-map.github.io/BattINFO/about.html
  * https://github.com/BIG-MAP/BattINFO
  * https://www.big-map.eu/dissemination/battinfo
* [x] **Battery Value Chain Ontology (BVCO)** - https://gitlab.cc-asp.fraunhofer.de/ISC-Public/ISC-Digital/ontology/bvco
* [x] **Building ontology** - https://bimerr.iot.linkeddata.es/def/building/
* [ ] https://github.com/CaSkade-Automation/CaSkMan
* [x] **Capability and Skill Ontology (CaSk)** - *"OWL ontology to describe capabilities and skills of things. [...] In the context of automated production, Capabilities and Skills are terms that are used to refer to machine functions."*
  * https://github.com/CaSkade-Automation/CaSk
* [ ] **COGITO Safety Ontology** - https://github.com/oeg-upm/cogito-safety-ontology/tree/main
  * Prüfe, ob das für uns relevant ist. Projekt fiel mit im Kontext von https://github.com/mahsa-teimourikia/Safety-Ontology auf.
* [ ] **Collaborative Manufacturing Services Ontology** - https://data.ontocommons.linkeddata.es/vocabulary/CollaborativeManufacturingServicesOntology
  * PDF: https://www.sciencedirect.com/science/article/pii/S2405896318314472
* [ ] **Context Aware System Observation Ontology** - https://irstea.github.io/caso/OnToology/ontology/caso.owl/documentation/index-en.html - Verwendet Semantic Sensor Network Ontology
* [ ] **Crystallography Domain Ontology** - https://github.com/emmo-repo/domain-crystallography
* [ ] **Defection Ontology (DefectOnt)** - https://www.researchgate.net/publication/364530871_An_Ontology_for_Defect_Detection_in_Metal_Additive_Manufacturing , https://github.com/AndreaMazzullo/DefectOnt (kleine OWL Datei, aber womöglich brauchbar und erwähnenswert)
* [ ] **Digital Construction Energy Ontology** - https://digitalconstruction.github.io/Energy/v/0.5/
* [ ] **Digital Construction Entities Ontology** - https://digitalconstruction.github.io/Entities/v/0.5/
* [ ] **Digital Construction Materials** - https://digitalconstruction.github.io/Materials/v/0.5/
* [ ] **Domain ontology for atomistic and electronic modelling** - https://github.com/emmo-repo/domain-atomistic
* [x] **Elementary Multiperspective Material Ontology (EMMO)** - https://github.com/emmo-repo/EMMO
  * [x] EMMO Annotations - http://emmo.info/emmo/top/annotations#
* [ ] **Energy Efficiency Prediction Semantic Assistant Ontology (EEPSA)** - https://iesnaola.github.io/eepsa/EEPSA/index-en.html, Verwendet Semantic Sensor Network Ontology
* [ ] **European Materials \& Modelling Ontology (EMMO)** - https://github.com/emmo-repo/ + https://emmc.eu/news/emmo-1-0-0-alpha-release/
* [x] **Extruder Ontology (ExtruOnt)** - https://data.ontocommons.linkeddata.es/vocabulary/Extruont, zugehöriges Paper: https://www.semantic-web-journal.net/system/files/swj2317.pdf
* [ ] **General Process Ontology (GPO)** - https://gitlab.cc-asp.fraunhofer.de/ISC-Public/ISC-Digital/ontology/gpo, Ontologie ist noch WIP
* [ ] **ifcOWL** - *"The IFC4\_ADD1 ontology specifies in OWL the Industry Foundational Classes (IFC) conceptual data schema and exchange file format for Building Information Model (BIM) data; Creators: Pieter Pauwels (pipauwel.pauwels@ugent.be) and Walter Terkaj (walter.terkaj@itia.cnr.it); Reference: http://www.w3.org/community/lbd/ifcowl/; Based on IFC schema http://www.buildingsmart-tech.org/ifc/IFC4/final/html/"*
  * https://ontohub.org/spaceportal/IFC%20OWL/IFC4_ADD1///symbolskind=ObjectProperty
  * https://standards.buildingsmart.org/IFC/DEV/IFC4/ADD2_TC1/OWL/index.html
  * https://technical.buildingsmart.org/standards/ifc/ifc-schema-specifications/
  * https://github.com/buildingSMART/ifcOWL
  * **Prüfen, ob das noch für uns passt, weil inhaltlicher Fokus eher Bauwirtschaft ist**
* [x] **Product Lifecycle Management Ontology** - https://rds.posccaesar.org/ontology/plm/, Prüfe, ob hierfür noch passende Dokumentation vorhanden ist. Es scheint auf jeden Fall RDF-Daten vorhanden zu sein
  * [ ] PLM ChEBI	http://rds.posccaesar.org/ontology/plm/ont/chebi-adapt - http://rds.posccaesar.org/ontology/plm/ont/chebi-adapt/0.9.0
  * [ ] PLM collect	https://rds.posccaesar.org/ontology/plm/ont/core-collect - http://rds.posccaesar.org/ontology/plm/ont/core-collect/0.9.0

## Misc

File [yuml-diagram-config.txt](./yuml-diagram-config.txt) contains config code for graph visualization (yuml.me).
It is generated via `make` command.
Insert it here to generate a visualization: https://yuml.me/diagram/scruffy/class/draw
