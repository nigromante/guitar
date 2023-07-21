
.PHONY: help
help:
	@echo make help
	@echo make version

	@echo make testSuites
	@echo make testUnit
	@echo make testIntegration
	@echo make testAll
	@echo make testCoverage

	
version:
	@echo '1.0 microframework'

build:
	composer update

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
