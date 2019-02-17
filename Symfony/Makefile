install:
	docker-compose build
	docker-compose up -d
	docker-compose exec symfony composer install
	docker-compose exec symfony npm install
	docker-compose exec symfony bin/console doc:data:create --if-not-exists
	docker-compose exec symfony bin/console doc:schem:up --force

start: ## Start the project
	cp .env.dist .env
	docker-compose up -d
	@echo "started on http://127.0.0.1:8813/"
	@echo "PMA on http://127.0.0.1:8814/"

stop:
	docker-compose down --remove-orphans

jsroute:
	php bin/console fos:js-routing:dump
	mv web/js/fos_js_routes.js public/js/fos_js_routes.js

translate:
	docker-compose exec symfony  bin/console translation:download

cc:
	docker-compose exec symfony bin/console cache:clear
	chmod -R 777 translations/

console:
	docker-compose exec symfony bash

migrate:
	@echo "Use in docker !!"
	composer install
	bin/console doc:schem:up --force
	chmod -R 777 translations/ var/



build-assets:
	docker-compose exec symfony  bin/console assets:install --symlink

db:
	docker-compose exec symfony  bin/console doc:data:create --if-not-exists
	docker-compose exec symfony  bin/console doc:schem:up --force
	docker-compose exec symfony  bin/console app:import-vstage
	docker-compose exec symfony  bin/console app:import-siecle

build:
	docker build -t registry.2le.net/2le/geostage .
	docker push registry.2le.net/2le/geostage

test:
	@echo "Use in docker or use make ts!!"
	cp phpunit.xml.dist phpunit.xml
	bin/console doc:schem:up --force
	# bin/console doctrine:migrations:migrate -n
	bin/phpunit tests/ -v --coverage-clover phpunit.coverage.xml --log-junit phpunit.report.xml

ts:
	cp phpunit.xml.dist phpunit.xml
	docker-compose exec symfony ./bin/console doc:schem:up --force
	docker-compose exec symfony ./bin/phpunit tests/ -v

wp-watch:
	docker-compose exec symfony ./node_modules/.bin/encore dev --watch


.PHONY: all test run init cc test
