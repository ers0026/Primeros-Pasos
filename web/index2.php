<!DOCTYPE html>
	<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/body.css">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<title>Proyecto</title>
  </head>
<body data-offset="40" style="background-attachment: fixed">
<div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 bc-white">
	<?php
		include("include/menu.php");
    ?>
	
    <div class="row choose" valign="middle">
		<!--Añadir producto-->
		<div class="user line-input col-md-4 offset-md-1"  onclick="$(location).attr('href','contrato.php');">
			<span>Añadir producto</span>
		</div>
		<!--Consultar el ultimo producto añadido-->
		<div class="user line-input col-md-4 offset-md-2" onclick="$(location).attr('href','pag4.php');">
			<span>Consultar productos existentes</span>
		</div> 
		<!--Consultar todos productos existentes-->
		 
	</div>
		<div class="userTodos line-input col-md-4 offset-md-2" onclick="$(location).attr('href','listarTodo.php');">
			<span>Consultar todos los productos añadidos</span>
		</div>
</div>
</body>
</html>
