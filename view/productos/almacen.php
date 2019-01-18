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
#crudAlmacen{
	margin-left: 5%;
	margin-right: 5%;
	width: 90%;
}
</style>

<main role="main" class="col-md-12 col-lg-12 pt-3 px-2" id="crudAlmacen">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
		<h1 class="h2">Almacén de productos</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a  class="btn btn-outline-success" href="?c=productos"><span data-feather="plus"></span><i class="fas fa-shopping-cart"></i> Productos</a>
		</div>
	</div>
	<div class="table-responsive" id="div-consultas">

	</div>
</main>

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
			$.post("?c=Productos&a=ConsultarAlmacen", {valorBusqueda: textoBusqueda}, function(respuesta) {
				$("#div-consultas").html(respuesta);
			}); 
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
