<?php

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