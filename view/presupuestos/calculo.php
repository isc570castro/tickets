
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
    <h1 class="h2">Cálculo de pies de <?php echo $tipoMadera;?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="?c=presupuestos&a=Presupuesto&idPresupuesto=<?php echo $idPresupuesto; ?>" style="width: 100%; margin-left: 4px;" class="btn btn-dark btn-sm float-right" id="registrar"><i class="far fa-arrow-alt-circle-left"></i> &nbsp;Terminar</a>
    </div>
  </div>

  <table class="table table-sm" border="0">
    <form class="registro" action="c=presupuestos&a=RegistraCalculo" method="POST" enctype="multipart/form-data" name="frmaltaPresupuesto">
      <tr>
        <td>
          <input class="form-control" type="number"  onblur="calcularPies();" id="cantidad" placeholder="Cantidad" name="cantidad" required="required" autofocus>
        </td>
        <td align="right"><label class="col-form-label">Grueso:</label></td>
        <td >
          <input class="form-control" type="text"  onblur="calcularPies();" id="grueso" placeholder="Grueso" name="grueso" required="required">
        </td>
        <td><label class="col-form-label">Ancho:</label></td>
        <td>
          <input class="form-control" type="text" onblur="calcularPies();" placeholder="Ancho" id="ancho" name="ancho" required="required" ></div>
        </td>
        <td align="right">
          <label for="example-search-input" class="col-form-label">Largo:<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalPino();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
        </td>
        <td>
         <input class="form-control" type="text" onblur="calcularPies();" id="largo" placeholder="Largo" name="largo" required="required" >
       </td>
       <td align="right">
        <label for="example-search-input" class="col-form-label">C.T.P:<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalPino();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
      </td>
      <td>
       <input class=" form-control" type="text"  onfocus="calcularPies();" name="cantPies" id="cantpies" placeholder="Total de pies" readonly="" required="">
     </td>
     <td align="right"><button type="submit" class="btn btn-outline-success"><i class="fas fa-check-circle"></i></button></td>
   </tr>
 </form>
</table>
<div class="table-responsive" id="div-consultas">

</div>
</main>

<!-- Modal -->
        <div class="modal fade" id="mEliminar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger" id="modalLabel">Eliminar registro</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <h6>¿Esta seguro que desea eliminar el registro?</h6>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
  window.onload=function(){
    consultar();
  }

  function consultar(){
   $.post("?c=presupuestos&a=ConsultarDetalles", {idPresupuesto: <?php echo $idPresupuesto; ?>, tipoMadera : "<?php echo $tipoMadera; ?>"}, function(respuesta) {
    $("#div-consultas").html(respuesta);
  }); 
 }

 function verificaCheck(){ 
   if($('input[name=triplay]').is(':checked')){
    document.getElementById("grueso").readOnly = true;
  }
  else{
    document.getElementById("grueso").readOnly = false;
  }
}
function calcularPies(){  
  var cantpies;
  var cantidad1 = $("#cantidad").val();

  cantidad = parseInt(cantidad1);
  if (isNaN(cantidad)){
    cantidad=0;
  }
  var grueso1 = $("#grueso").val();
  grueso = parseFloat(grueso1);
  if (isNaN(grueso)){
    grueso=0;
  }
  var ancho1 = $("#ancho").val();
  ancho = parseFloat(ancho1);
  if (isNaN(ancho)){
    ancho=0;
  }
  var largo1 = $("#largo").val();
  largo = parseFloat(largo1);
  if (isNaN(largo)){
    largo=0;
  }
  if($('input[name=triplay]').is(':checked')){
   cantpies = ((cantidad * ancho * largo) / 12);
   $("#cantpies").val(cantpies);
 }else{
  cantpies = ((cantidad * grueso * ancho * largo) / 12);
  $("#cantpies").val((cantpies).toFixed(2));
}
}

</script>
</html> 
