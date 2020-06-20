<?php

$app->get('/requestTest/{name}', function($request ,$response ,$args){
	 $out 					= [];
	$out['method'] 			= $request->getMethod();
	//$out['content'] 		= $request->getContentType();
	//$out['isget']			= $request->isGet();
	//$out['mediaType']		= $request->getMediaType();
	$out['host']			= $request->getUri()->getHost();
	$out['port']			= $request->getUri()->getPort();
	//$out['isxhr']			= $request->isXhr();
	$out['Request Name']	= $request->getAttributes('name');
	$out['Body Data']		= $request->getParsedBody();
	//headers
	$headers 				= $request->getHeaders();
	$i 						= -1;
	foreach ($headers as $key => $value) {
		$out[$key]  		= $key . ":" . implode(",", $value);
	}
	$response->getBody()->write(json_encode($out));
	return $response;
});