    <style>
    #div-carrito{
    	margin-top: -25px;
    }
</style>
<div class="container">
	<main role="main" class="col-md-12 col-lg-12 pt-3 px-2 contentCruds">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
			<h1 class="h2">Pedidos de clientes</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<button type="button"  onclick="nuevoPedido()" class="btn btn-outline-primary" data-toggle="modal" data-target="#mPedido"><span data-feather="plus"></span><i class="fas fa-plus-circle"></i> Nuevo pedido</button>
			</div>
		</div>
		<div class="table-responsive" id="div-consultas">
		</div>
	</main>
</div>
<!-- Modal -->
<div class="modal fade" id="mPedido" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Registro de pedido</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtFolio">Folio</label>
							<input class="form-control" type="text" id="txtFolio" name="folio" readonly style="text-align: center; font-weight: bolder;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtFecha">Fecha</label>
							<input class="form-control" type="date" id="txtFecha" name="fecha" autofocus>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<label for="selectClientes">Cliente</label>
					<select class="form-control" id="selectClientes" name="idCliente">
					</select>
				</div>
			</div>
			<div class="modal-footer" id="div-buttons-general" align="right">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btn-crear">Crear</button>
			</div>
			<div class="modal-body" id="div-carrito">
				<hr>
				<form id="form-carrito" action="?c=pedidos&a=AgregarAlCarrito" method="POST" enctype="multipart/form-data" name="frmaltaClientes">
					<input class="form-control" type="hidden" id="txtIdPedido" name="idPedido">
					<fieldset>
						<legend>Carrito de pedido</legend>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label for="selectProductos">Producto</label>
									<select class="form-control" id="selectProductos" name="idProducto">
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="txtCantidad">Cantidad</label>
									<input class="form-control" type="number" id="txtCantidad" name="cantidad">
								</div>
							</div>	
							<div class="col-md-5">
								<div class="form-group">
									<label for="txtPrecio">Precio unitario</label>
									<input class="form-control" type="text" id="txtPrecio" name="precio">
								</div>
							</div>	
							<div class="col-md-5">
								<div class="form-group">
									<label for="txtTotal">Total</label>
									<input class="form-control" type="text" id="txtTotal" name="totalCC">
								</div>
							</div>	
							<div class="col-md-2">
								<div class="form-group" align="center">
									<label for="btn-agregar"></label>
									<button type="submit" id="btn-agregar" style="width: 100%; margin-top: 8px" class="btn btn-outline-success"> Agregar</button>
								</div>
							</div>	
						</div>

						<table class="table table">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="5%">Cant.</th>
									<th scope="col">Producto</th>
									<th scope="col">Precio</th>
									<th scope="col">Total</th>
									<td scope="col" style="width: 2%; color:#495057; background-color: #e9ecef;" align="center"><strong>Opt.</strong></td>
								</tr>
							</thead>
							<tbody id="tbody-carrito">
							</tbody>
						</table>
						<div class="form-group" align="right">
							<h4 class="text-danger">Total: $<font id="fontTotal"></font></h4>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer" id="div-buttons-general2" align="right">
				<button type="button" id="btn-cancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" id="btn-terminar" class="btn btn-primary">Terminar</button>
			</div>
		</div>
	</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="mEliminar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form-eliminar" class="frmEliminar" action="?c=clientes&a=Baja" method="POST" enctype="multipart/form-data" name="frmaltaClientes" id="frmEliminar">
				<div class="modal-header">
					<h4 class="modal-title text-danger" id="modalLabel">Eliminar cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6>¿Esta seguro que desea eliminar el cliente?</h6>
					<input type="" id="txtIdClienteE" name="idCliente">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){	
			consultar();

			// $("#div-buttons-general").hide();

			$('.js-example-basic-single').select2();

			$('.modal').on('shown.bs.modal', function() {
				$(this).find('[autofocus]').focus();
			});

			$('#btn-crear').click(function(){
				var idPedido = $('#txtIdPedido').val();
				var folio = $('#txtFolio').val();
				var fecha = $('#txtFecha').val();
				var idCliente = $('#selectClientes').val();
				var total = $('#fontTotal').html();
				datos = {
					idPedido : idPedido,
					folio : folio,
					fecha : fecha,
					idCliente : idCliente,
					total : total };
					$.ajax({
						type: 'POST',
						data: datos,
						url: '?c=pedidos&a=GuardarPedidoCliente',
						success : function(id){
							$('#div-carrito').show();
							$('#div-buttons-general').hide();
							$('#div-buttons-general2').show();
							$('#txtIdPedido').val(id);
							restablecerCarrito();
						}
					});
				});

			$('#btn-terminar').click(function(){
				var idPedido = $('#txtIdPedido').val();
				var folio = $('#txtFolio').val();
				var fecha = $('#txtFecha').val();
				var idCliente = $('#selectClientes').val();
				var total = $('#fontTotal').html();
				datos = {
					idPedido : idPedido,
					folio : folio,
					fecha : fecha,
					idCliente : idCliente,
					total : total };
					$.ajax({
						type: 'POST',
						data: datos,
						url: '?c=pedidos&a=GuardarPedidoCliente',
						success : function(){
							$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>Se ha generado correctamente el pedido<center></div>');
       						$("#mPedido").modal('toggle');
       						$('#mensajejs').delay(3000).hide(600);
       						consultar();
						}
					});
				});

			$('#form-carrito').submit(function(){
				total = $('#txtTotal').val();
				$.ajax({
					type : 'POST',
					data : $(this).serialize(),
					url : $(this).attr('action'),
					success: function(res)
					{
						obtenerCarrito();
						restablecerCarrito();
						calcularTotal(total);
					}
				});
				return false;
			});

			$('#selectProductos').change(function(){
				$('#txtCantidad').prop('readonly',false);
				$('#txtPrecio').prop('readonly',false);
				$('#txtTotal').prop('readonly',false);
				$('#txtCantidad').focus();
			});

			$('#form-eliminar').submit(function(){
				$.ajax({
					type : 'POST',
					data : $(this).serialize(),
					url : $(this).attr('action'),
					success: function(res)
					{
						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
						$("#mEliminar").modal('toggle');
						$('#mensajejs').delay(3000).hide(600);
						consultar();
					}
				});
				return false;
			});

			$('#txtCantidad').keyup(function(){
				idProducto = $('#selectProductos').val();
				cantidad = $('#txtCantidad').val();
				$.get("?c=pedidos&a=ObtenerPrecioProducto", 
				{
					idProducto : idProducto, 
					cantidad : cantidad
				}, 
				function(res){
					$('#txtPrecio').val(res);
					total = res * cantidad;
					$('#txtTotal').val(total);
				})
			});

		});

		function restablecerCarrito()
		{
			$("#selectProductos").val('')
			$('#txtCantidad').val("");
			$('#txtPrecio').val("");
			$('#txtTotal').val("");
			$('#txtCantidad').prop('readonly',true);
			$('#txtPrecio').prop('readonly',true);
			$('#txtTotal').prop('readonly',true);
		}

		function obtenerCarrito()
		{
			var idPedido = $('#txtIdPedido').val();
			$.get('?c=pedidos&a=ObtenerCarritoCliente', 
				{idPedido : idPedido},
				function(carrito){
					var tbody = "";
					for(var i in carrito){
						tbody = tbody + `<tr>
						<td>${carrito[i].cantidad}</td>
						<td>${carrito[i].producto}</td>
						<td>$${carrito[i].precio}</td>
						<td>$${carrito[i].totalCC}</td>
						<td align="center">
						<div class="btn-group" role="group">
						<button style="margin-top: -10px;" id="btnGroupDrop1" type="button" class="btn btn-light btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-ellipsis-h"></i></button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="min-width:120px;">
						<a class="dropdown-item" href="#"><i class="fa fa-trash" style="color:#dc3545!important"></i> Borrar</a>
						<a class="dropdown-item" href="#"><i class="fa fa-edit" style="color:#0062cc!important"></i> Editar</a>
						</div>
						</div>
						</td>
						</tr>`;
					}	
					$('#tbody-carrito').html(tbody);
				});
		}

		function consultar(){
			var textoBusqueda = "";
			$.post("?c=pedidos&a=ConsultarPedidosClientes", 
				{valorBusqueda: textoBusqueda}, 
				function(respuesta) {
					$("#div-consultas").html(respuesta);
				}); 
		}

		function nuevoPedido(){
			$("#div-carrito").hide();
			$("#div-buttons-general2").hide();
			$("#div-buttons-general").show();

			$('#txtFecha').val('');
			$('#txtCantidad').val('');
			$('#txtPrecio').val('');
			$('#txtTotal').val('');
			$('#fontTotal').html('0.00');

			$.get('?c=pedidos&a=ObtenerProximoFolio', function(folio){
				$('#txtFolio').val(folio);
			});

			$.get('?c=pedidos&a=ListarClientes', function(res){
				var selectClientes = document.getElementById("selectClientes");
				selectClientes.options[0] = new Option("Seleccione el cliente de pedido","");
				var j=0;
				for (var i in res) 
					selectClientes.options[++j] = new Option(res[i].nombre,res[i].idCliente);
			});

			$.get('?c=pedidos&a=ListarProductos', function(res){
				var selectProductos = document.getElementById("selectProductos");
				selectProductos.options[0] = new Option("Seleccionar nuevo producto","");
				var j=0;
				for (var i in res) 
					selectProductos.options[++j] = new Option(res[i].producto,res[i].idProducto);
			});

		}	

		function editarCliente(
			idCliente, 
			nombre, 
			tienda, 
			domicilio, 
			telefono,         		
			correo, 
			rfc)
		{
			$('#txtIdCliente').val(idCliente);
			$('#txtNombre').val(nombre);
			$('#txtTienda').val(tienda);
			$('#txtCorreo').val(correo);
			$('#txtTelefono').val(telefono);
			$('#txtDomicilio').val(domicilio);
			$('#txtRfc').val(rfc);
		}	

		function eliminarCliente(idCliente)
		{
			$('#txtIdClienteE').val(idCliente);
		}

		function calcularTotal(total)
		{
			var totalA = $('#fontTotal').html();
			totalA = parseFloat(totalA);
			total = parseFloat(total);
			totalA = total + totalA;
			$('#fontTotal').html(totalA);
		}

	</script>
