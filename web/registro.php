<?php
  
	$newUser=$_POST['newUser'];
	$mail=$_POST['newMail'];
	$pass= $_POST['pass'];
	$pass = sha1($pass);
	$repeatPass=sha1($_POST['repeatPass']);
	$avatar = $_POST['avatar'];
	$captcha = $_POST['g-recaptcha-response'];
	$secret = "6LfqvcQUAAAAAIumJA5ojvDDsGwRLrTZuFQ78SIS";
	$resp = null;
	require("connect_db.php");
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$repeatPass && $captcha){
			if($check_mail>0){
				echo ' <script language="javascript">alert("El e-mail ya esta registrado, inicie sesion para poder acceder.");</script> ';
				echo "<script>location.href='registrarse.php'</script>";
			}else{
				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				if(!empty($avatar)){
					$avatar = "'images/".$avatar.".png'";
				}else{
					$avatar = "NULL";
				}
				$response =file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");			
				$arr = json_decode($response, TRUE);
				if($captcha && $arr['success']){
					mysqli_query($mysqli,"INSERT INTO login VALUES('','$newUser','$pass','$mail','','2',$avatar)");
					//echo 'Se ha registrado con exito';
					echo ' <script language="javascript">alert("Usuario fue registrado con éxito");</script> ';
					echo "<script>location.href='index.php'</script>";	
				}
			}
		}elseif(!$captcha){
			echo ' <script language="javascript">alert("No se olvide de marcar no soy un robot");</script> ';
			echo "<script>location.href='registrarse.php'</script>";
		}else{
			echo '<script language="javascript">alert("Las contraseñas no coinciden, registrese de nuevo.");</script> ';
			echo "<script>location.href='registrarse.php'</script>";
		}
?>