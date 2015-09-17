<?php

require_once __DIR__.'/../vendor/autoload.php';

//define('GOOGLE_API_KEY',      '389361308386-0lc02qa6gs3q0pf7j86hhj169to93jh9.apps.googleusercontent.com');
///define('GOOGLE_API_SECRET',   'nijEu5O05kXBLQv9pawzrF9Z');


$app = new Silex\Application();
$app['debug'] = true;

// $app->register(
//     new \BitolaCo\Silex\CapsuleServiceProvider(),
//     array( 
//          'capsule.connection' => array(
//             'driver' => 'postgres',
//             'host' => 'ec2-54-204-30-115.compute-1.amazonaws.com',
//             'database' => 'd9nevigsi7u2f9',
//             'username' => 'mbwzxqctsnhioc',
//             'password' => '39ZOOJgTCXnimTeS7FS6RsK4Li',
//             'charset' => 'utf8',
//             'collation' => 'utf8_unicode_ci',
//             'prefix' => '',
//             'logging' => true, // Toggle query logging on this connection.
//         )
//  //   )
// //);
$app->get('/', function() use($app) { 
});

$app->get('/login', function() use($app) { 
    $config = array(
      "base_url" => "http://localhost:8080",
      "providers" => array (
        "Google" => array (
          "enabled" => true,
          "keys"    => array ( "id" => "389361308386-0lc02qa6gs3q0pf7j86hhj169to93jh9.apps.googleusercontent.com", "secret" => "nijEu5O05kXBLQv9pawzrF9Z" ),
          "scope"           => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                               "https://www.googleapis.com/auth/userinfo.email"   , // optional
          "access_type"     => "offline",   // optional
    )));
 
 
    $hybridauth = new \Hybridauth\Hybridauth( $config );
 
    $adapter = $hybridauth->authenticate( 'Google' );
 
    $user_profile = $adapter->getUserProfile();
    return $user_profile;
}); 


$app->run();     