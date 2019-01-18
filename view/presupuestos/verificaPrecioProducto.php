<?php
	$idProducto=$_GET['idProducto'];
	include "../../../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT precio FROM productos WHERE idProducto='$idProducto'", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la insersion a la base de datos: ".mysql_error()."</p>");
}else{
	$row=mysql_fetch_array($sql);  
	$precio=$row['precio'];
	echo $precio;
}
?>