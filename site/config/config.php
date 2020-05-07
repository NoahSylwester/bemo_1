<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'panel' => [
        'install' => true,
    ],
    'email' => [
        'transport' => [
          'type' => 'smtp',
          'host' => 'smtp.company.com',
          'port' => 465,
          'security' => true,
          'auth' => true,
          'username' => 'apikey',
          'password' => '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'
        ]
    ],
    'routes' => [
      [
        'pattern' => 'logout',
        'action'  => function() {
  
          if ($user = kirby()->user()) {
            $user->logout();
          }
  
          go('login');
  
        }
      ]
    ]  
];
