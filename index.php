<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \yagoananias\Page;
use \yagoananias\PageAdmin;
use \yagoananias\Model\User;

$app = new Slim(); //Chama uma nova aplicação do Slim

$app->config('debug', true); //Mostra todos os erros que ocorrem

//Criação de rota com barra /
$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/admin', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {

	User::login($_POST['login'], $_POST['password']);

	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {

	User::Logout();

	header("Location: /admin/login");
	exit;

});

$app->run();

 ?>