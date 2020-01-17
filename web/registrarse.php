<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/body-login.css">
	<title>Proyecto</title>
</head>
<body style="background-attachment: fixed" >
		<div class="formRegister col-md-4 offset-md-4 col-sm-10 offset-sm-1"  valign="middle">
			<div class="title">
				<h1>Registro</h1>
      </div>
      <form  method="post" action="registro.php">
		<fieldset>
			<div class="form-group">
				<label for="name-register">Ingrese su nombre</label>
				<input class="form-control" id="name-register" type="text" placeholder="Introduzca su usuario" name="newUser" required>
			</div>
			<div class="form-group">
				<label for="name-register">Eliga su avatar</label>
							<img src="images/avatar1.png" alt="Avatar" class="avatar" id="avatar1">
							<img src="images/avatar2.png" alt="Avatar" class="avatar" id="avatar2">
							<img src="images/avatar3.png" alt="Avatar" class="avatar" id="avatar3">
							<img src="images/avatar4.png" alt="Avatar" class="avatar" id="avatar4"> 
							<img src="images/avatar5.png" alt="Avatar" class="avatar" id="avatar5">
							<input id="avatar" type="hidden" name="avatar">
			</div>
			<div class="form-group">
				<label for="mail-register">Introduzca su correo</label>
				<input class="form-control" id="mail-loggin" type="email" placeholder="Introduzca su correo" name="newMail" required>
				<!-- <input class="form-control" id="mail-register" type="text" placeholder="Introduzca su correo" name="newMail" required> -->
			</div>
			<div class="form-group">
				<label for="password-register">Introduzca su contraseña <span class="info row" title="texto al pasar el raton"></label>
					<abbr title="Introduce al menos una mayúscula, una minuscula y un dígito, texto entre 8 y 12 caracteres.">
							<i class="icon2 ion-md-information-circle col-lg-1"></i> 
					</abbr>
				</span>
				<input class="form-control" id="password-register" type="password" name="pass" placeholder="Introduzca su contaseña" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$">
				<!-- <input class="form-control" id="password-register" type="password" name="pass" placeholder="Introduzca su contaseña" required> -->
				
			</div>
			<div class="form-group">
				<label for="password-register">Repita la contraseña</label>
				<input class="form-control" id="password-register-repeat" type="password" name="repeatPass" placeholder="Repita la contaseña" required>
			</div>
			<div class="g-recaptcha" data-theme="dark" data-sitekey="6LfqvcQUAAAAABEs6xA3DGsKiMY38KUJb273EKIS" ></div>
			
			<input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>
		</fieldset>

	</form> 
      <p>¿Ya esta registrado? <a href="index.php">Inicie sesión</p>
	</div>

	<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php
		include("include/footer.php");
	?>
</body>
	
<script>
	$( ".avatar" ).click(function() {
		$(".avatar").css('opacity', '0.5');
		$(this).css('opacity', '1.0');
		$("#avatar").val($(this).attr('id'));
	});
	
</script>
</html>