start-db:
	docker run --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_USER=todos -e MYSQL_PASSWORD=todos -e MYSQL_DATABASE=todos -d mysql

migrate:
	./node_modules/.bin/knex migrate:latest

start-server:
	cd src && composer run start