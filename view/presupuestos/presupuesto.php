
<style type="text/css">
form{
  border: 1px solid #c4c4c4;
  padding-right: 20px;
  padding-left: 20px;
  height: auto;

}
#registrar{
  width: 100%;
}

</style>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
    <h1 class="h2">Detalles de presupuesto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <label style="font-size: 15px;" class="text-primary">Cliente:</label><label style="font-size: 15px;" class="text-dark">&nbsp;Alejandro Castro Saucedo</label>
    </div>
  </div>
  <div class="table-responsive" id="div-consultas">
    <div class="row col-md-12">
      <form id="frmRegistro" class="registro" action="../../../../controller/presupuestos/actualizarPresupuesto.php?idPresupuesto=<?php echo $idPresupuesto;?>" method="POST" enctype="multipart/form-data" name="frmRegistro" >
        <br>
        <div class="row">
          <div class="col-md-10">
            <font size="5"> Cuenta de gastos</font>
          </div>

          <div class="col-md-2">

            <button type="submit" style="width: 68%; margin-left: 4px;" class="btn btn-primary btn-sm float-right" id="registrar"><i class="fa fa-save"></i> &nbsp;Guardar</button>
            <a href="?c=presupuestos" style="width: 28%; " class="btn btn-dark btn-sm float-right" id="registrar"><i class="far fa-arrow-alt-circle-left"></i></a>
          </div>
        </div>
        
        <legend><font size="4" class="text-primary">Madera</font></legend>
        <table class="table table-sm" border="0">
          <thead>
            <tr>
              <td width="13%"><label class="col-form-label text-danger">Madera de pino:</label></td>
              <td align="right"><label class="col-form-label">Total de pies:</label></td>
              <td width="13%">
                <input  class="form-control text-right" type="text" id="totalPiesPino" value="<?php echo $presupuesto->totalPies; ?>" placeholder="0" name="totalPiesPino">
              </td>
              <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
              <td width="13%">
                <input class="form-control text-right" onblur="calcularTotalPino();" type="text" id="precioPiePino" value="<?php echo $presupuesto->precioPie; ?>" placeholder="0.00" name="precioPiePino">
              </td>
              <td width="10%" align="right">
                <label for="example-search-input" class="col-form-label">Total:<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalPino();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
              </td>
              <td  width="13%">
                <input class="form-control text-right" type="text" id="precioPino" value="<?php echo $presupuesto->montoTotalPino; ?>" readonly placeholder="0.00" name="precioPino">
              </td>
              <td align="right" width="10%"><a href="?c=presupuestos&a=Calculo&idPresupuesto=<?php echo $idPresupuesto; ?>&tipoMadera=pino" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a></td>
            </tr>

            <tr>
              <td width="13%"><label class="col-form-label text-danger">Madera de cahoba:</label></td>
              <td align="right"><label class="col-form-label">Total de pies:</label></td>
              <td width="13%">
                <input class="form-control text-right" type="text" id="totalPiesCahoba" value="<?php echo $presupuesto->totalPiesCahoba; ?>" placeholder="0"  name="totalPiesCahoba">
              </td>
              <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
              <td width="13%">
                <input class="form-control text-right" onblur="calcularTotalCahoba();" type="text" id="precioPieCahoba"  value="<?php echo $presupuesto->precioPieCahoba; ?>" placeholder="0.00" name="precioPieCahoba">
              </td>
              <td width="10%" align="right">
                <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalCahoba();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo""></span> </label>
              </td>
              <td  width="13%">
                <input class="form-control text-right" type="text" id="precioCahoba" value="<?php echo $presupuesto->montoTotalCahoba; ?>" readonly placeholder="0.00" name="precioCahoba">
              </td>
              <td align="right" width="10%">
               <a href="?c=presupuestos&a=Calculo&idPresupuesto=<?php echo $idPresupuesto; ?>&tipoMadera=cahoba"  class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i>
               </a>
             </td>
           </tr>

           <tr>
            <td width="13%"><label class="col-form-label text-danger">Madera de banack:</label></td>
            <td align="right"><label class="col-form-label">Total de pies:</label></td>
            <td width="13%">
              <input class="form-control text-right" type="text" id="totalPiesBanak" value="<?php echo $presupuesto->totalPiesBanak;?>" placeholder="0" name="totalPiesBanak">
            </td>
            <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
            <td width="13%">
              <input class="form-control text-right" onblur="calcularTotalBanak();" type="text" id="precioPieBanak" value="<?php echo $presupuesto->precioPieBanak; ?>" placeholder="0.00" name="precioPieBanak">
            </td>
            <td width="10%" align="right">
              <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalBanak();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
              <div class=" col-xs-10 col-md-2">
              </td>
              <td  width="13%">
                <input class="form-control text-right" type="text" id="precioBanak" value="<?php echo $presupuesto->montoTotalBanak; ?>" readonly placeholder="0.00" name="precioBanak">
              </td>
              <td align="right" width="10%">
                <a href="?c=presupuestos&a=Calculo&idPresupuesto=<?php echo $idPresupuesto; ?>&tipoMadera=banack" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <tr>
              <td align="right" colspan="6">
               <label class="col-form-label">Total de madera:</label>
             </td>
             <td>
               <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
               <input class="form-control text-right" type="text" id="totalMadera" value="<?php echo $presupuesto->montoTotalMadera; ?>" placeholder="0.00" name="totalMadera" readonly>
             </td>
           </tr>
         </thead>
       </table>

       <legend><font size="4" class="text-primary">Triplay</font></legend>
       <table class="table table-sm" border="0">
         <tr>
          <td width="13%"><label class="col-form-label text-danger">Triplay de 3 mm:</label></td>
          <td align="right"><label class="col-form-label">Total de pies:</label></td>
          <td width="13%">
            <input class="form-control text-right" type="text" id="totalPiesTtres" value="<?php echo $presupuesto->totalPiesTtres; ?>" placeholder="0" name="totalPiesTtres">
          </td>
          <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
          <td width="13%">
            <input class="form-control text-right" onblur="calcularTotalTtres();" type="text" id="precioPieTtres" value="<?php echo $presupuesto->precioPieTtres; ?>" placeholder="0.00" name="precioPieTtres">
          </td>
          <td width="10%" align="right">
            <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalTtres();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
            <div class=" col-xs-10 col-md-2">
            </td>
            <td  width="13%">
              <input class="form-control text-right" type="text" id="montoTotalTtres" value="<?php echo $presupuesto->montoTotalTtres; ?>" readonly placeholder="0.00" name="montoTotalTtres">
            </td>
            <td align="right" width="10%">
              <a href="triplay/calcularPiesTtres.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
            </td>
          </tr>

          <tr>
            <td width="13%"><label class="col-form-label text-danger">Triplay de 6 mm:</label></td>
            <td align="right"><label class="col-form-label">Total de pies:</label></td>
            <td width="13%">
              <input class="form-control text-right" type="text" id="totalPiesTseis" value="<?php echo $presupuesto->totalPiesTseis; ?>" placeholder="0" name="totalPiesTseis">
            </td>
            <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
            <td width="13%">
             <input class="form-control text-right" onblur="calcularTotalTseis();" type="text" id="precioPieTseis" value="<?php echo $presupuesto->precioPieTseis; ?>" placeholder="0.00" name="precioPieTseis">
           </td>
           <td width="10%" align="right">
            <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalTseis();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
            <div class=" col-xs-10 col-md-2">
            </td>
            <td  width="13%">
              <input class="form-control text-right" type="text" id="montoTotalTseis" value="<?php echo $presupuesto->montoTotalTseis; ?>" readonly placeholder="0.00" name="montoTotalTseis">
            </td>
            <td align="right" width="10%">
              <a href="triplay/calcularPiesTseis.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
            </td>
          </tr>

          <tr>
            <td width="13%"><label class="col-form-label text-danger">Triplay de 1/2":</label></td>
            <td align="right"><label class="col-form-label">Total de pies:</label></td>
            <td width="13%">
              <input class="form-control text-right" type="text" id="totalPiesTunaymedia" value="<?php echo $presupuesto->totalPiesTunaymedia; ?>" placeholder="0" name="totalPiesTunaymedia">
            </td>
            <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
            <td width="13%">
              <input class="form-control text-right" onblur="calcularTotalTunaymedia();" type="text" id="precioPieTunaymedia" value="<?php echo $presupuesto->precioPieTunaymedia; ?>" placeholder="0.00" name="precioPieTunaymedia">
            </td>
            <td width="10%" align="right">
              <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalTunaymedia();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
              <div class=" col-xs-10 col-md-2">
              </td>
              <td  width="13%">
               <input class="form-control text-right" type="text" id="montoTotalTunaymedia" value="<?php echo $presupuesto->montoTotalTunaymedia; ?>" readonly placeholder="0.00" name="montoTotalTunaymedia">
             </td>
             <td align="right" width="10%">
              <a href="triplay/calcularPiesTmedia.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
            </td>
          </tr>

          <tr>
            <td width="13%"><label class="col-form-label text-danger">Triplay de 5/8":</label></td>
            <td align="right"><label class="col-form-label">Total de pies:</label></td>
            <td width="13%">
              <input class="form-control text-right" type="text" id="totalPiesTcincoOctavos" value="<?php echo $presupuesto->totalPiesTcincoOctavos; ?>" placeholder="0" name="totalPiesTcincoOctavos">
            </td>
            <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
            <td width="13%">
              <input class="form-control text-right" onblur="calcularTotalTcincoOctavos();" type="text" id="precioPieTcincoOctavos" value="<?php echo $presupuesto->precioPieTcincoOctavos; ?>" placeholder="0.00" name="precioPieTcincoOctavos">
            </td>
            <td width="10%" align="right">
              <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalTcincoOctavos();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
              <div class=" col-xs-10 col-md-2">
              </td>
              <td  width="13%">
                <input class="form-control text-right" type="text" id="montoTotalTcincoOctavos" value="<?php echo $presupuesto->montoTotalTcincoOctavos; ?>" readonly placeholder="0.00" name="montoTotalTcincoOctavos">
              </td>
              <td align="right" width="10%">
                <a href="triplay/calcularPiesTcincoOctavos.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
              </td>
            </tr>

            <tr>
              <td width="13%"><label class="col-form-label text-danger">Triplay de 3/4":</label></td>
              <td align="right"><label class="col-form-label">Total de pies:</label></td>
              <td width="13%">
                <input class="form-control text-right" type="text" id="totalPiesTtresCuartos" value="<?php echo $presupuesto->totalPiesTtresCuartos; ?>" placeholder="0" name="totalPiesTtresCuartos">
              </td>
              <td align="right"><label class="col-form-label">Costo de 1 pie:</label></td>
              <td width="13%">
                <input class="form-control text-right" onblur="calcularTotalTtresCuartos();" type="text" id="precioPieTtresCuartos" value="<?php echo $presupuesto->precioPieTtresCuartos; ?>" placeholder="0.00" name="precioPieTtresCuartos">
              </td>
              <td width="10%" align="right">
                <label for="example-search-input" class="col-form-label">Total:&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularTotalTtresCuartos();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo"></span></label>
                <div class=" col-xs-10 col-md-2">
                </td>
                <td  width="13%">
                  <input class="form-control text-right" type="text" id="montoTotalTtresCuartos" value="<?php echo $presupuesto->montoTotalTtresCuartos; ?>" readonly placeholder="0.00" name="montoTotalTtresCuartos">
                </td>
                <td align="right" width="10%">
                  <a href="triplay/calcularPiesTtresCuartos.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                </td>
              </tr>

              <tr>
                <td align="right" colspan="6">
                 <label class="col-form-label">Total en triplay:</label>
               </td>
               <td>
                 <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                 <input class="form-control text-right" type="text" id="totalTriplay" value="<?php echo $presupuesto->totalTriplay; ?>" placeholder="0.00" name="totalTriplay" readonly>
               </td>
             </tr>
           </table>

           <legend><font size="4" class="text-primary"> Otros</font></legend>

           <table class="table table-sm" border="0">
            <tr>
              <td align="right" colspan="5">
               <label class="col-form-label">Herrajes:</label>
             </td>
             <td  width="13%">
              <input class="form-control text-right" type="text" id="montoTotalProductos" value="<?php echo $presupuesto->montoTotalProductos; ?>" placeholder="0.00" name="montoTotalProductos">
            </td>
            <td align="right" width="10%">
              <a href="costoenProductos.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
            </td>
          </tr>

          <tr>
            <td align="right" colspan="5">
             <label class="col-form-label">Pintura:</label>
           </td>
           <td  width="13%">
            <input class="form-control text-right" type="text" id="totalPintura" value="<?php echo $presupuesto->pintura; ?>" placeholder="0.00" name="totalPintura">
          </td>
          <td align="right" width="10%">
            <a href="costoenProductos.php?idPresupuesto=<?php echo $idPresupuesto; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
          </td>
        </tr>

        <tr>
          <td align="right" colspan="5">
           <label class="col-form-label">Mano de obra:</label>
         </td>
         <td  width="13%">
          <input class="form-control text-right" type="text" id="manoObra" value="<?php echo $presupuesto->manoObra; ?>" placeholder="0.00" name="manoObra" onblur="sumatoria();">
        </td>
        <td align="right" width="10%">
          <span class="glyphicon glyphicon-hand-left" onclick="manoObra();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el costo de mano de obra"></span>
        </td>
      </tr>
    </table>

    <div style="margin-top: -50px;">
     <legend><font size="10" class="text-danger"> Monto total = </font> <font size="10" class="text-dark"> $ <?php echo $presupuesto->montoTotal; ?></font></legend>
   </div>

   <br>
 </form>
