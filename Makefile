code-style:

	docker-compose run --rm php vendor/bin/php-cs-fixer -v fix --allow-risky yes

composer-install:

	docker-compose run --rm php composer install

composer-require:

	docker-compose run --rm php composer require $(p)

composer-update:

	docker-compose run --rm php composer update $(p)