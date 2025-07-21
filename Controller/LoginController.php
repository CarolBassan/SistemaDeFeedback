<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/Controller/LoginDAO.php';

$classe = new LoginDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['acao']) && $_POST['acao'] === 'login') {
		$classe->login();
		exit();
	} else {
		echo "Ação POST inválida.";
		exit();
	}
}

if (isset($_GET['function'])) {
	$metodo = $_GET['function'];
	if (method_exists($classe, $metodo)) {
		$classe->$metodo();
		exit();
	} else {
		die("Método $metodo não existe.");
	}
}
