<?php 

require_once 'model/venta.php';

class VentasController{
	public $model;
	private $mensaje;
	private $error;

	public function __CONSTRUCT(){
		$this->model = new Venta();
	} 

	public function Index(){
		$ventas=true;
		$page='view/ventas/index.php';
		require_once 'view/index.php';
	}
}
?>