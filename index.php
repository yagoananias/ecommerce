<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \yagoananias\Page;
use \yagoananias\PageAdmin;

$app = new Slim(); //Chama uma nova aplicação do Slim

$app->config('debug', true); //Mostra todos os erros que ocorrem

//Criação de rota com barra /
$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/admin', function() {

	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->run();

 ?>