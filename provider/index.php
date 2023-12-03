<?php
require_once __DIR__ . "/vendor/autoload.php";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addErrorMiddleware(false, true, false);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Origin');
});

$app->post("/sum", function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();

    if (isset($data['number1']) && isset($data['number2'])) {
        $number1 = $data['number1'];
        $number2 = $data['number2'];

        if (is_int($number1) && is_int($number2)) {
            $sum = $number1 + $number2;
            $response->getBody()->write(json_encode(['result' => $sum]));
            return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode(['error' => 'Please provide the numbers "number1" and "number2" as integers']));
        return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
    }

    $response->getBody()->write(json_encode(['error' => 'Please provide the numbers "number1" and "number2"']));
    return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
});

$app->run();