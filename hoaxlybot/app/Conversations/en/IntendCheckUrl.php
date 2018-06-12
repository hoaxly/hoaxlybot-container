<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\en\IntendFAQGoals;

class IntendCheckURL extends Conversation
{
    /**
     * First question
     */
    public function IntendCheckURL()
    {
        $this->say('Please be patient, we will be ready to check URLs soon!');

/*
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                }
                elseif ($answer->getValue() === 'faqs') {
                    $this->askFAQ();

                }
                else {
                    $this->say(Inspiring::quote());
                }
            }
        });
*/
    }


    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendCheckURL();
    }
}