</div>
</div>
</main>

<script>
  $(document).ready(function () {
    $('#frmRegistro').bootstrapValidator({
      fields: {
        descripcion: {
          validators: {
            stringLength: { min: 1},
            stringLength: { max: 45 },
            notEmpty: { message:'Introduce una descripción general del presupuesto'}
          }
        },
        detalles: {
          validators: {
            stringLength: { min: 1},
            stringLength: { max: 200 },
          }
        },
        nombreCliente: { validators: { notEmpty: { message: 'Seleccione un cliente' } } },
      }
    }).on('success.form.bv', function (e) {
      $('#success_message').slideDown({ opacity: 'show' }, 'slow');
      $('#contact_form').data('bootstrapValidator').resetForm();
      e.preventDefault();
      var $form = $(e.target);
      var bv = $form.data('bootstrapValidator');
      $.post($form.attr('action'), $form.serialize(), function (result) {
        console.log(result);
      }, 'json');
    });
  });
</script>
<script>
 function calcularTotalPino(){
  var pies = $("#totalPiesPino").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPiePino").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#precioPino").val((montoTotal).toFixed(2));
  totalMadera();
}
function calcularTotalCahoba(){
  var pies = $("#totalPiesCahoba").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieCahoba").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#precioCahoba").val((montoTotal).toFixed(2));
  totalMadera();
}
function calcularTotalBanak(){
  var pies = $("#totalPiesBanak").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieBanak").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#precioBanak").val((montoTotal).toFixed(2));
  totalMadera();
}
function totalMadera(){
  var  precioPino=$("#precioPino").val();
  precioPino=parseFloat(precioPino);
  if (isNaN(precioPino)){
    precioPino=0;
  }
  var  precioCahoba=$("#precioCahoba").val();
  precioCahoba=parseFloat(precioCahoba);
  if (isNaN(precioCahoba)){
    precioCahoba=0;
  }
  var precioBanak=$("#precioBanak").val();
  precioBanak=parseFloat(precioBanak);
  if (isNaN(precioBanak)){
    precioBanak=0;
  }
  var totalMadera=precioBanak+precioPino+precioCahoba;
  $("#totalMadera").val((totalMadera).toFixed(2));
  sumatoria();
}
function calcularTotalTtres(){
  var pies = $("#totalPiesTtres").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieTtres").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#montoTotalTtres").val((montoTotal).toFixed(2));
  totalTriplay();
}
function calcularTotalTseis(){
  var pies = $("#totalPiesTseis").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieTseis").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#montoTotalTseis").val((montoTotal).toFixed(2));
  totalTriplay();
}
function calcularTotalTunaymedia(){
  var pies = $("#totalPiesTunaymedia").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieTunaymedia").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#montoTotalTunaymedia").val((montoTotal).toFixed(2));
  totalTriplay();
}
function calcularTotalTtresCuartos(){
  var pies = $("#totalPiesTtresCuartos").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieTtresCuartos").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#montoTotalTtresCuartos").val((montoTotal).toFixed(2));
  totalTriplay();
}
function calcularTotalTcincoOctavos(){
  var pies = $("#totalPiesTcincoOctavos").val();
  if (isNaN(pies)){
    pies=0;
  }
  var precio=$("#precioPieTcincoOctavos").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = pies*precio;
  $("#montoTotalTcincoOctavos").val((montoTotal).toFixed(2));
  totalTriplay();
}
function totalTriplay(){
  var  montoTotalTtres=$("#montoTotalTtres").val();
  montoTotalTtres=parseFloat(montoTotalTtres);
  if (isNaN(montoTotalTtres)){
    montoTotalTtres=0;
  }
  var  montoTotalTseis=$("#montoTotalTseis").val();
  montoTotalTseis=parseFloat(montoTotalTseis);
  if (isNaN(montoTotalTseis)){
    montoTotalTseis=0;
  }
  var  montoTotalTunaymedia=$("#montoTotalTunaymedia").val();
  montoTotalTunaymedia=parseFloat(montoTotalTunaymedia);
  if (isNaN(montoTotalTunaymedia)){
    montoTotalTunaymedia=0;
  }
  var  montoTotalTcincoOctavos=$("#montoTotalTcincoOctavos").val();
  montoTotalTcincoOctavos=parseFloat(montoTotalTcincoOctavos);
  if (isNaN(montoTotalTcincoOctavos)){
    montoTotalTcincoOctavos=0;
  }
  var  montoTotalTtresCuartos=$("#montoTotalTtresCuartos").val();
  montoTotalTtresCuartos=parseFloat(montoTotalTtresCuartos);
  if (isNaN(montoTotalTtresCuartos)){
    montoTotalTtresCuartos=0;
  }
  var totalTriplay=montoTotalTtres+montoTotalTseis+montoTotalTunaymedia+montoTotalTcincoOctavos+montoTotalTtresCuartos;
  $("#totalTriplay").val((totalTriplay).toFixed(2));
  sumatoria();
}
function manoObra(){
 var totalMadera=$("#totalMadera").val();
 totalMadera=parseFloat(totalMadera);
 if (isNaN(totalMadera)){
  totalMadera=0;
}
var totalTriplay=$("#totalTriplay").val();
totalTriplay=parseFloat(totalTriplay);
if (isNaN(totalTriplay)){
  totalTriplay=0;
}
var montoTotalProductos=$("#montoTotalProductos").val();
montoTotalProductos=parseFloat(montoTotalProductos);
if (isNaN(montoTotalProductos)){
  montoTotalProductos=0;
}
var manoObra=totalMadera+montoTotalProductos+totalTriplay;
$("#manoObra").val((manoObra).toFixed(2));

sumatoria();
}
function sumatoria(){
 var totalMadera=$("#totalMadera").val();
 totalMadera=parseFloat(totalMadera);
 if (isNaN(totalMadera)){
  totalMadera=0;
}
var totalTriplay=$("#totalTriplay").val();
totalTriplay=parseFloat(totalTriplay);
if (isNaN(totalTriplay)){
  totalTriplay=0;
}
var montoTotalProductos=$("#montoTotalProductos").val();
montoTotalProductos=parseFloat(montoTotalProductos);
if (isNaN(montoTotalProductos)){
  montoTotalProductos=0;
}
var manoObra=$("#manoObra").val();
manoObra=parseFloat(manoObra);
if (isNaN(manoObra)){
  manoObra=0;
}
var pintura=$("#totalPintura").val();
manoObra=parseFloat(manoObra);
if (isNaN(manoObra)){
  manoObra=0;
}
var montoTotal=totalMadera+montoTotalProductos+totalTriplay+manoObra;
$("#montoTotal").val((montoTotal).toFixed(2));
}

</script>
