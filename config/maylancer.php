<?php


return [

    /*
   |--------------------------------------------------------------------------
   | Product lists array
   |--------------------------------------------------------------------------
   |
   | Ensure the array has product information like name, price, description, image URL etc
   |
   */

    'products' => [
         //List of products
    ],


      /*
      |--------------------------------------------------------------------------
      | Open source lists array
      |--------------------------------------------------------------------------
      |
      */
    'open-source' => [
        'nubapi' => [
            'docs' => 'https://maylancer.org/docs/nuban',
            'name' => 'Nubapi',
            'description' => 'Real-time Nigeria Bank API',
            'website' => 'https://nubapi.com'
        ],
        'mailcade' => [
            'docs' => 'https://maylancer.org/docs/mailcade',
            'name' => 'Mailcade',
            'description' => 'Developer Mail Sandbox - Email testing made easy',
            'repository' => 'https://github.com/olakunlevpn/mailcade.git'
        ],

        'laravel-installer' => [
            'docs' => 'https://maylancer.org/docs/laravel-installer',
            'name' => 'Laravel Installer',
            'description' => 'A flexible, plugin-based Laravel installer package with great architecture',
            'repository' => 'https://github.com/olakunlevpn/laravel-installer.git'
        ],

    ]

];
