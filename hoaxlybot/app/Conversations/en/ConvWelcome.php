<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\en\IntendFAQGoals;
use App\Conversations\en\IntendCheckURL;


class ConvWelcome extends Conversation
{
    /**
     * First question
     */
    public function ConvWelcome()
    {
        $question = Question::create("Welcome, I am Nessie. What can I do for you?")
            ->fallback('Unable to ask question')
            ->callbackId('conv_welcome')
            ->addButtons([
                Button::create('Check a URL')->value('url'),
                Button::create('Inform me about hoaxly')->value('faq_goals'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'url') {
                    // = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    //$this->say($joke->value->joke);
                    $this->bot->startConversation(new IntendCheckURL(NULL));
                }
                elseif ($answer->getValue() === 'faq_goals') {
                    $this->bot->startConversation(new IntendFAQGoals());
                }
                else {
                    $this->say('Heureka!');
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->ConvWelcome();
    }
}
