<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQHow extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQHow()
    {
        $this->say('Central for this tool and all hoax.ly tools is a database about fact checks from various sources. There are thousands of fact checking sites out there.

        We aggregate this data, so that people can use it to build awesome tools and apps. We only save metadata and provide an open API to access this data.

        We also are going to build some tools consuming this data on our own: A browser extension, some chatbots for various platforms (its me!) and a fact checking search site.');
    }

    public function askNextStep()
    {
        $this->ask('Awesome, right?', [
          [
            'pattern' => 'yes|yep|true|yeah|cool|sure',
            'callback' => function () {
                $this->bot->typesAndWaits(1);
                $this->say("Cool!");
                $this->say('You can ask me also about how to contribute for example!');
            }
          ],
          [
            'pattern' => 'nah|no|nope|not',
            'callback' => function () {
                $this->bot->startConversation(new IntendFAQMeaningfulness());
            }
          ]
        ]);
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQHow();
        $this->askNextStep();
    }
}
