<?php
	session_start();
	extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id=$_POST['idUser'];
	$pass= $_POST['pass'];
	$repeatPass=$_POST['repeatPass'];
	require("connect_db.php");
	$checkid=mysqli_query($mysqli,"SELECT * FROM login WHERE id=$id");
	$checkid=mysqli_num_rows($checkid);
	$resent = null;
	$texto_error=null;
	if($pass==$repeatPass && $checkid>0){
		if(empty($pass)){
			$sentencia="update login set user='$user' where id='$id'";
			//$texto_error = "El usario fue modificado con exito";
		}else{
			$pass=sha1($_POST['pass']);
			$sentencia="update login set user='$user', password='$pass' where id='$id'";
			//$texto_error = "La contraseña fue cambiada con exito";
		}
		//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$resent=mysqli_query($mysqli,$sentencia);
	}else{
		$texto_error = "Algo fue mal, las contraseñas no coinciden.";
	}
	if($texto_error==null){
		$resent=mysqli_query($mysqli,$sentencia);
		// var_dump($resent);exit;
		if (is_null($resent)) {
			$texto_error = "Error de procesamiento, no se han actualizado los datos";
		}
	}
	if(isset($texto_error)){
		echo '<script>alert("'.$texto_error.'")</script>';
		//ir a la misma pagina, donde estabamos actualizarUsuarioAdmin.php
		echo "<script>location.href='admin.php'</script>";
	}else {
		echo '<script>alert("El usuario ddddddddddddddddddddddddddddo la contraseña han sido actualizados con exito.")</script>';	
		echo "<script>location.href='modificarUsuario.php'</script>";
	}
?>