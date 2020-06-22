<?php

$app->get('/testmiddle', function($request, $response){
	
	$response -> getBody() -> write("-- this is your route function --");

	return $response;
});