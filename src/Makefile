
.PHONY: help
help:
	@echo make help
	@echo make version
	@echo make build
	@echo make clean

	@echo make testSuites
	@echo make testUnit
	@echo make testIntegration
	@echo make testAll
	@echo make testCoverage

	
version:
	@echo '1.0 microframework'

.PHONY: build
build:
	composer update

.PHONY: clean
clean:
	rm -rf vendor
	rm composer.lock

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
