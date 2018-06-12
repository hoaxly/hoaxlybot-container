<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQFactcheckReport extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQFactcheckReport()
    {
        $this->say('Please open an issue or inform us about your concerns here: WILL BE PROVIDED SOON');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQFactcheckReport();
    }
}
