cd .\src\

composer update

cd ..

docker-compose up -d

docker-compose run artisan migrate

project http://localhost:8000

phpmyadmin http://localhost:8081    (USERNAME=laravel PASSWORD=password)