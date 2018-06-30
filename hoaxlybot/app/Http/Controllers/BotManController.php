<?php

namespace App\Http\Controllers;

use App\Conversations\en\ConvWelcome;
use App\Conversations\en\DefaultConversation;
use App\Conversations\en\IntendFAQDataPrivacy;
use App\Conversations\en\IntendFAQFactCheckingHowto;
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

use App\Conversations\en\IntendGoodbye;
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

            $intent = $botman->getMessage()->getExtras('apiIntent');
            $entities = $botman->getMessage()->getExtras('apiEntities');

            if (!empty($intent->name)) {
              switch ($intent->name) {
                case 'url_search':
                  $botman->startConversation(new IntendCheckUrl($entities));
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
                case 'faq_factcheck_howto':
                  $botman->startConversation(new IntendFAQFactCheckingHowto());
                  break;
                case 'faq_data_privacy':
                  $botman->startConversation(new IntendFAQDataPrivacy());
                  break;
                case 'goodbye':
                  $botman->startConversation(new IntendGoodbye());
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
