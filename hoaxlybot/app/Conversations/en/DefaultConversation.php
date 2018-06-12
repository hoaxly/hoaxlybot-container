<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\en\IntendFAQGoals;

class DefaultConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Sorry, I don't understand. What do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Tell me a joke')->value('joke'),
                Button::create('Show me your FAQs')->value('faqs'),
                //Button::create('Give me a fancy quote')->value('quote'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                }
                elseif ($answer->getValue() === 'faqs') {
                    $this->askFAQ();

                }
                /*
                else {
                    $this->say(Inspiring::quote());
                }*/
            }
        });
    }

    public function askFAQ()
    {
        $question = Question::create("What do you want to know?")
          ->fallback('Unable to ask question')
          ->callbackId('ask_faq')
          ->addButtons([
            Button::create('What are your goals?')->value('faq_goals'),
              //Button::create('Give me a fancy quote')->value('quote'),
          ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'faq_goals') {
                    $this->startConversation(new IntendFAQGoals());
                }
                elseif ($answer->getValue() === 'faq') {
                    $this->say('What do you want to know?');

                }

            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
