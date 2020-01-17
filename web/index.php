<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/body-login.css">
	<title>Proyecto</title>
</head>
<body style="background-attachment: fixed" >
<!-- <img class="fotoUbu" src="images/ubu.png"> -->
		<div class="formRegister col-md-4 offset-md-4 col-sm-10 offset-sm-1"  valign="middle">
			<img class="fotoHp" src="images/hp.png">
			<div class="title">
				<h1>Inicio de sesión </h1>
			</div>
			<form action="validar.php" method="post">
				<div class="form-group">
					<label for="mail-loggin">Correo</label>
					<!-- <input class="form-control" id="mail-loggin" type="email" placeholder="Introduzca su correo" name="mail"> -->
					<input class="form-control" id="mail-loggin" type="text" placeholder="Introduzca su correo" name="mail">
				</div>

				<div class="form-group">
					<label for="password-loggin">Contraseña</label>
					<input class="form-control" id="password-login" type="password" name="pass" placeholder="Introduzca su contaseña">
				</div>
				
					<input class="btn btn-primary" type="submit" value="Aceptar">
			</form>
			<p>¿No esta registrado? <a href="registrarse.php">Cree su nueva cuenta</a>. </p>
			<p><a href="olvidoContraseña.php">He olvidado la contraseña</a>.</p>
			
		</div>
		<?php
				include("include/footer.php");
			?>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
?>
</body>
</html>