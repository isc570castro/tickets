<?php 

require_once 'model/presupuesto.php';

class PresupuestosController{
	public $model;
	private $mensaje;
	private $error;

	public function __CONSTRUCT(){
		$this->model = new Presupuesto();
	} 

	public function Index(){
		$presupuesto='';
		$presupuestos=true;
		$page='view/presupuestos/index.php';
		require_once 'view/index.php';
	}

	public function Presupuesto(){
		$presupuestos=true;
		$idPresupuesto = $_REQUEST['idPresupuesto'];
		$presupuesto = $this->model->Obtener($idPresupuesto);
		$page="view/presupuestos/presupuesto.php";
		include 'view/index.php';
	}

	public function Consultar(){
		$valor = $_POST['valorBusqueda'];
		echo ' 
		<table class="table table-striped table-sm">
		<thead>
		<tr>
		<th scope="row">#</th>
		<th>Descripción</th>
		<th>Cliente</th>
		<th>Monto total</th>
		<td align="center"><strong>Detalles</strong></td>
		<td align="center"><strong>Eliminar</strong></td>
		<td align="center"><strong>Vender</strong></td>	
		</tr>
		</thead>
		<tbody>';
		$n=1;
		foreach($this->model->Consultar($valor) as $presupuesto):
			echo '
			<tr>
			<th scope="row">'.$n.'</th>
			<td><a href="?c=presupuestos&a=Presupuesto&idPresupuesto='.$presupuesto->idPresupuesto.'" data-toggle="tooltip" data-placement="top" title="Ver detalles de presupuesto">'.$presupuesto->descripcion.'</a> </td>
			<td> '.$presupuesto->nombreCliente.' </td>
			<td> <strong>$ '.$presupuesto->montoTotal.'</strong> </td>
			<td align="center"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a></td>
			<td align="center"><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mEliminar"><i class="fa fa-trash"></i></button></td>
			<td align="center"><button type="button" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Generar venta"><i class="fas fa-dollar-sign"></i></button></td>
			</tr>
			';
			$n++;
		endforeach;
		echo '
		<tbody>
		</table>';
	}  

	public function RegistraCalculo(){
		$idPresupuesto = $_REQUEST['idPresupuesto'];
		$noRegistro = $_REQUEST['noRegistro'];
		if ($noRegistro==0)
			$this->model->RegistraCalculo($idPresupuesto);
		else
			$this->model->ActualizaCalculo($idPresupuesto, $noRegistro);
		echo 'ok';
	}

	public function Calculo(){
		$presupuestos=true;
		$idPresupuesto = $_REQUEST['idPresupuesto'];
		$tipoMadera = $_REQUEST['tipoMadera'];
		$page="view/presupuestos/calculo.php";
		include 'view/index.php';
	}

	public function ConsultarDetalles(){
		$idPresupuesto = $_REQUEST['idPresupuesto'];
		$tipoMadera = $_REQUEST['tipoMadera'];
		echo ' 
		<table class="table table-striped table-sm">
		<thead>
		<tr>
		<th scope="row">#</th>
		<td align="center"><b>Cantidad</b></td>
		<td align="center"><b>Grueso</b></td>
		<td align="center"><b>Ancho</b></td>
		<td align="center"><b>Largo</b></td>
		<td align="center"><b>Cant. Pies</b></td>
		<td align="center"><strong>Editar</strong></td>
		<td align="center"><strong>Eliminar</strong></td>
		</tr>
		</thead><tbody>';
		$n=1;
		foreach($this->model->ObtenerDetalles($idPresupuesto, $tipoMadera) as $detalle):
			echo '
			<tr>
			<th scope="row">'.$n.'</th>
			<td align="center">'.$detalle->cantidad.'</td>
			<td align="center">'.$detalle->grueso.'</td>
			<td align="center">'.$detalle->ancho.'</td>
			<td align="center">'.$detalle->largo.'</td>
			<td align="center">'.$detalle->cantPies.'</td>
			<td align="center"><a href="?c=presupuestos&a=Calculo&idPresupuesto=<?php echo $idPresupuesto; ?>&tipoMadera=pino" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a></td>
			<td align="center">
			<a href="?c=presupuestos&a=BajaRegistro&noRegistro='.$detalle->noRegistro.'&idPresupuesto='.$detalle->idPresupuesto.'" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mEliminar"><i class="fa fa-trash"></i></a>
			</td>
			</tr>
			';
			$n++;
		endforeach;
		echo '
		<tbody>
		</table>';
	}
}
?>