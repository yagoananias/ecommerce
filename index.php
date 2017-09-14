<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim(); //Chama uma nova aplicação do Slim

$app->config('debug', true); //Mostra todos os erros que ocorrem

//Criação de rota com barra /
$app->get('/', function() {
    
	$sql = new yagoananias\DB\Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

});

$app->run();

 ?>