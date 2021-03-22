# laravelexamplecrud
laravel application with docker docker-compose and npm   (CRUD system)

docker-compose up -d --build site
docker-compose run --rm composer update
docker-compose run --rm npm run dev
docker-compose run --rm artisan migrate
