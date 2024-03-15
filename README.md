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
  * [ ] https://github.com/orgs/oeg-upm/repositories?type=all&q=ontology
  * [ ] Check https://bartoc.org/
  * [ ] Check BioPortal
* [ ] Possible statistics:
  * [ ] Number of owl Imports + Namespaces checked
  * [ ] Amount of each license used

Check and if matching, work in the following ontologies:

* [ ] **Additive manufacturing** - Paper "A product life cycle ontology for additive manufacturing": https://philarchive.org/archive/ALIAPLv1
  * Gibt es dazu noch irgendwo die öffentlich zugänglichen RDF Daten
  * ODER
    * Prüfe, ob sie zu folgender Publikation Rohdaten finden lassen: A Design for Additive Manufacturing Ontology: https://citeseerx.ist.psu.edu/documentrepid=rep1&type=pdf&doi=b18539e972dfd14782d6a907dd04d1b91819e8b2
* [ ] **Additive Manufacturing and Maintenance Operations Ontology (AMMO)** - https://github.com/LA3D/ammo
* [ ] **Crystallography Domain Ontology** - https://github.com/emmo-repo/domain-crystallography
* [x] **Defection Ontology (DefectOnt)** - https://www.researchgate.net/publication/364530871_An_Ontology_for_Defect_Detection_in_Metal_Additive_Manufacturing , https://github.com/AndreaMazzullo/DefectOnt (kleine OWL Datei, aber womöglich brauchbar und erwähnenswert)

## Misc

File [yuml-diagram-config.txt](./yuml-diagram-config.txt) contains config code for graph visualization (yuml.me).
It is generated via `make` command.
Insert it here to generate a visualization: https://yuml.me/diagram/scruffy/class/draw
