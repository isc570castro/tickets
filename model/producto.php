<?php
class Producto
{    	
	public $idProducto;
	public $producto;
	public $descripcion;
	public $precioInterno;
	public $precioExternoMe;
	public $precioExternoMa;
	public $precioPublico;
	public $fsrMenudeo;
	public $fsrMayoreo;
	public $fsrPublico;
	public $existencia;
	public $status;
	public $mayoreo;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function Consultar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM productos");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Registrar(Producto $data)
	{
		$sql ="INSERT INTO productos VALUES(?,?,?,?,?,?,?,?,?,?,0,'ACTIVO',?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->producto,
				$data->descripcion,
				$data->precioInterno,
				$data->precioExternoMe,
				$data->precioExternoMa,
				$data->precioPublico,
				$data->fsrMenudeo,
				$data->fsrMayoreo,
				$data->fsrPublico,
				$data->mayoreo
			)
		);
	}

	public function Actualizar(Producto $data)
	{
		$sql ="UPDATE productos SET 
		producto = ?,
		descripcion = ?,
		precioInterno = ?,
		precioExternoMe = ?,
		precioExternoMa = ?,
		precioPublico = ?,
		fsrMenudeo = ?,
		fsrMayoreo = ?,
		fsrPublico = ?,
		mayoreo = ?
		WHERE idProducto=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->producto, 
				$data->descripcion, 
				$data->precioInterno, 
				$data->precioExternoMe, 
				$data->precioExternoMa, 
				$data->precioPublico, 
				$data->fsrMenudeo, 
				$data->fsrMayoreo,
				$data->fsrPublico, 
				$data->mayoreo,
				$data->idProducto
			)
		);
	}

	public function Baja($idProducto)
	{
		$sql = "DELETE FROM productos WHERE idProducto=?";
		$this->pdo->prepare($sql)
		->execute(array($idProducto));
	}


	public function AgregarProductos($idProducto, $existencia)
	{
		$sql ="UPDATE productos SET 
		existencia = ?
		WHERE idProducto=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$existencia, 
				$idProducto
			)
		);
	}
}
?>
