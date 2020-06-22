<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

$app->add(function (Request $request, RequestHandler $handler) {
    $response = $handler->handle($request);
    $existingContent =$response->getBody();

    $response = new Response();
    $response->getBody()->write('BEFORE ' . $existingContent);

    return $response;
});

$app->add(function (Request $request, RequestHandler $handler) {
    $response = $handler->handle($request);
    $response->getBody()->write(' AFTER');
    return $response;
});

