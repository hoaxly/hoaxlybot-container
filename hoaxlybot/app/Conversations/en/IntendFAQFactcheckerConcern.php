<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQFactcheckerConcern extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQFactcheckerConcern()
    {
        $this->say('We just save metadata and link to the original source whenever possible. Our tools are aimed be another great channel for fact checkers to get more visitors and readers.');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQFactcheckerConcern();
    }
}
