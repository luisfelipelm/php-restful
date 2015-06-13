<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() {
	echo "Welcome to guest API"	;
});

$app->get('/guests', function() use ($app) { // 'use' é usado para usar uma variavel dentro da funcao, neste caso $app
	$guests = array(
		array('id' => 1, 'name' => 'Luis Felipe', 'email' => 'luisfelipelmtc@gmail.com'),
		array('id' => 2, 'name' => 'Cecilia', 'email' => 'ceciliaaserpa@gmail.com'),
		array('id' => 3, 'name' => 'Alexandre', 'email' => 'alexandre05@gmail.com'),
	);	
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($guests);
});

$app->post('/guest', function() use ($app){
	$guest = json_decode($app->request->getBody(), true);
	$guest['id'] = 10;
	$app->response->header('Content-Type', 'application/json');
	echo json_encode($guest);
});

$app->delete('/guest/:id', function ($id)  use ($app) {
		echo $id;
});

$app->run();

?>