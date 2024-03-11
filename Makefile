default:
	php scripts/bin/generate-yuml-diagram-config
	php scripts/bin/align-ontologies-csv

composer:
	cd scripts && composer update