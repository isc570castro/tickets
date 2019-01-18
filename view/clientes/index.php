       <div class="container">
       	<main role="main" class="col-md-12 col-lg-12 pt-3 px-2 contentCruds">
       		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
       			<h1 class="h2">Sección de clientes</h1>
       			<div class="btn-toolbar mb-2 mb-md-0">
       				<button type="button"  onclick="nuevoCliente()" class="btn btn-outline-primary" data-toggle="modal" data-target="#mClientes"><span data-feather="plus"></span><i class="fas fa-plus-circle"></i> Nuevo cliente</button>
       			</div>
       		</div>
       		<div class="table-responsive" id="div-consultas">

       		</div>
       	</main>
       </div>
       <!-- Modal -->
       <div class="modal fade" id="mClientes" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
       	<div class="modal-dialog" role="document">
       		<div class="modal-content">
       			<form id="form-cliente" class="frmRegistro" action="?c=clientes&a=Guardar" method="POST" enctype="multipart/form-data" name="frmaltaClientes" id="frmRegistro">
       				<div class="modal-header">
       					<h5 class="modal-title" id="modalLabel">Registro de cliente</h5>
       					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       						<span aria-hidden="true">&times;</span>
       					</button>
       				</div>
       				<div class="modal-body">
       					<div class="form-group">
       						<!-- <label for="txtNombre">IdCliente</label> -->
       						<input class="form-control" type="hidden" id="txtIdCliente" name="idCliente">
       					</div>
       					<div class="form-group">
       						<label for="txtNombre">Nombre del cliente</label>
       						<input autofocus class="form-control" type="text" id="txtNombre" name="nombreCliente">
       					</div>
       					<div class="form-group">
       						<label for="txtNombre">Tienda</label>
       						<input class="form-control" type="text" id="txtTienda" name="tienda">
       					</div>
       					<div class="form-group">
       						<label for="txtDomicilio">Domicilio</label>
       						<input class="form-control" type="text" id="txtDomicilio" name="domicilio">
       					</div>
       					<div class="form-group">
       						<label for="txtTelefono">Telefono</label>
       						<input class="form-control" type="tel" id="txtTelefono" name="telefono" onKeyPress="return solonumeros(event)" name="telefono">
       					</div>
       					<div class="form-group">
       						<label for="txtCorreo">Correo</label>
       						<input class="form-control" type="email" id="txtCorreo" name="email">
       					</div>
       					<div class="form-group">
       						<label for="txtCorreo">RFC</label>
       						<input class="form-control" type="text" id="txtRfc" name="rfc">
       					</div>

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

       			$('.modal').on('shown.bs.modal', function() {
       				$(this).find('[autofocus]').focus();
       			});

       			$('#form-cliente').submit(function(){
       				$.ajax({
       					type : 'POST',
       					data : $(this).serialize(),
       					url : $(this).attr('action'),
       					success: function(res)
       					{
       						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
       						$("#mClientes").modal('toggle');
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
       						$("#mensajejs").html('<div class="alert alert-success alert-bottom" role="alert"><center>'+res+'<center></div>');
       						$("#mEliminar").modal('toggle');
       						$('#mensajejs').delay(3000).hide(600);
       						consultar();
       					}
       				});
       				return false;
       			});
       		});

       		function consultar(){
       			var textoBusqueda = "";
       			$.post("?c=clientes&a=Consultar", {valorBusqueda: textoBusqueda}, function(respuesta) {
       				$("#div-consultas").html(respuesta);
       			}); 
       		}

       		function solonumeros(e){
       			key=e.keyCode || e.which;
       			teclado=String.fromCharCode(key);
       			numeros="0123456789";
       			especiales="8-37-37-45"; 
       			teclado_especial=false;
       			for(var i in especiales){
       				if(key==especiales[i]){
       					teclado_especial=true;
       				}
       			}
       			if (numeros.indexOf(teclado)==-1 && !teclado_especial){
       				return false;
       				alert('Solo números');
       			}
       		}

       		function nuevoCliente(){
       			$('#txtIdCliente').val('0');
       			$('#txtNombre').val('');
       			$('#txtTienda').val('');
       			$('#txtCorreo').val('');
       			$('#txtTelefono').val('');
       			$('#txtDomicilio').val('');
       			$('#txtRfc').val('');
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

       	</script>
