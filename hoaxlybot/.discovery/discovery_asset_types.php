<?php
return array (
  'botman/driver-config' => 
  array (
    0 => 
    array (
      'value' => 'stubs/slack.php',
      'package' => 'botman/driver-slack',
      'packageDir' => 'vendor/botman/driver-slack/',
      'priority' => 0.0,
      'metadata' => 
      array (
      ),
    ),
    1 => 
    array (
      'value' => 'stubs/web.php',
      'package' => 'botman/driver-web',
      'packageDir' => 'vendor/botman/driver-web/',
      'priority' => 0.0,
      'metadata' => 
      array (
      ),
    ),
  ),
  'botman/driver' => 
  array (
    0 => 
    array (
      'value' => 'BotMan\\Drivers\\Slack\\SlackDriver',
      'package' => 'botman/driver-slack',
      'packageDir' => 'vendor/botman/driver-slack/',
      'priority' => 0.0,
      'metadata' => 
      array (
      ),
    ),
    1 => 
    array (
      'value' => 'BotMan\\Drivers\\Web\\WebDriver',
      'package' => 'botman/driver-web',
      'packageDir' => 'vendor/botman/driver-web/',
      'priority' => 0.0,
      'metadata' => 
      array (
      ),
    ),
  ),
  'botman/commands' => 
  array (
    0 => 
    array (
      'value' => 'BotMan\\Drivers\\Slack\\Commands\\SlackRTMListenCommand',
      'package' => 'botman/driver-slack',
      'packageDir' => 'vendor/botman/driver-slack/',
      'priority' => 0.0,
      'metadata' => 
      array (
      ),
    ),
  ),
);
