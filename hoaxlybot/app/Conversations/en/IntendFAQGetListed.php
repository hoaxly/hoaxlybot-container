<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQGetListed extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQGetListed()
    {
        $this->say('If you are a fact checker and you are not a verified signature to the IFCN Code of Principles you need to answer a few questions. More details soon!');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQGetListed();
    }
}
