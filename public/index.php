<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

require __DIR__ . '/../Api/testMethods.php';
require __DIR__ . '/../Api/multible.php';
require __DIR__ . '/../Api/optional.php';
require __DIR__ . '/../Api/putResource.php';
require __DIR__ . '/../Api/group.php';
// this is to run the whole code
$app->run();