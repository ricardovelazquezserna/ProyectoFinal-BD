<?php
header('Access-Control-Allow-Origin: *');
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->contentType('application/json');
$app->post('/agregarProcedimiento(/)', function() {
    require 'projects/procedimientos/functions.php';    
    $result = agregarProcedimiento();    
    echo $result;
});
$app->post('/agregarTarea(/)', function() {
    require 'projects/procedimientos/functions.php';    
    $result = agregarTarea();    
    echo $result;
});
$app->post('/ligarValores(/)',function(){
require 'project/procedimientos/functions.php';
$result = ligarValores();
echo $result;
});
$app->post('/buscarProcedimiento(/)',function(){
require 'project/procedimientos/functions.php';
$result = buscarProcedimiento();
echo $result;
});
$app->get('/selectDpt(/)', function() {
    require 'projects/procedimientos/functions.php';
    $response = selectDpt();
    echo $response;
});
$app->get('/selectPdt(/)', function() {
    require 'projects/procedimientos/functions.php';

    $response = selectPdt();

    echo $response;
});

$app->run();
