<?php
session_start();
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)){
  echo  "<script type='text/javascript'>
  alert('Debes loguearte para poder ingresar al catálogo');
</script>";
header ('Location:../../../../index.html');
}
include "../../../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$idPresupuesto=$_REQUEST['idPresupuesto'];
$sql = mysql_query("SELECT * FROM productos;" , $link) or die(mysql_error());
$sqlSumaPresios= mysql_query("select SUM(montoTotal) from materiales where idPresupuesto='$idPresupuesto';", $link) or die(mysql_error());
$row = mysql_fetch_array($sqlSumaPresios);

?>
<!DOCTYPE html>
<html>
<head>
  <!--Se define la ruta a donde se quiere dar el estilo y esto se hace en el encabezado  -->
  <meta charset="utf-8"/> 
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Presupuestos</title>
  <link rel="stylesheet" type="text/css" href="../../../css/diseno.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../../../css/sesion.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../../../css/formularios.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../../../css/menus.css" media="screen" />
  <link href="../../../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../src/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../../../bootstrap/css/sb-admin.css" rel="stylesheet">
  <style type="text/css">

    div.container-fluid{
      font-size: 15px;
    }


    h1{
      padding-top: 15px;
    }
    form{
    
    background-color: white;
    width: 90%;
    border: 1px solid #c4c4c4;
    padding-right: 20px;
    padding-left: 5%;
    height: auto;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  
    }
    #registrar{
      width: 100%;

    }
    #cantidad{
      width: 100%;
      text-align: center;

    }
    .form-control{
      width: 100%;
    }
    .presio{
      margin-left: 35px;
      margin-top: 8px;
    }
    .montoTotal{
      margin-top: 8px;
      margin-left: 56px;
    }
    #pies{
      margin-top: 4px;
      margin-left: -5px;
    }
    label{
      margin-top: 5px;
    }
    input{
    }
  </style>
</head>
<body>
  <center>
    <div class="row">
      <div class="superior">
        <img class="logo" src="../../../imagenes/LOGO2.png">
      </div>
    </div>
  </center>
  <nav class="navbar navbar-inverse" id="nav">
   <div class="container">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../menuadmin.php">Menú de control</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-picture" aria-hidden="true">&nbsp; </span>Catálogo<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../../galerias/subirFoto.php"><b>Subir foto</b></a></li>
              <li><a href="../../galerias/cocinas.php">Cocinas integrales</a></li>
              <li><a href="../../galerias/closets.php">Closets</a></li>
              <li><a href="../../galerias/camas.php">Camas</a></li>
              <li><a href="../../galerias/mesas.php">Mesas</a></li>
              <li><a href="../../galerias/buros.php">Buros</a></li>
              <li><a href="../../galerias/escritorios.php">Escritorios</a></li>
              <li><a href="../../galerias/puertas.php">Puertas</a></li>
              <li><a href="../../galerias/marcos.php">Marcos</a></li>
              <li><a href="../../galerias/otros.php">Otros</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" glyphicon glyphicon-file><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;</span>Consultar</span><span class="caret"></a>
            <ul class="dropdown-menu">
             <li><a href="../clientes/showClientes.php">Clientes</a></li>
             <li><a href="../proveedores/showProveedores.php">Proveedores</a></li>
             <li><a href="../productos/showProductos.php">Productos</a></li>
             <li><a href="showPresupuestos.php">Presupuestos</a></li>
             <li><a href="../ventas/showVentas.php">Ventas</a></li>
           </ul>
         </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" glyphicon glyphicon-file><span class="glyphicon glyphicon-plus-sign" aria-hidden="true">&nbsp;</span>Nuevo</span><span class="caret"></a>
          <ul class="dropdown-menu">
           <li><a href="altaClientes.php">Cliente</a></li>
           <li><a href="../proveedores/altaProveedores.php">Proveedor</a></li>
           <li><a href="../productos/altaProductos.php">Producto</a></li>
           <li><a href="generaPresupuesto.php">Presupuesto</a></li>
         </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbsp; </span>Generar<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="costoenProductos.php">Abono</a></li>
          <li><a href="showPresupuestos.php">Venta</a></li>
          <li><a href="#">Reporte de ventas</a></li>
        </ul>
      </li>
      <li><a href="../ventas/showCuentas.php"><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp; </span>Cuentas</a></li>
      <!--<li><a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true">&nbsp; </span><b>Cerrar sesion<b/</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <a href="../../../../controller/sesiones/logout.php"><button type="button" id="btnlogin" class="btn btn-primary btn-lg"> Logout &nbsp;<span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span></button></a>
   </ul>
 </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
