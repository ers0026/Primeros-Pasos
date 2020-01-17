<?php
	if(isset($_POST['email'])){
		$email_rec=$_POST['email'];
		require("connect_db.php");
		//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email_rec'");
		$check_mail=mysqli_num_rows($checkemail);
		if($check_mail>0){
			$NewPassword = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$nuevaPassword= "";
			for($i = 0; $i<9; $i++){
				$n= rand(0,strlen($NewPassword));
				$nuevaPassword = $nuevaPassword.substr($NewPassword, $n, 1);
			}
			$nuevaPasswordSha = sha1($nuevaPassword);
			$nuevaBD=mysqli_query($mysqli,"UPDATE login SET password=".$nuevaPasswordSha." where email=".$email_rec);
			$check_mail=mysqli_num_rows($nuevaBD);
			if(!$check_mail){
				die("Error en base de datos".mysql_error());		
			}
			$mensaje = "La clave para poder recuperar tu cuenta será: ".$nuevaPassword. "\n Recomendamos cambiar la contraseña en su primer uso.";
		}else{
			$texto ="El correo no esta registrado";
		}
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/body-login.css">
	<title>Proyecto</title>
</head>
<body style="background-attachment: fixed" >
		<div class="formRegister col-md-4 offset-md-4 col-sm-10 offset-sm-1"  valign="middle">
			<div class="title">
				<h1>Recuperación de contraseña</h1>
      </div>
      <p>Lo primero, comprobemos que el correo existe</p>
      <p>Introduce tu correo y procederemos a enviar un correo para restablecer la contraseña.</p>
      <form  method="post" action="">
		<fieldset>
			<div class="form-group">
				<label for="name">Ingrese su correo</label>
				<input class="form-control" id="name" type="text" placeholder="Introduzca su correo" name="email" required>
			</div>
			<input  class="btn btn-danger" type="submit" name="enviar_email" value="Recuperar contraseña"/>
		</fieldset>
	</form> 
      <p><a href="index.php">Inicie sesión</p>
	</div>
	<?php
		include("include/footer.php");
	?>
	</body>


</html>