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
        $this->say("You're very welcome to contribute! We are always looking for people creating new importer or help to improve our tools. Just contact us per e-mail (info+hoaxly@acolono.com) or have a look on open issues on github: WILL BE PROVIDED SOON");
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQContribute();
    }
}
