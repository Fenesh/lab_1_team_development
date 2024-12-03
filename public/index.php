<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SQLite3;

require_once dirname(__DIR__) . '/vendor/autoload.php';


$db = new SQLite3(dirname(__DIR__) . '/db/db_user.db');
$app = \DI\Bridge\Slim\Bridge::create();

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->addRoutingMiddleware();  

$app->run();

function render(string $path, array $data = []) {
    if(!file_exists( dirname(__DIR__) . '/templates/' . $path . '.php'))
        throw new Exception('Template file not found');

    ob_start();
    (function($path, $data) {
        extract($data);

        require dirname(__DIR__) . '/templates/' . $path . '.php'; 
    })($path, $data);
    return ob_get_clean();
}