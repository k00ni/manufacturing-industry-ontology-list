# scripts

PHP scripts were developed and used during the survey.
To run them you need a PHP environment.
Such an enviromment can be started via the enclosed [Dockerfile](./../docker/Dockerfile).

To build and start the Docker container run the following command in the terminal:

```bash
docker build . -t ontolist \
&& \
docker run -it \
            -v "$(PWD)/../":/app \
            --user ontolist \
            ontolist \
            /bin/bash
```

It will log you in automatically.
When inside switch to scripts folder and setup required vendors with:

```
cd scripts && composer update
```

Afterwards can run the following scripts:

* `align-validate-ontologies-csv` - Aligns and validates the content of ontologies.csv file.
* `check-availability-of-rdf-files` - Goes through ontologies.csv and checks availability of related RDF files.
* `find-unknown-ontologies` - Goes through ontologies.csv, loads related RDF data and checks namespaces and owl:imports for unknown references.
* `ontology-info` - Call it like `php scripts/bin/ontology-info URL format` whereas `URL` is an URL to a RDF-file and `format` is the foramt of the file (either `rdf` or `turtle`). The script tries to extract meta data from the RDF (such as title and license).
* `shot-statistics`  - Basic script to generate all the statistics used in the publication.

Use the following command to run a script inside the Docker container:

```bash
php scripts/bin/find-unknown-ontologies
```

### Cache

A cache is used to reduce load for servers which host ontology data.
A `cache` folder is created on the first HTTP request (in the root folder).
It stores the string representation of each HTTP response.