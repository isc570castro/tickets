<?php 

require_once 'model/producto.php';

class ProductosController{
	public $model;
	private $mensaje;
	private $error;


	public function __CONSTRUCT(){
		$this->model = new Producto();
	} 

	public function Index(){
		$productos=true;
		$page='view/productos/index.php';
		require_once 'view/index.php';
	}

	public function Almacen()
	{
		$almacen=true;
		$page='view/productos/almacen.php';
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
		<td align="center"><strong>Existencia</strong></td>
		<td align="center"><strong>Precio interno</strong></td>
		<td align="center"><strong>Precio Ext Me</strong></td>
		<td align="center"><strong>Precio Ext Ma</strong></td>
		<td align="center"><strong>Precio Público</strong></td>
		<td align="center"><strong>Mayoreo</strong></td>
		<td align="center"><strong>Agregar</strong></td>
		<td align="center"><strong>Editar</strong></td>
		<td align="center"><strong>Eliminar</strong></td>
		</tr>
		</thead>
		<tbody>';
		$n=1;
		foreach($this->model->Consultar($valor) as $producto):
			echo '
			<tr>
			<th scope="row">'.$n.'</th>
			<td><label> '.$producto->producto.'</label> </td>
			<td align="center"><label> '.$producto->existencia.'</label> </td>
			<td align="center"><label class="txtInternos"> '.$producto->precioInterno.'</label> </td>
			<td align="center"><label class="txtExternos"> '.$producto->precioExternoMe.'</label> </td>
			<td align="center"><label class="txtExternos"> '.$producto->precioExternoMa.'</label> </td>
			<td align="center"><label class="txtPub"> '.$producto->precioPublico.' </label></td>	
			<td align="center"><label> '.$producto->mayoreo.' </label></td>	
			<td align="center"><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#mAgregar" onclick="agregarProductos(' .  $producto->idProducto; ?>,
				<?php echo "'" . $producto->producto . "'"; ?>,<?php echo "'" . $producto->existencia . "'"; ?><?php echo ')"><i class="fas fa-plus-circle"></i></button></td>
			<td align="center"><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#mProductos" 
			onclick="editarProducto('. $producto->idProducto; ?>,
			<?php echo "'" . $producto->producto . "'"; ?>,
			<?php echo "'" . $producto->descripcion . "'"; ?>,
			<?php echo "'" . $producto->precioInterno . "'"; ?>,
			<?php echo "'" . $producto->precioExternoMe . "'"; ?>,
			<?php echo "'" . $producto->precioExternoMa . "'"; ?>,
			<?php echo "'" . $producto->precioPublico . "'"; ?>,
			<?php echo "'" . $producto->fsrMenudeo . "'"; ?>,
			<?php echo "'" . $producto->fsrMayoreo . "'"; ?>,
			<?php echo "'" . $producto->fsrPublico . "'"; ?>,
			<?php echo "'" . $producto->mayoreo . "'"; ?><?php echo ')
			"><i class="fa fa-edit"></i></button></td>
			<td align="center"><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mEliminar" onclick="eliminarProducto(' . $producto->idProducto . ')"><i class="fa fa-trash"></i></button></td>
			</tr>
			</tr>
			';
			$n++;
		endforeach;
		echo '
		<tbody>
		</table>';
	}

	public function ConsultarAlmacen(){
		$valor = $_POST['valorBusqueda'];
		echo ' 
		<table class="table table-striped table-sm">
		<thead>
		<tr>
		<th scope="row">#</th>
		<th>Nombre del producto</th>
		<td align="center"><strong>Precio interno</strong></td>
		<td align="center"><strong>Existencia</strong></td>
		<td align="center"><strong>Añadir</strong></td>
		</tr>
		</thead>
		<tbody>';
		$n=1;
		foreach($this->model->Consultar($valor) as $producto):
			echo '
			<tr>
			<th scope="row">'.$n.'</th>
			<td><label> '.$producto->producto.'</label> </td>
			<td align="center"><label> '.$producto->precioInterno.'</label> </td>
			<td align="center"><label> '.$producto->existencia.'</label> </td>
			<td align="center"><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#mAgregar" onclick="agregarProductos(' .  $producto->idProducto; ?>,
				<?php echo "'" . $producto->producto . "'"; ?>,<?php echo "'" . $producto->existencia . "'"; ?><?php echo ')"><i class="fas fa-plus-circle"></i></button></td>
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
				$producto = new producto();
				$producto->idProducto = $_POST['idProducto'];
				$producto->producto = $_POST['producto'];
				$producto->descripcion = $_POST['descripcion'];
				$producto->precioInterno = $_POST['precioInterno'];
				$producto->precioExternoMe = $_POST['precioExternoMe'];
				$producto->precioExternoMa = $_POST['precioExternoMa'];
				$producto->precioPublico = $_POST['precioPublico'];
				$producto->fsrMenudeo = $_POST['fsrMenudeo'];
				$producto->fsrMayoreo = $_POST['fsrMayoreo'];
				$producto->fsrPublico = $_POST['fsrPublico'];
				$producto->mayoreo = $_POST['mayoreo'];
				if($producto->idProducto > 0)
				{
					$this->model->Actualizar($producto);
					echo 'Se han actualizado correctamente los datos';
				}else
				{
					$this->model->Registrar($producto);
					echo 'Se han registrado correctamente los datos';
				}
			} catch (Exception $e) {
			// die($e->getMessage());
				echo 'Ha ocurrido un error al intentar guardar los datos del producto';
			}
		}

		public function Baja()
		{
			try {
				$idProducto = $_POST['idProducto'];
				$this->model->Baja($idProducto);
				echo 'Se han eliminado correctamente los datos del producto';
			} catch (Exception $e) {
				echo 'Ha ocurrido un error al intentar dar de baja los datos del producto';
			}
		}

		public function AgregarProductos()
		{
			try {
				$idProducto = $_POST['idProducto'];
				$existenciaAnt = $_POST['existenciaActual'];
				$productos = $_POST["numprod"];
				$existencia = $existenciaAnt + $productos;
				$this->model->AgregarProductos($idProducto, $existencia);
				echo "Se han agregado correctamente los productos al almacen";
			} catch (Exception $e) {
				echo "Ha ocurrido un problema al intentar agregar los productos al almacen";	
			}

		}
	}
	?>