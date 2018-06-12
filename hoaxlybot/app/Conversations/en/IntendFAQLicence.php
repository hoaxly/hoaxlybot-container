<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQLicence extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQLicence()
    {
        $this->say('All our tools will use a free license (e.g. GPL), so you are free to use, edit and/or contribute.');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQLicence();
    }
}
