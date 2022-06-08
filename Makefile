## —— Install
install: composer.lock ## Install vendors according to the current composer.lock file
	docker compose up -d
	composer install
	symfony console doctrine:migrations:migrate --no-interaction
	symfony console doctrine:fixtures:load --no-interaction
	symfony serve
