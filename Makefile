help:
	@echo make build
	@echo make run
	@echo make stop
	@echo make clean
	@echo make status
	@echo make ssh


build:
	docker-compose build

run:
	docker-compose up -d 

stop:
	docker-compose down 

clean:
	docker rm -f $$(docker ps -aq)
	docker rmi -f $$(docker images -aq)

status:
	docker ps -a
	echo
	docker images -a
	echo

ssh:
	docker exec -it guitar_php_1 /bin/bash
