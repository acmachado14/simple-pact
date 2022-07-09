<?php
require_once __DIR__ . "/vendor/autoload.php";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addErrorMiddleware(false, true, false);

$app->get("/person/{id}", function (Request $request, Response $response, array $args) {
    $body = [
        "first_name" => "Angelo",
        "last_name" => "Machado",
        "alias" => "gelin",
        "age" => 19,
    ];
    $response = $response->withHeader("Content-Type", "application/json");
    $response->getBody()->write(json_encode($body));
    return $response;
});

$app->run();