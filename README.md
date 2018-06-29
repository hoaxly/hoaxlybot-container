
## About

This project is using Botman and Botman Studio, a laravel based chatbot framework: https://botman.io

## Development

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


## Issues

MacOs: sh: composer: command not found
-> See https://laracasts.com/discuss/channels/general-discussion/sh-composer-command-not-found


## Using rasa

The rasa server should be available with port 5000. Check the hoaxly/hoaxly-rasa-nlu_container repository.


# Todos
- German conversations
- Idea: Provide more detailed information how to fact check content
- Idea: Ask and collect information what information the bot should provide