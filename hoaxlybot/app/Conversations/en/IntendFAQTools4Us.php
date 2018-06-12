<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendFAQTools4Us extends Conversation
{
    /**
     * First question
     */
    public function IntendFAQTools4Us()
    {
        $this->say('
        One thing is important: We don’t want to build tools for „them“. We build tools for us! We all have already shared problematic content (Yes, you too!). It is embarrassing. We don’t want it to happen.

        So if there would be a browser extension (one tool we have in mind) that warns us when an article has already been debunked before sharing, it can be very helpful (just as an example).

        The challenge in designing such tools is to make responsible sharing more comfortable, but refrain from promoting laziness at the same time and to encourage people to build their own opinion by checking references and sources for example.

        ');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendFAQTools4Us();
    }
}
