<?php
session_start();
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)){
header ('Location:../../../../index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
  <!--Se define la ruta a donde se quiere dar el estilo y esto se hace en el encabezado  -->
  <meta charset="utf-8"/> 
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <title>Proveedores</title>
  <link rel="stylesheet" type="text/css" href="../../../css/diseno.css" media="screen" />
   <link rel="stylesheet" type="text/css" href="../../../css/formularios.css" media="screen" />
  <!-- Core CSS - Include with every page -->
    <link href="../../../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../src/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="../../../bootstrap/css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
  h2{
    margin-top: -2px;
  }
  table{
    margin-top:8px;
  }
  #fondo{
    border: 1px solid #c4c4c4;
    padding-right: 20px;
    padding-left: 20px;
    height: auto;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  }
  p{
      text-align: left;
      padding-left: 110px;
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
             <li><a href="showProveedores.php">Proveedores</a></li>
             <li><a href="../productos/showProductos.php">Productos</a></li>
             <li><a href="../presupuestos/showPresupuestos.php">Presupuestos</a></li>
             <li><a href="../ventas/showVentas.php">Ventas</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" glyphicon glyphicon-file><span class="glyphicon glyphicon-plus-sign" aria-hidden="true">&nbsp;</span>Nuevo</span><span class="caret"></a>
          <ul class="dropdown-menu">
             <li><a href="../clientes/altaClientes.php">Cliente</a></li>
             <li><a href="altaProveedores.php">Proveedor</a></li>
             <li><a href="../productos/altaProductos.php">Producto</a></li>
             <li><a href="../presupuestos/generaPresupuesto.php">Presupuesto</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbsp; </span>Generar<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="showProveedores.php">Abono</a></li>
          <li><a href="../presupuestos/showPresupuestos.php">Venta</a></li>
          <li><a href="#">Reporte de ventas</a></li>
          </ul>
        </li>
        <li><a href="../ventas/showCuentas.php"><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp; </span>Cuentas</a></li>
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
<div class="row">
 <div class="col-md-10 col-md-offset-1" id="fondo">    
 <form class="navbar-form navbar-left" role="search" id="buscar" action="buscarProveedor.php" method="POST">
   <div class="row">
  <div class="col-md-5 col-md-offset-1"><br><h2>Sección de proveedores</h2></div>
  <div class="col-md-5 ">
    <div class="input-group">
     <input style="width: 100%;" type="text" class="form-control" placeholder="Buscar por nombre de proveedor" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();">
      <span c|click="limpiarBuscador();">Todos los proveedores</button>
      </span>
    </form>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->  
</div>
<div id="resultadoBusqueda"></div>
</body>
<script src="../../../src/bootstrap/js/jquery.min.js"></script> 
<script src="../../../src/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../src/bootstrap/js/sb-admin.js"></script>
<script src="../../../js/eliminar.js"></script>
 <script>
  $(document).ready(function() {
    var textoBusqueda = $("input#busqueda").val();
    consultas();
    if (textoBusqueda == "") {
      $('#search').attr('disabled', true);
    }else{
      $('#search').attr('disabled', false);
    }
  });
  function buscar() {
    consultas();
    var textoBusqueda = $("input#busqueda").val();
    if (textoBusqueda == "") {
      $('#search').attr('disabled', true);
    }else{
      $('#search').attr('disabled', false);
    }
  };
  function limpiarBuscador() {
     $("input#busqueda").val('');
    $('#search').attr('disabled', true);
    consultas();
  }
  function consultas(){
     var textoBusqueda = $("input#busqueda").val();
    $.post("buscarProveedor.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
      $("#resultadoBusqueda").html(mensaje);
    }); 
  }
</script>
</html> 
