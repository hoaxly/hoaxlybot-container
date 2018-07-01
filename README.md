
## About

This project is using Botman and Botman Studio, a laravel based chatbot framework: https://botman.io

## Development with docker

We provide docker images for development and production.

Prerequisites: Docker-Compose (https://docs.docker.com/compose/install/)

Currently you need access to registry.acolono.net. We will work on a documentation with an alternative approach. 
But basically you can also build your own docker images using the app.dockerfile from this repository and the Dockerfile
from the hoaxly/hoaxly-rasa-nlu_container repository and use this images in the docker-compose.yml.

$docker login registry.acolono.net:444
$docker pull registry.acolono.net:444/hoaxly/hoaxlybot-container:latest
$docker pul registry.acolono.net:444/hoaxly/hoaxly-rasa-nlu-container:latest
$docker-compose up

The webchat is then available under localhost:80.

You can specify another port for the app service in docker-compose.yml file if your port 80 is used already:
    
    ports:
      - 90:80

## Running locally without docker

Please see this system requirements: https://laravel.com/docs/5.6/installation#server-requirements

Clone project and run:
$composer install
$npm install

$php artisan serve 
should start an development server.

Run $npm dev to compile files.

Copy .env_loc as .env into the hoaxlybot folder.

Please be aware that running the app without docker the rasa_nlu server is not reachable, so no answers
will be provided by default. But see the section about how to use rasa to run a rasa server locally.

## Issues

MacOs: sh: composer: command not found
-> See https://laracasts.com/discuss/channels/general-discussion/sh-composer-command-not-found


## Using rasa

The rasa server should be available by calling the url rasa:5000 (docker service). 
Check the hoaxly/hoaxly-rasa-nlu_container repository to run a server locally under localhost:5000. 
You can change the api url in /app/Middleware/RasaNLU.php.



# Todos
- German conversations
- Idea: Provide more detailed information how to fact check content
- Idea: Provide information about fact-checking in general
- Idea: Ask and collect information what information the bot should provide