<?php
return array (
  'botman/driver-config' => 
  array (
    0 => 'stubs/slack.php',
    1 => 'stubs/web.php',
  ),
  'botman/driver' => 
  array (
    0 => 'BotMan\\Drivers\\Slack\\SlackDriver',
    1 => 'BotMan\\Drivers\\Web\\WebDriver',
  ),
  'botman/commands' => 
  array (
    0 => 'BotMan\\Drivers\\Slack\\Commands\\SlackRTMListenCommand',
  ),
);
