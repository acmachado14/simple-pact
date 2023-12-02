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

$app->post("/sum", function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();

    if (isset($data['number1']) && isset($data['number2'])) {
        $number1 = (int) $data['number1'];
        $number2 = (int) $data['number2'];
        $sum = $number1 + $number2;
        $response->getBody()->write(json_encode(['result' => $sum]));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }
    $errorResponse = ['error' => 'Please provide the numbers "number1" and "number2"'];
    $response->getBody()->write(json_encode($errorResponse));

    return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
});

$app->run();