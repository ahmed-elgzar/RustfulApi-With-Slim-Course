<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

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
// put resource
$app->put('/testput', function($request, $response){
	$data 		= $request->getParsedBody();
	$username 	= $data['userName'];
	$password 	= $data['Password'];
	$response->getBody()->write("hello $username, your password is $password");
	return $response;
});
// delete resource
$app->delete('/testdel',function($request, $response){
	$data 		= $request->getParsedBody();
	$username 	= $data['userName'];
	$password 	= $data['Password'];
	$response->getBody()->write("hello $username, your password is $password whith delete method");
	return $response;
});
// multiple methods
$app->map(['PUT','GET'],'/multi/{id}',function(Request $request, Response $response, array $args) {
	$id = $args['id'];
	if($request->isPut()){
		$response->getBody()->write("This id=$id Will be updated ");
	}
	if($request->isGet()){
		$response->getBody()->write("This id=$id Will be retrived ");
	}
	return $response;
});
// Optional Segments
$app->get('/optional/[{id}]', function($request,$response,$args) {
	$id = $args['id'];
	if (is_null($id)){
		$response->getBody()->write("The id is null");
	}else{
		$response->getBody()->write("The id = $id");
	}
	return $response;
});
// unlmited Optional Segments
$app->get('/unlmited/optional[/{parms:.*}]', function($request,$response,$args) {
	$parms = explode('/', $request->getAttribute('parms'));
	if (empty($parms[0])){
		$response->getBody()->write("The params list is null");
	}else{
		$out="";
		foreach ($parms as $key => $value) {
			$out = $out. " " . "$key => $value";
		}
		$response->getBody()->write($out);
	}
	return $response;
});
// regular expression test
$app->get('/regular/{id:[0-9]+}/{name:[a-z]+}', function($request, $response, $args){
	$id 	= $args['id'];
	$name 	= $args['name'];
	$response->getBody()->write("Hello $name , Your Id = $id");
	return $response;
});
// this is to run the whole code
$app->run();