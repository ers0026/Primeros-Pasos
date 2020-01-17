<?php
	session_start();
	extract($_POST);//extraer todos los valores del metodo post del formulario de actualizar
	$id=$_POST['idUser'];
	$passOld = $_POST['passOld'];
	$pass= $_POST['pass'];
	$repeatPass=$_POST['repeatPass'];
	require("connect_db.php");
	$res=mysqli_query($mysqli,"SELECT * FROM login WHERE id=$id");
	$numRows=mysqli_num_rows($res);
	if($numRows>0){
		$userbd=mysqli_fetch_row($res);
		$texto_error = null;
		$sentencia=null;
		$resent = null;
		if(empty($pass) ){
			$sentencia="update login set user='$user' where id='$id'";
		}else{
			if(sha1($passOld) == $userbd[2]){
				if($pass==$repeatPass){
					$pass=sha1($_POST['pass']);
					$sentencia="update login set user='$user', password='$pass' where id='$id'";
					//$texto_error = "Las contraseñas fueron modificadas con exito";
				} else{
					$texto_error = "Las contraseñas no coinciden, introduzca de nuevo.";
				}
			}else{
				$texto_error = "La contraseña antigua no es la misma, introduzcalas de nuevo.";
			}	
		}//else{
		//  	$texto_error = "No se modifico ningún dato";
		// }
		if($texto_error==null){
			$resent=mysqli_query($mysqli,$sentencia);
			if (is_null($resent)) {
				$texto_error = "Error de procesamiento, no se han actualizado los datos";
			}
		}
	}else{
		$texto_error ="No existe usuario";
	}

	if(isset($texto_error)){
		echo '<script>alert("'.$texto_error.'")</script>';
		//no me lleva bien a esta pagina.
		echo "<script>location.href='actualizarUsuario.php'</script>";	
	}else {
		$_SESSION['user'] = $user;
		// var_dump($_SESSION['user']); exit;
		echo '<script>alert("El usuario o la contraseña han sido actualizados con exito.")</script>';
		//cuando acabo bien en modificar usuario tengo que cerrar sesion y volver a abrir para ver los cambios.
		echo "<script>location.href='modificarUsuario.php'</script>";
	}
?>
<html>