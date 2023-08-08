
.PHONY: help
help:
	@clear
	@echo 😄 Opciones del proyecto
	@echo	

	@echo make help
	@echo make version
	@echo make build
	@echo make clean
	@echo	
	@echo make testSuites
	@echo make testUnit
	@echo make testIntegration
	@echo make testAll
	@echo make testCoverage
	@echo	

	
version:
	@clear
	@echo '1.0 microframework 🥇'
	@echo	

.PHONY: build
build:
	composer update

.PHONY: clean
clean:
	rm -rf vendor 
	rm -f composer.lock 
	rm -rf ./logs/*

testSuites:
	./vendor/bin/phpunit --list-suites

testUnit:
	./vendor/bin/phpunit --testsuite=unit

testIntegration:
	./vendor/bin/phpunit --testsuite=integration

testAll:
	./vendor/bin/phpunit

testCoverage:
	./vendor/bin/phpunit --coverage-html tests/coverage
