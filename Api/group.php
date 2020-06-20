<?php

// API group
$app->group('/testgroup', function($group){
	$group->get('', function($request, $response){
		$response->getBody()->write("This empty get method");
		return $response;
	});
	$group->get('/{name}', function($request,$response,$args){
		$name = $args['name'];
		$response->getBody()->write("Hello $name");
		return $response;
	});
});
// nested groups of Routes
$app->group('/API', function($group){
	$group->group('/v1', function($group){
		$group->get('/getuser', function($request,$response){
			$response->getBody()->write("get user v1");
			return $response;
		});
		$group->post('/adduser', function($request,$response){
			$response->getBody()->write("add user v1");
			return $response;
		});
	});
	$group->group('/v2', function($group){
		$group->get('/getuser', function($request,$response){
			$response->getBody()->write("get user v2");
			return $response;
		});
		$group->post('/adduser', function($request,$response){
			$response->getBody()->write("add user v2");
			return $response;
		});
	});
});