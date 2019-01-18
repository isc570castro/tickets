<?php 
require_once 'model/database.php';
session_start();
$controller = 'login';
if (!isset($_REQUEST['c'])) {
	require_once "controller/login.controller.php";
	$var= new LoginController;
	$var->Index();
}else{
	// Obtenemos el controlador que queremos cargar
	$controller = $_REQUEST['c'];
	//$cambio = isset($_REQUEST['n']) ? $_REQUEST['n'] : 'Index';
	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

	// Instanciamos el controlador
	require_once "controller/$controller.controller.php";
	$controller = ucwords($controller) . 'Controller';
	$controller = new $controller;
    //$controller->Index();

      // Llama la accion
	//call_user_func( array( $controller, $cambio) );
	call_user_func( array( $controller, $accion) );
}

?>