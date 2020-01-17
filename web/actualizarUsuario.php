<!DOCTYPE html>
<?php
session_start();
if (!$_SESSION['user']) {
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
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
  </head>
<body data-offset="40" style="background-attachment: fixed">
<div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 bc-white">
	<?php
		include("include/menu.php");
	?>
	<div class="registerAdmin"  valign="middle">
		
		<?php
		extract($_GET);
		require("connect_db.php");
		$id=$_SESSION['id'];
		$sql="SELECT * FROM login WHERE id='$id'";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	// $id=$row[0];
		    	$user=$row[1];
		    	$email=$row[3];
		    }
		?>
		<h2>Editar datos del usuario: <?php echo $user;?></h2>
		<form action="ejecutarActualizarUsuario.php" method="post">
				<!-- Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly" disabled><br> -->
				Usuario<abbr title="El usuario nunca podrá quedar vacio, en caso de estar vacio no podremos guardar.">
						<i class="icon2 ion-md-information-circle col-lg-1"></i> 
					</abbr><br>
					<input onkeyup="validar()" class="inputValidar" type="text" name="user" value="<?php echo $user?>"><br>
				Correo usuario<br> <input type="text" name="email" value="<?php echo $email?>"readonly="readonly" disabled><br>
				Contraseña actual<abbr title="Al introducir esta contraseña, me obliga a introducir contraseña nueva, en caso de estar vacios ambos campos la contraseña seguira siendo la misma.">
						<i class="icon2 ion-md-information-circle col-lg-1"></i> 
					</abbr><br> <input onkeyup="validarCnt()" class="passValidarCnt" type="password" name="passOld" value="" placeholder="Introduce nueva contraseña"  pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$"><br>
				<!-- Contraseña<br><input class="form-control" type="password" name="pass" placeholder="Introduzca su contaseña" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$"> -->
				Nueva contraseña <abbr title="Introduce al menos una mayúscula, una minuscula y un dígito, texto entre 8 y 12 caracteres.">
						<i class="icon2 ion-md-information-circle col-lg-1"></i> 
					</abbr><br>
				<input onkeyup="validarCnt()" class="passValidarCnt" type="password" name="pass" value="" placeholder="Introduce nueva contraseña"  pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$"><br>
				
				<!-- Repetir contraseña<br><input class="form-control" type="password" name="pass" placeholder="Introduzca su contaseña" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$"> -->
				Repetir contraseña nueva<br> <input type="password" name="repeatPass" value="" placeholder="Repite la nueva contraseña"  pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,12}$"><br>
				<br>
				<div class="row" style="margin:30px 0px 5px 0px">
					<button id="button" type="submit" class="btn btn-primary">Guardar</button>  

					<button type="button" class="btn btn-primary" style="margin-left:60px" onclick="location.href='modificarUsuario.php'">Volver</button> 
        		</div>
				<input type="hidden" name="idUser" value="<?php echo $id ?>" />
				
		</form>	
	</div>

</div>
    <!-- Carga mas rapido la pagina -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
  </body>
  <script>
  function validar(){
	var validado = true;
	elementos = document.getElementsByClassName("inputValidar");
	for(i=0;i<elementos.length;i++){
		if(elementos[i].value == "" || elementos[i].value == null){
			validado = false
		}
	}
	if(validado){
	document.getElementById("button").disabled = false;
	
	}else{
		document.getElementById("button").disabled = true;
	//Salta un alert cada vez que escribes y hay un campo vacio
	//alert("Hay campos vacios")   
	}
  }
  function validarCnt(){
	var validado = true;
	elementos = document.getElementsByClassName("passValidarCnt");
	for(i=0;i<elementos.length;i++){
		if(elementos[i].value =="" && elementos[i].value == ""){
			validado = false
		}
	}
	if(validado){
		document.getElementById("button").disabled = false;
	
	}else{
		document.getElementById("button").disabled = true;
	//Salta un alert cada vez que escribes y hay un campo vacio
	//alert("Hay campos vacios")   
	}
  }
  </script>
</html>



