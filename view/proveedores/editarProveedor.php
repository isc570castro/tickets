 <?php
session_start();
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)){
header ('Location:../../../../index.html');
}
 $idProveedor=$_REQUEST['idProveedor'];
include "../../../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT * FROM proveedores where idProveedor='$idProveedor';" , $link) or die(mysql_error());

$rows = mysql_fetch_array($sql);
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
  <link rel="stylesheet" type="text/css" href="../../../css/sesion.css" media="screen" />
  <!-- Core CSS - Include with every page -->
    <link href="../../../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../src/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
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
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbsp; </span>Generar<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="editarProveedor.php">Abono</a></li>
          <li><a href="../presupuestos/generaPresupuesto.php">Presupuesto</a></li>
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
<br>
<div class="row">
  <div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
  <form class="frmRegistro" action="../../../../controller/proveedores/actualizarProveedores.php?idProveedor=<?php echo $idProveedor;?>" method="POST" enctype="multipart/form-data" name="frmaltaClientes" id="frmRegistro">
  <h1>Editar proveedor</h1>
  <legend></legend>
    <legend><font size="5"> Datos del proveedor: </font></legend>
      <div class="form-group row">
     <div class="form-group has-feedback">
  <label for="example-search-input" class="col-xs-2 col-md-1 col-form-label">Nombre</label>
   <div class="col-md-11">
   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input class="form-control" type="text" id="nombre" placeholder="Nombre" name="nombreProveedor" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" value="<?php echo $rows['nombreProveedor']?>">
  </div> 
</div>
</div>
</div>
<div class="form-group row">
<div class="form-group has-feedback">
  <label for="example-search-input" class="col-xs-2 col-md-1 col-form-label">Domicilio</label>
   <div class="col-md-11">  
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input class="form-control" type="text" id="domicilio" placeholder="Calle / Número / Colonia" name="domicilio" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" value="<?php echo $rows['domicilio']?>">
  </div> 
</div>
</div>
</div>
<div class="form-group row">
<div class="form-group has-feedback">
  <label for="example-search-input" class="col-xs-2 col-md-1 col-form-label">Teléfono</label>
   <div class="col-md-11">
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    <input class="form-control" type="tel" id="telefono" placeholder="Teléfono" name="telefono" onKeyPress="return solonumeros(event)" value="<?php echo $rows['telefono']?>">
  </div> 
</div>
</div>
</div>
<div class="form-group row">
<div class="form-group has-feedback">
 <label for="example-search-input" class="col-xs-2 col-md-1 col-form-label">>Correo</label>
   <div class="col-md-11">
    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input class="form-control" type="text" id="correo" placeholder="Correo" name="correo" pattern="\w+@+\w+\.+[a-z]" value="<?php echo $rows['correo']?>">
  </div> 
</div>
</div>
</div>
<div class="row">
  <div class="col-md-10 col-xs-9"></div>
  <div class="col-md-2 col-xs-3"><button type="submit" class="btn btn-primary" id="registrar"> Registrar </button></div>
</div>
 <br>
</form>
</div>
</div>
<script src="../../../src/bootstrap/js/sb-admin.js"></script>
<script src="../../../src/bootstrap/js/jquery.min.js"></script> 
<script src="../../../src/bootstrap/js/bootstrapvalidator.min.js"></script> 
<script src="../../../src/bootstrap/js/bootstrap.min.js"></script>
 <script src="../../../js/eliminar.js"></script>
<script>
  $(document).ready(function () {
$('#frmRegistro').bootstrapValidator({
   /*feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },*/
    fields: {
        nombreCliente: {
            validators: {
                stringLength: { min: 1},
                 stringLength: { max: 45 },
                notEmpty: { message:'El campo nombre es obligatorio'}
            }
        },
    /*     domicilio: {
            validators: {
                stringLength: { min: 1 },
                stringLength: { max: 45 },
                notEmpty: { message:'El campo domicilio es obligatorio'}
            }
        },
         correo: {
            validators: {
                notEmpty: { message: 'El campo de e-mail es obligatorio' },
               // emailAddress: { message: 'E-mail no valido' }
            }
        },*/
        telefono: {
            validators: {
                phone: {
                    country: 'MX',
                    message: 'Numero no Valido'
                }
            }
        },
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
<script  type='text/javascript'>
  function solonumeros(e){
  key=e.keyCode || e.which;
  teclado=String.fromCharCode(key);
  numeros="0123456789";
  especiales="8-37-37-45"; //array
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
  </script>
</html>
 