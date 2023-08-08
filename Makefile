# Ayuda general del makefile
help:
	@clear
	@echo 😄 Opciones de entorno de desarrollo
	@echo	
	@echo make build
	@echo make run
	@echo make stop
	@echo make clean
	@echo make clean-images
	@echo make clean-data
	@echo make status
	@echo make ssh
	@echo make pull
	@echo make push
	@echo make backup
	@echo	


build:
	docker-compose build

run:
	docker-compose up -d 

stop:
	docker-compose down 

clean:
	docker rm -f $$(docker ps -aq)  
	docker rmi -f $$(docker images -aq)
	
clean-images:
	docker rmi -f $$(docker images -aq)

clean-data:
	sudo rm -rf data/mysql
	sudo rm -rf log
	
status:
	docker ps -a
	echo
	docker images -a
	echo

ssh:
	docker-compose exec php /bin/bash

pull:
	git pull origin master

push:
	git push origin master

backup:
	./scripts/backup.sh

