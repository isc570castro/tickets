<?php 

require_once 'model/cliente.php';

class ClientesController{
	public $model;
	private $mensaje;
	private $error;


	public function __CONSTRUCT(){
		$this->model = new Cliente();
	} 

	public function Index(){
		$clientes=true;
		$page='view/clientes/index.php';
		require_once 'view/index.php';
	}

	public function Consultar(){
		$valor = $_POST['valorBusqueda'];
		echo ' 
		<table class="table table-striped table-sm">
		<thead>
		<tr>
		<th scope="row">#</th>
		<th>Nombre</th>
		<th>Tienda</th>
		<th>Domicilio</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>RFC</th>	
		<td align="center"><strong>Editar</strong></td>
		<td align="center"><strong>Eliminar</strong></td>
		</tr>
		</thead>
		<tbody>';
		$n=1;
		foreach($this->model->Consultar($valor) as $cliente):
			echo '
			<tr>
			<th scope="row">'.$n.'</th>
			<td> '.$cliente->nombre.' </td>
			<td> '.$cliente->tienda.' </td>
			<td> '.$cliente->domicilio.' </td>
			<td> '.$cliente->telefono.' </td>
			<td> '.$cliente->email.' </td>
			<td> '.$cliente->rfc.' </td>	
			<td align="center"><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#mClientes" 
			onclick="editarCliente(';?>
			<?php echo "'" . $cliente->idCliente . "'"; ?>,
			<?php echo "'" . $cliente->nombre . "'"; ?>,
			<?php echo "'" . $cliente->tienda . "'"; ?>,
			<?php echo "'" . $cliente->domicilio . "'"; ?>,
			<?php echo "'" . $cliente->telefono . "'"; ?>,
			<?php echo "'" . $cliente->email . "'"; ?>,
			<?php echo "'" . $cliente->rfc . "'"; ?><?php echo ')
			"><i class="fa fa-edit"></i></button></td>
			<td align="center"><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mEliminar" onclick="eliminarCliente(' . $cliente->idCliente . ')"><i class="fa fa-trash"></i></button></td>
			</tr>
			</tr>
			';
			$n++;
		endforeach;
		echo '
		<tbody>
		</table>';

	}

	public function Guardar()
	{
		try {
			$cliente = new Cliente();
			$cliente->idCliente = $_POST['idCliente'];
			$cliente->nombre = $_POST['nombreCliente'];
			$cliente->tienda = $_POST['tienda'];
			$cliente->email = $_POST['email'];
			$cliente->telefono = $_POST['telefono'];
			$cliente->domicilio = $_POST['domicilio'];
			$cliente->rfc = $_POST['rfc'];
			if($cliente->idCliente > 0)
			{
				$this->model->Actualizar($cliente);
				echo 'Se han actualizado correctamente los datos';
			}else
			{
				$this->model->Registrar($cliente);
				echo 'Se han registrado correctamente los datos';
			}
		} catch (Exception $e) {
			// die($e->getMessage());
			echo 'Ha ocurrido un error al intentar guardar los datos del cliente';
		}
	}

	public function Baja()
	{
		try {
			$idCliente = $_POST['idCliente'];
			$this->model->Baja($idCliente);
			echo 'Se han eliminado correctamente los datos del cliente';
		} catch (Exception $e) {
			echo 'Ha ocurrido un error al intentar dar de baja los datos del cliente';
		}
	}
}
?>