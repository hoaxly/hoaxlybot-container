
## Howto

To start BotMan Studio locally run
$php artisan serve

You can test the bot now using the tinker web interface: http://127.0.0.1:8000/botman/tinker

## Issues

MacOs: sh: composer: command not found
-> See https://laracasts.com/discuss/channels/general-discussion/sh-composer-command-not-found

## Development

- Use ngrok for exposing your local webserver (e.g. when you want to connect to chatbot provider)
  $ngrok http 8000

- $npm install
- $npm run dev

## Deployment (?TODO?)
- $composer install
- $npm install
- $npm run prod
- $artisan serve


## Using rasa

The rasa server should be available with port 5000. Check the hoaxly-rasa-nlu_container.

Starting server:
$ python -m rasa_nlu.server --path projects

Test:
$ curl -X POST localhost:5000/parse -d '{"q":"I am looking for Mexican food"}' | python -m json.tool

# Todos
- Check URL conversation and hoaxly API calls
- German conversations
- Setup deployment
- Idea: Provide information how to debunk content
- Idea: Ask and collect information what information the bot should provide