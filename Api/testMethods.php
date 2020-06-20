<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
// post test
$app->post('/hello/test', function (Request $r1 , Response $r2){
	$data = $r1->getParsedBody();
	$inputdata = [];
	$inputdata['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
	$inputdata['phone'] = filter_var($data['phone'], FILTER_SANITIZE_STRING);
	$r2->getBody()->write("dear " . $inputdata['name'] . ", your phone number is " . $inputdata['phone']);
	return $r2;
});

$app->get('/testargs/{name}/{age}', function ($request,$response,$args) {
    $name = $args['name'];
    $age  = $args['age'];
    $response->getBody()->write("Hello $name Your age is $age");
    return $response;
});
$app->get('/jsontest/{fname}/{lname}',function($request ,$response , $args){
	$Fname 			= $args['fname'];
	$Lname 			= $args['lname'];
	$out   			= [];
	$out['Stats']	= 200;
	$out['Message'] = "This  is Json Response Test";
	$out['First Name'] = $Fname;
	$out['Last Name'] = $Lname;
	$response->getBody()->write(json_encode($out));
	return $response;
});