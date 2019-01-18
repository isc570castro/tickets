        <main role="main" class="col-md-12 col-lg-12 pt-3 px-2">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Sección de presupuestos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#mClientes"><span data-feather="plus"></span> Nuevo presupuesto</button>
            </div>
          </div>
          <div class="table-responsive" id="div-consultas">

          </div>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="mClientes" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="frmRegistro" action="?c=clientes&a=Guardar" method="POST" enctype="multipart/form-data" name="frmaltaClientes" id="frmRegistro">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Registro de cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="txtNombre">Nombre del cliente</label>
                    <input autofocus class="form-control" type="text" id="txtNombre" name="nombreCliente">
                  </div>
                  <div class="form-group">
                    <label for="txtDomicilio">Domicilio</label>
                    <input class="form-control" type="text" id="txtDomicilio" name="domicilio">
                  </div>
                  <div class="form-group">
                    <label for="txtTelefono">Telefono</label>
                    <input class="form-control" type="tel" id="txtTelefono" name="telefono" onKeyPress="return solonumeros(event)">
                  </div>
                  <div class="form-group">
                    <label for="txtCorreo">Correo</label>
                    <input class="form-control" type="text" id="txtCorreo" name="correo">
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mEliminar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger" id="modalLabel">Eliminar presupuesto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <h6>¿Esta seguro que desea eliminar el presupuesto?</h6>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      window.onload=function(){
        consultar();
      }

      function consultar(){
       var textoBusqueda = "";
       $.post("?c=presupuestos&a=Consultar", {valorBusqueda: textoBusqueda}, function(respuesta) {
        $("#div-consultas").html(respuesta);
      }); 
     }

     
   </script>

