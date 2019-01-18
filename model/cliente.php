<?php
class Cliente
{    	
	public $idCliente;
	public $nombre;
	public $tienda;
	public $email;
	public $telefono;
	public $domicilio;
	public $rfc;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function Consultar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM clientes");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Registrar(Cliente $data)
	{
		$sql ="INSERT INTO clientes VALUES(?,?,?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->nombre,
				$data->tienda,
				$data->telefono,
				$data->domicilio,
				$data->email,
				$data->rfc
			)
		);
	}

	public function Actualizar(Cliente $data)
	{
		$sql ="UPDATE clientes SET 
		nombre=?,
		tienda=?,
		telefono=?,
		domicilio=?,
		email=?,
		rfc=?
		WHERE idCliente=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->nombre,
				$data->tienda,
				$data->telefono,
				$data->domicilio,
				$data->email,
				$data->rfc,
				$data->idCliente
			)
		);
	}

	public function Baja($idCliente)
	{
		$sql = "DELETE FROM clientes WHERE idCliente=?";
		$this->pdo->prepare($sql)
		->execute(array($idCliente));
	}
}
?>
