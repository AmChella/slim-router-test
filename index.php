<?php

require_once __DIR__ . "/vendor/autoload.php";

use \Cs\Router\Util\App as Router;
use RouterTest\App;

$context = new App();


$cors = [
      "origin" => [
        "http://ui.pagecentral.com"
      ], 
      "allow_credentials" => true, 
      "accept_headers" => "Content-Type, X-Requested-With"
    ];

$app = new Router(
    '', $context, $context->get('routes'), $cors
);
$app->run();

