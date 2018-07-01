<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQContribute extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQContribute()
    {
        $this->say("You're very welcome to contribute! We are always looking for people integrating new sources or help to improve our tools.");
        $this->say("Just have a look on open issues on github or create an issue yourself: https://github.com/hoaxly");
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQContribute();
    }
}
