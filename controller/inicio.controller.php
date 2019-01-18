<?php 

// require_once 'model/cliente.php';

class InicioController{
	public function Index()
	{
		$inicio=true;
		$page="view/inicio/index.php";
		require_once 'view/index.php';
	}
}