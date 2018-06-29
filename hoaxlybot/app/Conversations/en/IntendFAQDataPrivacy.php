<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQDataPrivacy extends Conversation
{
    /**
     * Answer
     */
    public function IntendFAQDataPrivacy()
    {
        $this->say('We take your privacy very serious, save as little data as possible and avoid to use third-party services. ');
        $this->say('Please check our privacy policy here: https://www.hoax.ly/data-privacy​');
        $this->say('In case you have any complaints or questions regarding our privacy policy you can reach us by mail: info@hoax.ly​');

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQDataPrivacy();
    }
}
