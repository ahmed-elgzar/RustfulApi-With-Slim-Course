<?php

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