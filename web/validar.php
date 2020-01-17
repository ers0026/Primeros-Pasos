
<?php

session_start();
	require("connect_db.php");

	$username=$_POST['mail'];
	$pass=sha1($_POST['pass']);

	$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['password']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			$_SESSION['rol']=$f2['rol'];
			$_SESSION['avatar']=$f2['avatar'];
			echo "<script>location.href='admin.php'</script>";
		
		}
	}


	$sql=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			$_SESSION['rol']=$f['rol'];
			$_SESSION['avatar']=$f2['avatar'];

			header("Location: index2.php");
		}else{
			echo '<script>alert("Contraseña incorrecta, introducela de nuevo.")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("El usuario no esta registrado, registrese para iniciar sesión.")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}

?>