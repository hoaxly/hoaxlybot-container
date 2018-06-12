<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQFactcheckSources extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQFactcheckSources()
    {
        $this->say('We created a guideline that a fact checking organisation needs to be committed to, to be listed in our database. This guideline is inspired by the IFCN Code of Principles.');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQFactcheckSources();
    }
}
