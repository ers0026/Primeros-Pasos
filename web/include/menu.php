<!DOCTYPE html>
<?php
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</head>
<body>
<div class="div-menu">
	<form method="post" action="desconectar.php">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<p href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </p>
					</li>
				</ul>

				<ul class="nav pull-right">
				
					<li class="nav-item">
						<?php
							if(!is_null($_SESSION['avatar'])){
						?>
							<img src="<?php echo $_SESSION['avatar']?>" onclick="showSubMenu()" class="avatar" style="opacity:1.0"/>
						<?php		
							} else{
						?>
							<i class="iconAvatar ion-md-contact"  onclick="showSubMenu()"></i>
						<?php
							}
						?>
						<ul class="submenu">
							<?php
								if ($_SESSION['rol']==2) {
							?>
									<li><a href="modificarUsuario.php">Modificar datos</a></li>	
							<?php
								}
							?>
							<li><a href="desconectar.php">Cerrar sesión</a></li>
							<!-- <input class="btn btn-primary" type="submit" value="Cerrar sesión"> -->
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</form>
</div>
</body>
<script>
	function showSubMenu(){
		var display = $( '.submenu' ).css( "display" );
		if(display == 'block'){
			$('.submenu').css('display', 'none');
		}else{
			$('.submenu').css('display', 'block');
		}
	}
</script>
</html>