<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQAddSource extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQAddSource()
    {
        $this->say('Please create an issue on github: Will be provided soon!');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQAddSource();
    }
}
