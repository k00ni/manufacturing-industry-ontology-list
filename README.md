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
  * [x] Check https://bartoc.org/
  * [ ] https://showvoc.op.europa.eu/#/datasets
* [ ] Possible statistics:
  * [ ] Number of owl Imports + Namespaces checked
  * [ ] Amount of each license used
  * [ ] Amount of entries with/without abbreviation

## Misc

File [yuml-diagram-config.txt](./yuml-diagram-config.txt) contains config code for graph visualization (yuml.me).
It is generated via `make` command.
Insert it here to generate a visualization: https://yuml.me/diagram/scruffy/class/draw