</nav>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <form class="registro" action="../../../../controller/presupuestos/registraMaterial.php?idPresupuesto=<?php echo $idPresupuesto;?>" method="POST" enctype="multipart/form-data" name="frmaltaPresupuesto">
      <h1>Presupuesto de productos empleados</h1>
      <legend></legend>
      <div class="form-group row">
        <label for="example-search-input" class="col-xs-1 col-form-label">Producto</label>
        <div class="col-md-3">
          <select  class="form-control" type="textarea" id="productos" name="idProducto" placeholder="Descripcion general del presupuesto" required>
            <option value="">Selecciona producto...</option>
            <?php while($rows= mysql_fetch_array($sql)){ ?>
            <option value="<?php echo $rows['idProducto'];?>"><?php echo $rows['descripcion'];?></option>
            <?php } ?>
          </select>
        </div>
        <label for="example-search-input" class="col-xs-1 col-form-label">Precio</label>
        <div class="col-md-2">
        <div class="input-group"> <span data-toggle="tooltip" title="Costo total de presupuesto" class="input-group-addon"><i class="glyphicon glyphicon-usd" ></i></span><input class="form-control" type="text" id="precio" placeholder="0.00" name="precio">
          </div>
        </div>
        <div class="col-md-2">
          <input class="form-control" type="text" id="cantidad" placeholder="Cantidad" onBlur="calcularMT();" name="cantidad" required>
        </div>  
        <label for="example-search-input" class="col-xs-1 col-form-label" data-toggle="tooltip" title="Monto total">M.T.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-hand-right" onclick="calcularMT();" style="cursor:pointer;" data-toggle="tooltip" title="Calcular el monto total"></span></label>
        <div class="col-md-2">
         <div class="input-group"> <span data-toggle="tooltip" title="Costo total de presupuesto" class="input-group-addon"><i class="glyphicon glyphicon-usd" ></i></span><input class="form-control" type="text" id="montoTotal" placeholder="0.00" name="montoTotal" required>
          </div>
          
        </div> 
      </div>
      <div class="row">
        <!--<div class="col-md-2 col-md-offset-1"><div class="input-group"> <span data-toggle="tooltip" title="Costo total de presupuesto" class="input-group-addon"><i class="glyphicon glyphicon-usd" ></i></span><input class="form-control" type="text" id="precio" placeholder="0.00" name="totalenMaterial" readondly onKeyPress="return solonumeros(event)" value="<?php #if ($row['SUM(montoTotal)']>0) { echo $row['SUM(montoTotal)'];} ?>"></div>
      </div> -->
       <div class="col-md-1 col-md-offset-9"><button type="submit" class="btn btn-primary" id="registrar"> 
  <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> </button></div>
      <div class="col-md-2"><a href="detallesPresupuesto.php?idPresupuesto=<?php echo $idPresupuesto?>"><button type="button" class="btn btn-primary" id="registrar"> Terminar </button></a></div>
    </div>
    <br>
    <div class="row">
      <table class="table">
        <thead>
          <tr class="success" align="center">
            <td><b>Cantidad</b></td><td><b>Producto</b></td><td><b>Precio</b></td><td><b>Monto Total</b></td><td></td>
          </tr>
        </thead>
        <tbody>
          <?php 
          $sql2 = mysql_query("SELECT materiales.noRegistro, materiales.cantidad, productos.descripcion, productos.precio, materiales.montoTotal FROM Materiales, productos WHERE materiales.idPresupuesto='$idPresupuesto' and productos.idProducto=materiales.idProducto;" , $link) or die(mysql_error());
          while ($rows2=mysql_fetch_array($sql2)){?>
          <tr align="center">
            <td><?php echo $rows2['cantidad']; ?></td>
            <td><?php echo $rows2['descripcion']; ?></td>
            <td><?php echo $rows2['precio']; ?></td>
            <td><?php echo $rows2['montoTotal']; ?></td>
            <td align="center"><a href="../../../../controller/presupuestos/bajaRegistroProductos.php?noRegistro=<?php echo $rows2 ['noRegistro'];?>&idPresupuesto=<?php echo $idPresupuesto; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </form>
</body>
<script src="../../../src/materialize/js/jquery.js"></script>
<script src="../js/jquery.js"></script>
<script src="../../../src/materialize/js/jquery.js"></script>
<script src="../../../src/bootstrap/js/validator.js"></script>
<script src="../../../src/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../src/bootstrap/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../../../src/bootstrap/js/sb-admin.js"></script>
<script src="../../../src/bootstrap/bootstrap-select/dist/bootstrap-select.min.js"></script>
<script src="precioPresupuesto.js"></script>
<script>
 function calcularMT(){
  var cantidad = $("#cantidad").val();
  if (isNaN(cantidad)){
    cantidad=0;
  }
  var precio=$("#precio").val();
  if (isNaN(precio)){
    precio=0;
  }
  var montoTotal = cantidad*precio;
  $("#montoTotal").val((montoTotal).toFixed(2));
}
$("#productos").change(function funcVerificar()
{
    var idProducto=$('#productos').val()
    $.get("verificaPrecioProducto.php?idProducto="+idProducto,function(data){
    $('#precio').val(data);
    });
    $('#cantidad').focus();
});

</script>
</html> 
