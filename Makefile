.PONY: start-local
start-local:
	docker-compose up -d
down-local:
	docker-compose down
.PHONY: test
test:
	docker exec backend_php ./vendor/bin/behat -p cart_backend --format=pretty

unit-test:
	docker exec backend_php ./vendor/bin/phpunit --testsuite cartshop
