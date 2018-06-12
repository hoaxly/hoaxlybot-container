<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQLanguagesSupported extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQLanguagesSupported()
    {
        $this->say("We will have a focus on European and English/German content. But our system will be flexible enough to provide content in any language.");
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQLanguagesSupported();
    }
}
