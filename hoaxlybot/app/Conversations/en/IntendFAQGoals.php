<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQGoals extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQGoals()
    {
        $this->say('Our goals with hoax.ly? We want to build tools that provide technological assistance to help people to be data literate consumers.');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQGoals();
    }
}
