# customization

PACKAGE_NAME = icanboogie/bind-view
PHPUNIT = vendor/bin/phpunit

# do not edit the following lines

.PHONY: usage
usage:
	@echo "test:  Runs the test suite.\ndoc:   Creates the documentation.\nclean: Removes the documentation, the dependencies and the Composer files."

vendor:
	@composer install

.PHONY: update
update:
	@composer update

test-dependencies: vendor

.PHONY: test
test: test-dependencies
	@$(PHPUNIT)

.PHONY: test-coverage
test-coverage: test-dependencies
	@mkdir -p build/coverage
	@$(PHPUNIT) --coverage-html ../build/coverage --coverage-text

.PHONY: test-coveralls
test-coveralls: test-dependencies
	@mkdir -p build/logs
	@$(PHPUNIT) --coverage-clover ../build/logs/clover.xml

.PHONY: test-container
test-container:
	@-docker-compose run --rm app bash
	@docker-compose down -v
