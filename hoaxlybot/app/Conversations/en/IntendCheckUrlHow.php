<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class IntendCheckURLHow extends Conversation {


  public function IntendCheckURLHow() {

    $this->say('You are welcome! You can ask me to check urls for example like this: "Check url YOUR-URL".');
    $this->say("For example: 'Check url https://www.maybe-a-misleading-article.com/1/. Yes you can try this one!");

  }

  /**
   * Start the conversation
   */
  public function run()
  {
    $this->IntendCheckURLHow();
  }
}