<?php
session_start();
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)){
header ('Location:../../../../index.html');
}
$folioVenta=$_REQUEST['folioVenta'];
include "../../../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT  clientes.nombreCliente, ventacredito.montoRestante, ventacredito.estado FROM ventacredito, clientes WHERE ventacredito.idCliente=clientes.idCliente and folioVenta='$folioVenta';" , $link) or die(mysql_error());
$rows=mysql_fetch_array($sql);
$sql1 = mysql_query("SELECT * from abonos where folioVenta='$folioVenta';" , $link) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/> 
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <title>Ventas</title>
  <link rel="stylesheet" type="text/css" href="../../../css/diseno.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../../../css/formularios.css" media="screen" />
    <link href="../../../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../src/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../../bootstrap/css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
 form{
    background-color: white;
    width: 90%;
    border: 1px solid #c4c4c4;
    padding-right: 20px;
    padding-left: 5%;
    height: auto;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  }
  h2{
    margin-top: -2px;
  }
   #fondo{
    border: 1px solid #c4c4c4;
    padding-right: 20px;
    padding-left: 20px;
    height: auto;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  }
  #txtfecha{
    width: 82%;
  }
  #registrar{
    margin-bottom: 5px;
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
             <li><a href="../presupuestos/showPresupuestos.php">Presupuesto</a></li>
             <li><a href="showVentas.php">Ventas</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" glyphicon glyphicon-file><span class="glyphicon glyphicon-plus-sign" aria-hidden="true">&nbsp;</span>Nuevo</span><span class="caret"></a>
          <ul class="dropdown-menu">
             <li><a href="../clientes/altaClientes.php">Cliente</a></li>
             <li><a href="../proveedores/altaProveedores.php">Proveedor</a></li>
             <li><a href="../productos/altaProductos.php">Producto</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbsp; </span>Generar<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="showVentas.php">Abono</a></li>
          <li><a href="../presupuestos/generaPresupuesto.php">Presupuesto</a></li>
          <li><a href="../presupuestos/showPresupuestos.php">Venta</a></li>
          <li><a href="reporteVentas.php">Reporte de ventas</a></li>
          </ul>
        </li>
         <li><a href="showCuentas.php"><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp; </span>Cuentas</a></li>
        <!--<li><a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true">&nbsp; </span><b>Cerrar sesion<b/</a></li>-->
      </ul>
        <ul class="nav navbar-nav navbar-right">
       <a href="../../../../controller/sesiones/logout.php"<li><button type="button" id="btnlogin" class="btn btn-primary btn-lg"> Logout &nbsp;<span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span></button></a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</nav>
 <div class="col-md-4 col-md-offset-4">
     <form  action="../../../../controller/ventas/registraAbono.php?folioVenta=<?php echo $folioVenta; ?>" method="POST" enctype="multipart/form-data" name="frmaltaProductos" id="frmRegistro">
  <h1>Abonos</h1>
  <legend></legend>
  <div class="form-group row">
   <label for="example-search-input" class="col-xs-2 col-md-4 ">Cliente:</label>
  <div class="form-group has-feedback">
   <div class=" col-xs-10 col-md-8">
   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   <input type="text" id="cliente" name="fecha" class="form-control" value="<?php echo $rows['nombreCliente']?>" required/>
  </div> 
</div>
</div>
</div>
   <div class="form-group row">
   <label for="example-search-input" class="col-xs-2 col-md-4 ">Fecha:</label>
  <div class="form-group has-feedback">
   <div class=" col-xs-10 col-md-8">
   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   <input type="date" id="txtfecha" name="fechaAbono" class="form-control" value="<?php echo date("Y-n-j"); ?>" required/>
  </div> 
</div>
</div>
</div>
  <div class="form-group row">
   <label for="example-search-input" class="col-xs-2 col-md-4 ">Monto de abono:</label>
  <div class="form-group has-feedback">
   <div class=" col-xs-10 col-md-8">
   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input class="form-control" type="text" id="precio" placeholder="0.00" name="montoAbono" onKeyPress="return solonumeros(event)">
  </div> 
</div>
</div>
</div>
<div class="form-group row">
   <label for="example-search-input" class="col-xs-2 col-md-4 ">Monto restante:</label>
  <div class="form-group has-feedback">
   <div class=" col-xs-10 col-md-8">
   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <b><input class="form-control" type="text" id="precio" placeholder="0.00" value="<?php echo $rows['montoRestante']?>" name="montoRestante" readonly onKeyPress="return solonumeros(event)"></b>
  </div> 
</div>
</div>
</div>
<div class="row">
  <div class="col-md-5 col-md-offset-7 col-xs-3"><button type="submit" class="btn btn-primary" id="registrar"> Registrar </button><a href="showCuentas.php" type="submit" class="btn btn-primary" id="registrar"> Terminar </a>
</div>
  <h4>Historial de abonos</h4>
  <legend></legend>
</form>
  <table class="table">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <thead>
    <tr class="success">
<th>Fecha de abono</th><th>Monto</th>
    </thead>
    </thead>
    <?php
    while ($rows2 = mysql_fetch_array($sql1)){
     // <td><input type="checkbox" /></td>
    ?>
  <tbody>
    <tr>
      <td width="50%"> <?php echo $rows2['fechaAbono']; ?> </td>
      <td width="50%"> $ <?php echo $rows2['montoAbono']; ?> </td>
      </tr>
  <?php
}
?>
<tbody>
</div>
</div>
</table>
</div>
<br>
</body>
<script src="../../../src/bootstrap/js/jquery-1.10.2.js"></script>
<script src="../../../src/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../src/bootstrap/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../../../src/bootstrap/js/sb-admin.js"></script>
</html> 
