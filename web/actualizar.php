<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>		
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	
	<link rel="stylesheet" type="text/css" href="css/body.css">
  </head>
<body data-offset="40" style="background-attachment: fixed">
<div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 bc-white">
	<?php
		include("include/menu.php");
	?>
	<div class="registerAdmin col-md-8 offset-md-3 col-sm-10 offset-sm-1"  valign="middle">
		<h2> Administración de usuarios registrados</h2>
		<h4>Edición de usuarios</h4>
		<?php
		extract($_GET);
		require("connect_db.php");
		$sql="SELECT * FROM login WHERE id=$id ";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$user=$row[1];
		    	$email=$row[3];
		    }
		?>
		<form action="ejecutaactualizar.php" method="post">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly" disabled><br>
				Usuario<br> <input type="text" name="user" value="<?php echo $user?>"><br>
				Correo usuario<br> <input type="text" name="email" value="<?php echo $email?>" disabled><br>
				Contraseña<br> <input type="password" name="pass" value="" placeholder="Introduce nueva contraseña"><br>
				Repetir contraseña<br> <input type="password" name="repeatPass" value="" placeholder="Repite la nueva contraseña"><br>
				<br>
				<input type="hidden" name="idUser" value="<?php echo $id ?>" />
				<input class="btn btn-primary" type="submit" value="Guardar" />
				<button id="button" class="btn btn-primary" style="margin-left:60px" onclick="location.href='index2.php'">Volver</button> 

		</form>
	</div>

</div>
    <!-- Carga mas rapido la pagina -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>


