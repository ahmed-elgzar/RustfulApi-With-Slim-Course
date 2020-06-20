<?php

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