<?php

namespace App\Conversations\en;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\en\IntendFAQFactCheckingHowto;
use GuzzleHttp;

class IntendCheckURL extends Conversation {


  function __construct($entities) {
    $this->entities = $entities;
  }


  public function IntendCheckURL() {

    $entities = $this->entities;

    if (!empty($this->entities)) {
      $url = $this->entities['url'];

      $result = $this->callAPI($url);

      if ($result['StatusCode'] == '200') {
        //Attention: HTML output will not work for every bot!
        // Get number of associated reviews.
        $stats = $this->getUrlStatistics($result['result']);
        // Get prepared output of the reviews list.
        $reviews = $this->prepareReviewsList($result['result']);

        if ($stats['CountAll'] == 1) {
          $this->say('I found one review about your url in the hoaxly database.');
        }
        else {
          $this->say('I found ' . $stats['CountAll'] . ' reviews about your url in the hoaxly database.');
        }

        // There is a questionable review:
        if ($stats['CountNeg'] >= 0) {
          $this->say('Be careful, at least one of them has been rated as questionable:');
        }
        elseif($stats['CountAll'] == 1) {
          $this->say('Here is the review:');
        }
        else {
          $this->say('Here is the list:');
        }
        // Output list of reviews.
        if (!empty($reviews)) {
          foreach ($reviews as $review) {
            $this->say($review);
          }
        }

        // Ask if there is need for help.
        $this->IntendCheckUrlHelp();
      }
      else {
        // No exact result but domain results. Todo.
        /*
        $this->say('I found no information about your exact url in the hoaxly database.
      But there are 3 negative reviews for this domain. This means you have to be careful about content published under this domain!
      ');*/

        // No result.
        $this->say('I found no information about your url in the hoaxly database.');
        $this->IntendHowToFactCheck();
      }

    }
    else {
      $this->say("Sorry, I don't know what url you want me to check! You can try 'Check url YOUR-URL'.");

    }

  }

  /**
   * Next step conversation.
   */
  public function IntendHowToFactCheck()
  {
    $this->ask('Do you need information how to check the content yourself?', [
      [
        'pattern' => 'yes|yep|yeah|ok|sure|yup',
        'callback' => function () {
          //$this->bot->startConversation(new IntendFAQHow());
          $this->bot->startConversation(new IntendFAQFactCheckingHowto());
        }
      ],
      [
        'pattern' => 'nah|no|nope',
        'callback' => function () {
          $this->say('Okay, then go on and fact check now!');
        }
      ]
    ]);
  }

  /**
   * Conversation to provide help about checking URLs.
   */
  public function IntendCheckUrlHelp()
  {
    $this->ask('Do you need help about what this is all about?', [
      [
        'pattern' => 'yes|yep|yeah|please|yes please',
        'callback' => function () {
          //$this->bot->startConversation(new IntendFAQHow());
          $this->say('There are thousands of fact checking sites out there. Hoaxly aggregates this data, so that I can check if there is a review for a special item or url.');
          $this->say('Currently I can only query URLs, but in future I will also be able to check quotes or other information.');
          $this->say('If you want me to check a URL just tell me something like "Please check url YOUR-URL".');
          $this->say('The hoax.ly database is still in development. So please be patient if there is no result. Dont forget that you can always fact check content also yourself!');
        }
      ],
      [
        'pattern' => 'nah|no|nope',
        'callback' => function () {
          $this->say('Cool!');
        }
      ]
    ]);
  }

  /**
   * Calls hoax.ly API and returns result.
   *
   * @param $url
   * @return array
   */
  public function callAPI($url)
  {
    $client = new GuzzleHttp\Client();
    try {
      $res = $client->get('https://api.hoax.ly/api/check?claimURL=' .$url);

      $statusCode = $res->getStatusCode();
      $json = json_decode((string) $res->getBody(), true);

    } catch (\Throwable $e) {
      $statusCode = 404;
      $json = NULL;
      //$this->exceptionHandler->handleException($e, $this);
    }

    return [
      'StatusCode' => $statusCode,
      'result' => $json
      ];
  }

  /**
   * Helper function to prepare reviews for output.
   *
   * @param $result
   * @return array of prepared reviews.
   */
  public function prepareReviewsList($result)
  {
    $reviews = NULL;
    if (!empty($result['reviews'])) {
      foreach ($result['reviews'] as $review) {
        $reviews[] = $review['Publisher']['name'] . ': ' . $review['title'] . ' (' . $review['ReviewRating']['normalizedAlternateName'] . '). Check the review: ' . $review['url'];
      }
      return $reviews;
    }
  }

  /**
   * Returns basic rating statistics.
   *
   * @param $result
   * @return array
   */
  public function getUrlStatistics($result)
  {
    $count = count($result['reviews']);
    $countPos = 0;
    $countNeg = 0;
    $countNeutral = 0;
    $countBlank = 0;

    if (!empty($result['reviews'])) {
      foreach ($result['reviews'] as $review) {
        switch ($review['ReviewRating']['ratingValue']) {
          case 1:
            $countNeg++;
            break;
          case 2:
            $countNeutral++;
            break;
          case 3:
            $countPos++;
            break;
          default:
            $countBlank++;
        }
      }
    }

    return [
      'CountPos' => $countPos,
      'CountNeg' => $countNeg,
      'CountNeutral' => $countNeutral,
      'CountBlank' => $countBlank,
      'CountAll' => $count
    ];
  }


    /**
     * Start the conversation
     */
    public function run()
    {
        $this->IntendCheckURL();
    }
}
