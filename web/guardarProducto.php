<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
require("connect_db.php");
$id_usuario = $_SESSION['id'];
$fabricante =  $_POST["fabricante"];
$origenProducto = $_POST["origenProducto"];
$distribuidor =  $_POST["distribuidor"];
$cantidad =  $_POST["cantidad"];
$nombreProducto =  $_POST["nombreProducto"];
$typeCNAE =  $_POST["typeCNAE"];
$destinoProducto = $_POST["destinoProducto"];

$consulta = "INSERT INTO productosusuarios ( id_usuario, fabricante, origenProducto, distribuidor, cantidad, nombreProducto, typeCNAE, destinoProducto) VALUES($id_usuario, '$fabricante','$origenProducto','$distribuidor',$cantidad,'$nombreProducto',$typeCNAE,'$destinoProducto')";	
$ressql=mysqli_query($mysqli,$consulta);
?>