<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQFactCheckingHowto extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQFactCheckingHowto()
    {
        $this->say('You will find some information about how to fact check here: https://fullfact.org/toolkit/');
        $this->say('I will try to give you more sources and information about this important topic soon!');

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQFactCheckingHowto();
    }
}
