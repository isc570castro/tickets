<?php
class Pedido
{    	
	public $idPedido;
	public $folio;
	public $fecha;
	public $idCliente;
	public $totalPC;
	public $status;
	public $totalCC;
	public $precio;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function ConsultarPedidosClientes()
	{
		$stm = $this->pdo->prepare("SELECT * FROM pedidos_clientes pc, clientes c WHERE pc.idCliente = c.idCliente ORDER BY folio ASC");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function RegistrarInterno(Pedido $data)
	{
		$sql ="INSERT INTO pedidos_clientes VALUES(?,?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->folio,
				$data->fecha,
				$data->idCliente,
				$data->totalPC,
				'PENDIENTE'
			)
		);
		return $this->pdo->lastInsertId(); 
	}

	public function ActualizarInterno(Pedido $data)
	{
		$sql ="UPDATE pedidos_clientes SET 
		folio=?,
		fecha=?,
		idCliente=?,
		totalPC=?,
		WHERE idPedido=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->folio,
				$data->fecha,
				$data->idCliente,
				$data->totalPC,
				$data->idPedido
			)
		);
	}

	public function BajaInterno($folio)
	{
		$sql = "DELETE FROM pedidos_clientes WHERE folio=?";
		$this->pdo->prepare($sql)
		->execute(array($folio));
	}

	public function ObtenerCarritoInterno($idPedido)
	{
		$stm = $this->pdo->prepare("SELECT * FROM carrito_cliente cc, productos p WHERE cc.idProducto = p.idProducto AND cc.idPedido=?");
		$stm->execute(array($idPedido));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function AgregaCarritoInterno(Pedido $data)
	{
		$sql ="INSERT INTO carrito_cliente VALUES(?,?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPedido,
				$data->idProducto,
				$data->precio,
				$data->cantidad,
				$data->totalCC
			)
		);
	}

	public function QuitarCarritoInterno($id)
	{
		$sql = "DELETE FROM carrito_cliente WHERE id=?";
		$this->pdo->prepare($sql)
		->execute(array($id));
	}

	public function ActualizaCarritoInterno(Pedido $data)
	{
		$sql ="UPDATE carrito_cliente SET 
		idProducto=?,
		precio=?,
		cantidad=?,
		totalCC=?
		WHERE idPedido=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idProducto,
				$data->precio,
				$data->cantidad,
				$data->totalCC,
				$data->idPedido
			)
		);
	}

	public function ObtenerUltimoFolio()
	{
		$stm = $this->pdo->prepare("SELECT MAX(folio) As ultimoFolio from pedidos_clientes");
		$stm->execute();
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ObtenerMayoreo($idProducto)
	{
		$stm = $this->pdo->prepare("SELECT mayoreo from productos WHERE idProducto = ?");
		$stm->execute(array($idProducto));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ObtenerPrecioProductoMayoreo($idProducto)
	{
		$stm = $this->pdo->prepare("SELECT precioExternoMa from productos WHERE idProducto = ?");
		$stm->execute(array($idProducto));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ObtenerPrecioProductoMenudeo($idProducto)
	{
		$stm = $this->pdo->prepare("SELECT precioExternoMe from productos WHERE idProducto = ?");
		$stm->execute(array($idProducto));
		return $stm->fetch(PDO::FETCH_OBJ);
	}
}
?>
