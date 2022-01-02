.PONY: start-local
start-local:
	docker-compose up -d

.PHONY: test
test:
	docker exec backend_php ./vendor/bin/behat -p cart_backend --format=pretty
