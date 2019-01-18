<?php 

require_once 'model/pedido.php';
require_once 'model/cliente.php';
require_once 'model/producto.php';

class PedidosController{
	public $model;
	public $modelClientes;
	public $modelProductos;

	public function __CONSTRUCT(){
		$this->model = new Pedido();
		$this->modelClientes = new Cliente();
		$this->modelProductos = new Producto();
	} 

	public function PedidosClientes(){
		$pedidos=true;
		$page='view/pedidos/clientes.php';
		require_once 'view/index.php';
	}

	public function ConsultarPedidosClientes(){
		$valor = $_POST['valorBusqueda'];
		echo ' 
		<table class="table table-striped table-sm">
		<thead>
		<tr>
		<th scope="row">Folio</th>
		<th>Fecha</th>
		<th>Cliente</th>
		<th><center>Total</center></th>
		<th><center>Status</center></th>	
		<td align="center"><strong>Opciones</strong></td>
		</tr>
		</thead>
		<tbody>';
		$n=1;
		foreach($this->model->ConsultarPedidosClientes($valor) as $pedido):
			$numeroMes = substr($pedido->fecha, 5, 2);
			$nombreMes = $this->ObtenerMes($numeroMes);
			$fecha = substr($pedido->fecha, 8, 2)." de ".$nombreMes." del ".substr($pedido->fecha, 0, 4);
			echo '
			<tr>
			<th scope="row">&nbsp;&nbsp;&nbsp;&nbsp;'.$pedido->folio.'</th>
			<td> '.$fecha.' </td>
			<td> '.$pedido->nombre.' </td>
			<td align="center">$ '.$pedido->totalPC.' </td>
			<td align="center"> '.$pedido->status.' </td>
			<td align="center">
			<div class="btn-group" role="group">
			<button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-ellipsis-h"></i></button>
			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="min-width:120px;">
			<a class="dropdown-item" href="#"><i class="fa fa-trash" style="color:#dc3545!important"></i> Borrar</a>
			<a class="dropdown-item" href="#"><i class="fa fa-edit" style="color:#0062cc!important"></i> Editar</a>
			</div>
			</div>
			</td>
			</tr>
			';
			$n++;
		endforeach;
		echo '
		<tbody>
		</table>';
	}

	public function ObtenerMes($date)
	{
		switch ($date) {
			case '1':
			$mes = 'enero';
			break;
			case '2':
			$mes = 'febrero';
			break;
			case '3':
			$mes = 'marzo';
			break;
			case '4':
			$mes = 'abril';
			break;
			case '5':
			$mes = 'mayo';
			break;
			case '6':
			$mes = 'junio';
			break;
			case '7':
			$mes = 'julio';
			break;
			case '8':
			$mes = 'agosto';
			break;
			case '9':
			$mes = 'septiembre';
			break;
			case '10':
			$mes = 'octubre';
			break;
			case '11':
			$mes = 'noviembre';
			break;
			case '12':
			$mes = 'diciembre';
			break;
		}
		return $mes;
	}

	public function GuardarPedidoCliente()
	{
		try {
			$pedido = new Pedido();
			$pedido->idPedido = $_POST['idPedido'];
			$pedido->folio = $_POST['folio'];
			$pedido->fecha = $_POST['fecha'];
			$pedido->idCliente = $_POST['idCliente'];
			$pedido->totalPC = $_POST['total'];
			if($pedido->idPedido > 0)
			{
				$this->model->ActualizarInterno($pedido);
				echo 'Se han actualizado correctamente los datos';
			}else
			{
				$id = $this->model->RegistrarInterno($pedido);
				echo $id;
			}
		} catch (Exception $e) {
			die($e->getMessage());
			// echo 'Ha ocurrido un error al intentar guardar los datos del pedido';
		}
	}

	public function BajaPedidoCliente()
	{
		try {
			$idpedido = $_POST['idpedido'];
			$this->model->BajaCliente($idpedido);
			echo 'Se han eliminado correctamente los datos del pedido';
		} catch (Exception $e) {
			echo 'Ha ocurrido un error al intentar dar de baja los datos del pedido';
		}
	}

	public function ObtenerProximoFolio()
	{
		$res = $this->model->ObtenerUltimoFolio();
		if ($res==null)
			$ultimoFolio = 1;
		else
			$ultimoFolio = $res->ultimoFolio + 1;
		echo $ultimoFolio;
	}

	public function ObtenerPrecioProducto()
	{
		$idProducto = $_GET['idProducto'];
		$cantidad = $_GET['cantidad'];
		$may = $this->model->ObtenerMayoreo($idProducto);
		if($cantidad<$may->mayoreo){
			$res = $this->model->ObtenerPrecioProductoMenudeo($idProducto);
			$precio = $res->precioExternoMe;
		}else{
			$res = $this->model->ObtenerPrecioProductoMayoreo($idProducto);
			$precio = $res->precioExternoMa;
		}
		echo $precio;
	}

	public function ListarClientes()
	{
		header('Content-Type: application/json');
		$datos = array();
		foreach ($this->modelClientes->Consultar() as $cliente):
			$row_array['idCliente']  = $cliente->idCliente;
			$row_array['nombre']  = $cliente->nombre;
			array_push($datos, $row_array);
		endforeach;		
		echo json_encode($datos, JSON_FORCE_OBJECT);
	}

	public function ListarProductos()
	{
		header('Content-Type: application/json');
		$datos = array();
		foreach ($this->modelProductos->Consultar() as $producto):
			$row_array['idProducto']  = $producto->idProducto;
			$row_array['producto']  = $producto->producto;
			array_push($datos, $row_array);
		endforeach;		
		echo json_encode($datos, JSON_FORCE_OBJECT);
	}

	public function AgregarAlCarrito()
	{
		try {
			$pedido = new Pedido();
			$pedido->idPedido = $_POST['idPedido'];
			$pedido->idProducto = $_POST['idProducto'];
			$pedido->cantidad = $_POST['cantidad'];
			$pedido->precio = $_POST['precio'];
			$pedido->totalCC = $_POST['totalCC'];
			$this->model->AgregaCarritoInterno($pedido);
			echo 'Se han registrado correctamente los datos';
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerCarritoCliente()
	{
		header('Content-Type: application/json');
		$idPedido = $_GET['idPedido'];
		$datos = array();
		foreach ($this->model->ObtenerCarritoInterno($idPedido) as $productoPedido):
			$row_array['id'] = $productoPedido->id;
			$row_array['idProducto']  = $productoPedido->idProducto;
			$row_array['producto']  = $productoPedido->producto;
			$row_array['precio']  = $productoPedido->precio;
			$row_array['cantidad']  = $productoPedido->cantidad;
			$row_array['totalCC']  = $productoPedido->totalCC;
			array_push($datos, $row_array);
		endforeach;		
		echo json_encode($datos, JSON_FORCE_OBJECT);
	}
}
?>