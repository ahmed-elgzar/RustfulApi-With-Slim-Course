<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

require __DIR__ . '/../src/middleware.php';
require __DIR__ . '/../Api/testMethods.php';
require __DIR__ . '/../Api/multible.php';
require __DIR__ . '/../Api/optional.php';
require __DIR__ . '/../Api/putResource.php';
require __DIR__ . '/../Api/group.php';
require __DIR__ . '/../Api/request.php';
require __DIR__ . '/../Api/response.php';
require __DIR__ . '/../Api/testmiddleware.php';

// this is to run the whole code
$app->run();