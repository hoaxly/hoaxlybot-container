<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\en\IntendFAQHow;


class IntendFAQGoals extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQGoals()
    {
        $this->say('We want to build tools that provide technological assistance to help people to be data literate consumers.');
    }

    public function askNextStep()
    {
        $this->ask('Do you want to know more?', [
          [
            'pattern' => 'yes|yep|yeah|please|ja',
            'callback' => function () {
                $this->bot->startConversation(new IntendFAQHow());
            }
          ],
          [
            'pattern' => 'nah|no|nope|nein|never|not at all',
            'callback' => function () {
                $this->say('Sad Panda! :(');
            }
          ]
        ]);
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQGoals();
        $this->askNextStep();
    }
}
