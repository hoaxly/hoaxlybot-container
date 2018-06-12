<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQMeaningfulness extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQMeaningfulness()
    {
        $this->say('If our tools will help people becoming more media literate and being critically about information presented for example on social media to some extent, great. If not we have tried. Nothing more and nothing less.');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQMeaningfulness();
    }
}
