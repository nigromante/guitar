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

.PHONY: info
info:
	@clear
	@pwd
	@echo
	@echo $$USER
	@echo
	@date
	@echo
	@neofetch

.PHONY: ps
ps:
	@glances

build:
	sudo docker-compose build

run:
	@docker-compose up -d 

stop:
	@docker-compose down 

clean:
	@clear
	@docker rm -f $$(docker ps -aq)  > /dev/null 2>&1 || 	@docker rmi -f $$(docker images -aq)   > /dev/null 2>&1 

clean-images:
	docker rmi -f $$(docker images -aq)

clean-data:
	@sudo rm -rf data/mysql
	@sudo rm -rf log
	
.PHONY: status
status:
	@clear
	@docker-compose ps 
	@echo
	@echo
	@docker-compose images
	@echo
	@echo

ssh:
	@docker-compose exec php /bin/bash

pull:
	git pull origin master

push:
	git push origin master

backup:
	./scripts/backup.sh

