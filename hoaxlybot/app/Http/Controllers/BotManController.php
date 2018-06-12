<?php

namespace App\Http\Controllers;

use App\Conversations\en\ConvWelcome;
use App\Conversations\en\DefaultConversation;
use App\Conversations\en\IntendFAQFactcheckReport;
use App\Conversations\en\IntendFAQFactcheckSources;
use App\Conversations\en\IntendFAQAddSource;
use App\Conversations\en\IntendFAQContribute;
use App\Conversations\en\IntendFAQFactcheckerConcern;
use App\Conversations\en\IntendFAQFactcheckWho;
use App\Conversations\en\IntendFAQGetListed;
use App\Conversations\en\IntendFAQGoals;
use App\Conversations\en\IntendFAQHow;
use App\Conversations\en\IntendFAQLanguagesSupported;
use App\Conversations\en\IntendFAQLicence;
use App\Conversations\en\IntendFAQMeaningfulness;
use App\Conversations\en\IntendFAQTools4Us;
use App\Conversations\en\IntendCheckUrl;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Middleware\RasaNLU;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
      $botman = app('botman');

      // Use rasa_nlu.
      $rasaNLU = RasaNLU::create()->listenForAction(FALSE);
      $botman->middleware->received($rasaNLU);

      // Only use rasa if the server is running.
      if (!empty($rasaNLU)) {
        $botman->group(['middleware' => $rasaNLU], function($bot) {

          // Listen for all messages.
          $bot->hears(TRUE, function($botman) {

            $entities = $botman->getMessage()->getExtras('apiIntent');

            if (!empty($entities->name)) {
              switch ($entities->name) {
                case 'url_search':
                  $botman->startConversation(new IntendCheckUrl());
                  break;
                case 'greet':
                  $botman->startConversation(new ConvWelcome());
                  break;
                case 'faq_how':
                  $botman->startConversation(new IntendFAQHow());
                  break;
                case 'faq_goals':
                  $botman->startConversation(new IntendFAQGoals());
                  break;
                case 'faq_licence':
                  $botman->startConversation(new IntendFAQLicence());
                  break;
                case 'faq_contribute':
                  $botman->startConversation(new IntendFAQContribute());
                  break;
                case 'faq_factcheck_who':
                  $botman->startConversation(new IntendFAQFactcheckWho());
                  break;
                case 'faq_factcheck_sources':
                  $botman->startConversation(new IntendFAQFactcheckSources());
                  break;
                case 'faq_factcheck_report':
                  $botman->startConversation(new IntendFAQFactcheckReport());
                  break;
                case 'faq_factchecker_concern':
                  $botman->startConversation(new IntendFAQFactcheckerConcern());
                  break;
                case 'faq_language_support':
                  $botman->startConversation(new IntendFAQLanguagesSupported());
                  break;
                case 'faq_get_listed':
                  $botman->startConversation(new IntendFAQGetListed());
                  break;
                case 'faq_add source':
                  $botman->startConversation(new IntendFAQAddSource());
                  break;
                case 'faq_meaningfulness':
                  $botman->startConversation(new IntendFAQMeaningfulness());
                  break;
                case 'faq_change_people':
                  $botman->startConversation(new IntendFAQTools4Us());
                  break;
              }
            }

          });

        });
        $botman->listen();
      }
      else {
        // Simple fallback without rasa.
        $botman->hears('.*(hi).*', function ($bot) {
          $bot->startConversation(new ConvWelcome());
        });
        $botman->fallback(function($bot) {
          $bot->startConversation(new DefaultConversation());
        });
        $botman->listen();
      }


           /*

                $botman->hears('.*(goals|goal).*', function ($bot) {
                    $bot->startConversation(new IntendFAQGoals());
                });

                $botman->hears('.*(how).*', function ($bot) {
                    $bot->startConversation(new IntendFAQHow());
                });

                $botman->hears('.*(licence|free to use).*', function ($bot) {
                    $bot->startConversation(new IntendFAQLicence());
                });

                $botman->hears('.*(can I help|contribute).*', function ($bot) {
                    $bot->startConversation(new IntendFAQContribute());
                });

                $botman->hears('.*(Who is doing the factchecks).*', function ($bot) {
                    $bot->startConversation(new IntendFAQFactcheckWho());
                });

                $botman->hears('.*(factcheck source).*', function ($bot) {
                    $bot->startConversation(new IntendFAQFactcheckSources());
                });

                $botman->hears('.*(report|misleading|error).*', function ($bot) {
                    $bot->startConversation(new IntendFAQFactcheckReport());
                });

                $botman->hears('.*(factchecker open to provide content).*', function ($bot) {
                    $bot->startConversation(new IntendFAQFactcheckerConcern());
                });

                $botman->hears('.*(language support).*', function ($bot) {
                    $bot->startConversation(new IntendFAQLanguagesSupported());
                });

                $botman->hears('.*(get listed).*', function ($bot) {
                    $bot->startConversation(new IntendFAQGetListed());
                });

                $botman->hears('.*(add source).*', function ($bot) {
                    $bot->startConversation(new IntendFAQAddSource());
                });

                $botman->hears('.*(meaningfulness|make a difference?|does this work?|does this really work?).*', function ($bot) {
                    $bot->startConversation(new IntendFAQMeaningfulness());
                });

                $botman->hears('.*(accuse people|change people|target group).*', function ($bot) {
                    $bot->startConversation(new IntendFAQTools4Us());
                });

                $botman->listen();
           */

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
