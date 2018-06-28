<?php

namespace App\Middleware;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Http\Curl;
use BotMan\BotMan\Interfaces\HttpInterface;
use BotMan\BotMan\Interfaces\MiddlewareInterface;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;

/**
 * RasaNLU Middleware
 * 
 * processes received messages
 * returns intents and entities
 * 
 */
class RasaNLU implements MiddlewareInterface
{

    /** @var HttpInterface */
    protected $http;

    /** @var stdClass */
    protected $response;

    /** @var string */
    protected $lastResponseHash;

    /** @var string */
    protected $apiUrl = 'rasa:5000/parse';

    /** @var bool */
    protected $listenForAction = false;

    /** @var int */
    private $minConfidence = 0.5;

    /**
     * Rasa constructor
     *
     * @param HttpInterface $http
     */
    public function __construct(HttpInterface $http)
    {
        $this->http = $http;
    }

    /**
     * Create a new Rasa middleware instance.
     * 
     * @return Rasa
     */
    public static function create()
    {
        return new static(new Curl());
    }

    /**
     * Restrict the middleware to only listen for Rasa actions.
     * 
     * @param  bool $listen
     * @return $this
     */
    public function listenForAction($listen = TRUE)
    {
        $this->listenForAction = $listen;

        return $this;
    }

    /**
     * Perform the Rasa API call and cache it for the message.
     *
     * @param  \BotMan\BotMan\Messages\Incoming\IncomingMessage $message
     * @return stdClass
     */
    protected function getResponse(IncomingMessage $message)
    {
        $response = $this->http->post($this->apiUrl, [], [
            'query' => [$message->getText()],
            'sessionId' => md5($message->getRecipient()),
            'project' => 'default',
                ], [
            'Content-Type: application/json; charset=utf-8',
                ], true);

        $this->response = json_decode($response->getContent());

        return $this->response;
    }

    /**
     * Handle a captured message.
     *
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $message
     * @param BotMan $bot
     * @param $next
     *
     * @return mixed
     */
    public function captured(IncomingMessage $message, $next, BotMan $bot)
    {
        return $next($message);
    }

    /**
     * Handle an incoming message.
     *
     * @param IncomingMessage $message
     * @param BotMan $bot
     * @param $next
     *
     * @return mixed
     */
    public function received(IncomingMessage $message, $next, BotMan $bot)
    {
        $response = $this->getResponse($message);

        $reply = isset($response->text) ? $response->text : '';
        $intent = isset($response->intent) ? $response->intent : '';
        $action = '';
        if (isset($intent->confidence) && ($intent->confidence > $this->minConfidence)) {
            $action = isset($intent->name) ? $intent->name : '';
        }
        $entities = isset($response->entities) ? (array) $response->entities : [];
        $collection = collect($entities)->mapWithKeys(function($item) {
            return [$item->entity => $item->value];
        })->all();

        $message->addExtras('apiReply', $reply);
        $message->addExtras('apiAction', $action);
        $message->addExtras('apiIntent', $intent);
        $message->addExtras('apiParameters', $entities);
        $message->addExtras('apiEntities', $collection);

        return $next($message);
    }

    /**
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $message
     * @param string $pattern
     * @param bool $regexMatched Indicator if the regular expression was matched too
     * @return bool
     */
    public function matching(IncomingMessage $message, $pattern, $regexMatched)
    {
        if ($this->listenForAction) {
            $pattern = '/^' . $pattern . '$/i';

            return (bool) preg_match($pattern, $message->getExtras()['apiAction']);
        }

        return true;
    }

    /**
     * Handle a message that was successfully heard, but not processed yet.
     *
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $message
     * @param BotMan $bot
     * @param $next
     *
     * @return mixed
     */
    public function heard(IncomingMessage $message, $next, BotMan $bot)
    {
        return $next($message);
    }

    /**
     * Handle an outgoing message payload before/after it
     * hits the message service.
     *
     * @param mixed $payload
     * @param BotMan $bot
     * @param $next
     *
     * @return mixed
     */
    public function sending($payload, $next, BotMan $bot)
    {
        return $next($payload);
    }

}