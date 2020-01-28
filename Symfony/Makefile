install:
	docker-compose -p jeux build
	docker-compose -p jeux up -d
	docker-compose -p jeux exec symfony composer install
	docker-compose -p jeux exec symfony npm install
	docker-compose -p jeux exec symfony bin/console doc:data:create --if-not-exists
	docker-compose -p jeux exec symfony bin/console doc:schem:up --force

start: ## Start the project
	cp .env.dist .env
	docker-compose -p jeux up -d
	@echo "started on http://127.0.0.1:8921/"
	@echo "PMA on http://127.0.0.1:8922/"

stop:
	docker-compose -p jeux down --remove-orphans

jsroute:
	php bin/console fos:js-routing:dump
	mv web/js/fos_js_routes.js public/js/fos_js_routes.js

translate:
	docker-compose -p jeux exec symfony  bin/console translation:download

cc:
	docker-compose -p jeux exec symfony bin/console cache:clear
	chmod -R 777 translations/

console:
	docker-compose -p jeux exec jeux_symfony bash

migrate:
	@echo "Use in docker !!"
	composer install
	bin/console doc:schem:up --force
	chmod -R 777 translations/ var/



build-assets:
	docker-compose -p jeux exec symfony  bin/console assets:install --symlink

db:
	docker-compose -p jeux exec symfony  bin/console doc:data:create --if-not-exists
	docker-compose -p jeux exec symfony  bin/console doc:schem:up --force
	docker-compose -p jeux exec symfony  bin/consolee app:import-vstage
	docker-compose -p jeux exec symfony  bin/console app:import-siecl

build:
	docker build -t registry.2le.net/joris/jeu .
	docker push registry.2le.net/joris/jeu

test:
	@echo "Use in docker or use make ts!!"
	cp phpunit.xml.dist phpunit.xml
	bin/console doc:schem:up --force
	# bin/console doctrine:migrations:migrate -n
	bin/phpunit tests/ -v --coverage-clover phpunit.coverage.xml --log-junit phpunit.report.xml

ts:
	cp phpunit.xml.dist phpunit.xml
	docker-compose -p jeux exec symfony ./bin/console doc:schem:up --force
	docker-compose -p jeux exec symfony ./bin/phpunit tests/ -v

wp-watch:
	docker-compose -p jeux exec jeux_symfony ./node_modules/.bin/encore dev --watch


.PHONY: all test run init cc test
