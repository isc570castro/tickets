<style type="text/css">
.txtExternos{
	color:#0d47a1;
}
.txtInternos{
	color :#827717;	
}
.txtPub{
	color:#dd2c00;
}
</style>
<div class="container">
	<main role="main" class="col-md-12 col-lg-12 pt-3 px-2 contentCruds" >
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
			<h1 class="h2">Sección de productos</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<!-- <a  class="btn btn-outline-success" href="?c=productos&a=Almacen"><span data-feather="plus"></span><i class="fas fa-warehouse"></i> Almacen</a>&nbsp;&nbsp; -->
				<button type="button"  onclick="nuevoProducto()" class="btn btn-outline-primary" data-toggle="modal" data-target="#mProductos"><span data-feather="plus"></span><i class="fas fa-plus-circle"></i> Nuevo producto</button>
			</div>
		</div>
		<div class="table-responsive" id="div-consultas">

		</div>
	</main>
</div>
<!-- Modal -->
<div class="modal fade" id="mProductos" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form-Producto" class="frmRegistro" action="?c=Productos&a=Guardar" method="POST" enctype="multipart/form-data" name="frmaltaProductos" id="frmRegistro">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Registro de productos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<fieldset>
						<legend>Información general</legend>
						<!-- <label for="txtProducto">IdProducto:</label> -->
						<input class="form-control" type="hidden" id="txtIdProducto" name="idProducto">

						<div class="form-group">
							<label for="txtProducto">Nombre del producto:</label>
							<input autofocus class="form-control" type="text" id="txtProducto" name="producto">
						</div>
						<div class="form-group">
							<label for="txtDescripcion">Descripción:</label>
							<input class="form-control" type="text" id="txtDescripcion" name="descripcion" placeholder="Información adicional (opcional)">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtPrecioInt">Precio interno:</label>
									<input class="form-control" type="text" id="txtPrecioInt" name="precioInterno" onblur="calcularPrecios()">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtPrecioInt">Mayoreo:</label>
									<input class="form-control" type="text" id="txtMayoreo" name="mayoreo">
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>
							<div class="row">
								<div class="col-md-6">
									Precios externos
								</div>
								<div class="col-md-6" align="right">
									<a style="font-size: 13px;" data-toggle="collapse" href="#collapseConf" role="button" aria-expanded="false" aria-controls="collapseConf" onclick="confFSR()" id="labConf">Ver configuración</a>
								</div>
							</div>
						</legend>
						<div class="row">
							<div class="collapse" id="collapseConf">
								<div class="card card-body">
									<div class="form-group">
										<label><strong>Configuración de FSR:</strong></label>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="txtFsrMenudeo">Precio Ext Me:</label>
												<input class="form-control" type="text" id="txtFsrMenudeo" name="fsrMenudeo" onkeyup="calcularPrecios()">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="txtFsrMayoreo">Precio Ext Ma:</label>
												<input class="form-control" type="text" id="txtFsrMayoreo" name="fsrMayoreo" onkeyup="calcularPrecios()">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="txtFsrPublico">Precio Pub:</label>
												<input class="form-control" type="text" id="txtFsrPublico" name="fsrPublico" onkeyup="calcularPrecios()">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div align="right">
												<button style="font-size: 13px;" class="btn btn-default btn-sm" type="button" role="button" onclick="restablecerValores()">Restablecer valores</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txtPrecioExtMe" class="txtExternos">Precio menudeo:</label>
									<input class="form-control" type="tel" id="txtPrecioExtMe" name="precioExternoMe" onkeyup="calcularFsr()">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txtPrecioExtMa" class="txtExternos">Precio mayoreo:</label>
									<input class="form-control" type="text" id="txtPrecioExtMa" name="precioExternoMa" onkeyup="calcularFsr()">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txtPrecioPub" class="txtPub">Precio público:</label>
									<input class="form-control" type="text" id="txtPrecioPub" name="precioPublico" onkeyup="calcularFsr()">
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Margen de ganancia</legend>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtGanIntMe" class="txtInternos">Ganancia interna menudeo:</label>
									<input class="form-control" type="text" id="txtGanIntMe" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtGanIntMa" class="txtInternos">Ganancia interna mayoreo:</label>
									<input class="form-control" type="tel" id="txtGanIntMa" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtGanExtMe" class="txtExternos">Ganancia externa menudeo:</label>
									<input class="form-control" type="text" id="txtGanExtMe" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtGanExtMa" class="txtExternos">Ganancia externa mayoreo:</label>
									<input class="form-control" type="tel" id="txtGanExtMa" readonly>
								</div>
							</div>
						</div>
					</fieldset>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mEliminar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form-eliminar" class="frmEliminar" action="?c=Productos&a=Baja" method="POST" enctype="multipart/form-data" name="frmaltaProductos">
				<div class="modal-header">
					<h4 class="modal-title text-danger" id="modalLabel">Eliminar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6>¿Esta seguro que desea eliminar el Producto?</h6>
					<input type="text" id="txtIdProductoE" name="idProducto" hidden>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mAgregar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="frmAgregar" action="?c=Productos&a=AgregarProductos" method="POST" enctype="multipart/form-data" name="frmaltaProductos" id="frmAgregar">
				<input  type="text" id="txtIdProducto" name="idProducto" placeholder="idProducto" hidden>
				<input  type="text" id="txtExistenciaActual" name="existenciaActual" placeholder="existenciaActual"  hidden>


				<div class="modal-header">
					<h4 class="modal-title text-primary" id="modalLabel">Agregar productos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<h6 for="labProducto">Producto:</h6>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label id="labProducto" style="font-size:25px;"></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<h6 for="labExistenciaActual">Existencia actual:</h6>
							</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">
								<label id="labExistenciaActual" style="font-size:25px;"></label>&nbsp;&nbsp;&nbsp;
								<label style="font-size:25px;">piezas +</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<h6 for="txtNumProd">Ingrese el número de productos para sumar a la existencia actual.</h6>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<input style="text-align: center; font-size: 20px; width: 80%" class="form-control" type="text" id="txtNumProd" name="numprod" autofocus> <label style="font-size:20px;">pzas</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function(){	
			consultar();

			$('.modal').on('shown.bs.modal', function() {
				$(this).find('[autofocus]').focus();
			});

			$('#form-Producto').submit(function(){
				$.ajax({
					type : 'POST',
					data : $(this).serialize(),
					url : $(this).attr('action'),
					success: function(res)
					{
						$("#mensajejs").show();
						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
						$("#mProductos").modal('toggle');
						$('#mensajejs').delay(3000).hide(600);
						consultar();
					}
				});
				return false;
			});

			$('#form-eliminar').submit(function(){
				$.ajax({
					type : 'POST',
					data : $(this).serialize(),
					url : $(this).attr('action'),
					success: function(res)
					{
						$("#mensajejs").show();
						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
						$("#mEliminar").modal('toggle');
						$('#mensajejs').delay(3000).hide(600);
						consultar();
					}
				});
				return false;
			});

			$('#frmAgregar').submit(function(){
				$.ajax({
					type : 'POST',
					data : $(this).serialize(),
					url : $(this).attr('action'),
					success: function(res)
					{
						$("#mensajejs").show();
						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
						$("#mAgregar").modal('toggle');
						$('#mensajejs').delay(3000).hide(600);
						consultar();
					}
				});
				return false;
			});
		});

		function consultar(){
			var textoBusqueda = "";
			$.post("?c=Productos&a=Consultar", {valorBusqueda: textoBusqueda}, function(respuesta) {
				$("#div-consultas").html(respuesta);
			}); 
		}

		var fsrMenudeoG;
		var fsrMayoreoG;
		var fsrPublicoG;

		function restablecerValores()
		{
			$('#txtFsrMenudeo').val(fsrMenudeoG);
			$('#txtFsrMayoreo').val(fsrMayoreoG);
			$('#txtFsrPublico').val(fsrPublicoG);
			calcularPrecios();
			calcularGanancias();
		}

		function nuevoProducto()
		{
			fsrMenudeoG = 2.5;
			fsrMayoreoG = 2;
			fsrPublicoG = 3.5;
			$('#txtIdProducto').val('0');
			$('#txtProducto').val('');
			$('#txtDescripcion').val('');
			$('#txtPrecioInt').val('');
			$('#txtPrecioExtMe').val('');
			$('#txtPrecioExtMa').val('');
			$('#txtPrecioPub').val('');
			$('#txtGanIntMe').val('');
			$('#txtGanIntMa').val('');
			$('#txtGanExtMe').val('');
			$('#txtGanExtMa').val('');
			$('#mayoreo').val('');

			$('#txtFsrMenudeo').val(fsrMenudeoG);
			$('#txtFsrMayoreo').val(fsrMayoreoG);
			$('#txtFsrPublico').val(fsrPublicoG);
		}	

		function editarProducto(
			idProducto,
			producto,
			descripcion,
			precioInterno,
			precioExternoMe,
			precioExternoMa,
			precioPublico,
			fsrMenudeo,
			fsrMayoreo,
			fsrPublico,
			mayoreo
			)
		{
			fsrMenudeoG = fsrMenudeo;
			fsrMayoreoG = fsrMayoreo;
			fsrPublicoG = fsrPublico;

			$('#txtIdProducto').val(idProducto);
			$('#txtProducto').val(producto);
			$('#txtDescripcion').val(descripcion);
			$('#txtPrecioInt').val(precioInterno);
			$('#txtPrecioExtMe').val(precioExternoMe);
			$('#txtPrecioExtMa').val(precioExternoMa);
			$('#txtPrecioPub').val(precioPublico);
			$('#txtFsrMenudeo').val(fsrMenudeoG);
			$('#txtFsrMayoreo').val(fsrMayoreoG);
			$('#txtFsrPublico').val(fsrPublicoG);
			$('#txtMayoreo').val(mayoreo);

			calcularGanancias();
		}	

		function eliminarProducto(idProducto)
		{
			$('#txtIdProductoE').val(idProducto);
		}

		function calcularPrecios()
		{
			var precioInterno = $('#txtPrecioInt').val();
			var fsrMenudeo = $('#txtFsrMenudeo').val();
			var fsrMayoreo = $('#txtFsrMayoreo').val();
			var fsrPublico = $('#txtFsrPublico').val();

			if (isNaN(precioInterno)){
				precioInterno=0;
			}

			if (isNaN(fsrMenudeo)){
				fsrMenudeo=0;
			}

			if (isNaN(fsrMayoreo)){
				fsrMayoreo=0;
			}

			if (isNaN(fsrPublico)){
				fsrPublico=0;
			}

			var precioExternoMe = precioInterno * fsrMenudeo;
			var precioExternoMa = precioInterno * fsrMayoreo;
			var precioPublico = precioInterno * fsrPublico;

			$('#txtPrecioExtMe').val((precioExternoMe).toFixed(2));
			$('#txtPrecioExtMa').val((precioExternoMa).toFixed(2));
			$('#txtPrecioPub').val((precioPublico).toFixed(2));

			calcularGanancias();

		}

		var precioInterno = 0;
		var precioExternoMe = 0;
		var precioExternoMa = 0;
		var precioPublico = 0;

		function obtenerPrecios()
		{
			precioInterno = $('#txtPrecioInt').val();
			precioExternoMe = $('#txtPrecioExtMe').val();
			precioExternoMa = $('#txtPrecioExtMa').val();
			precioPublico = $('#txtPrecioPub').val();

			if (isNaN(precioInterno)){
				precioInterno=0;
			}

			if (isNaN(precioExternoMe)){
				precioExternoMe=0;
			}

			if (isNaN(precioExternoMa)){
				precioExternoMa=0;
			}

			if (isNaN(precioPublico)){
				precioPublico=0;
			}
		}

		function calcularFsr()
		{
			obtenerPrecios();

			var fsrMenudeo = precioExternoMe / precioInterno;
			var fsrMayoreo = precioExternoMa / precioInterno;
			var fsrPublico = precioPublico / precioInterno;

			$('#txtFsrMenudeo').val((fsrMenudeo).toFixed(2));
			$('#txtFsrMayoreo').val((fsrMayoreo).toFixed(2));
			$('#txtFsrPublico').val((fsrPublico).toFixed(2));

			calcularGanancias();
		}

		function calcularGanancias()
		{
			obtenerPrecios();

			var ganIntMe = precioExternoMe - precioInterno;
			var ganIntMa = precioExternoMa - precioInterno;

			var ganExtMe = precioPublico - precioExternoMe;
			var ganExtMa = precioPublico - precioExternoMa;

			$('#txtGanIntMe').val((ganIntMe).toFixed(2));
			$('#txtGanIntMa').val((ganIntMa).toFixed(2));

			$('#txtGanExtMe').val((ganExtMe).toFixed(2));
			$('#txtGanExtMa').val((ganExtMa).toFixed(2));
		}

		var varConf = 0;

		function confFSR()
		{
			if (varConf == 0)
			{
				varConf = 1;
				$('#labConf').html('Ocultar configuración');
			}else{
				varConf = 0;
				$('#labConf').html('Ver configuración');
			}
		}

		var existenciaActual=0;

		function agregarProductos(idProducto, nombre, existencia)
		{
			$("#txtIdProducto").val(idProducto);
			$("#txtExistenciaActual").val(existencia);
			$("#txtNumProd").val("");
			$("#labExistenciaActual").html(existencia);
			existenciaActual = existencia;
			$("#labProducto").html(nombre);

		}

	</script>
