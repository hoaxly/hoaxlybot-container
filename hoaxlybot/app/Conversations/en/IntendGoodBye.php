<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendGoodbye extends Conversation
{
    /**
     * First question
     */
    public function IntendGoodBye()
    {
        $this->say('Good bye! And remember: Stay critical! There is so much bullshit content out there!');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendGoodBye();
    }
}
