<!DOCTYPE html>
<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}
	?>
<html lang="en">
  <head>
	<meta charset="utf-8">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/body.css">
	<title>Proyecto</title>
  </head>
<body data-offset="40" style="background-attachment: fixed">
<div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 bc-white">
	<?php
		include("include/menu.php");
	?>
	<div class="registerAdmin" valign="middle">
		<div class="tittle">
			<h2>Modificar el usuario: <?php echo $_SESSION['user'];?></h2>
		</div>	
		<table class='table'>
			<tr class='warning'>
				<th>Usuario</th>
				<th>Correo</th>
				<th>Editar</th>
				<th>Eliminar cuenta</th>
			</tr>
			<?php 
				require("connect_db.php");
				$sql=("SELECT * FROM login where id=".$_SESSION['id']);
				$query=mysqli_query($mysqli,$sql);
				while($change=mysqli_fetch_array($query)){
			?>
			<tr class='success'>
				<td><?php echo $change[1]?></td>
				<td><?php echo $change[3]?></td>
				<td>
					<a href='actualizarUsuario.php?id=<?php echo $change[0]?>'>
						<i class="icon icon-md ion-md-create"></i>
					</a>
				</td>
				<td>
					<span onclick="var deleteUser = confirm('¿Estás seguro de que desea borrar este usuario?'); if(deleteUser){ $(location).attr('href','modificarUsuario.php?id=<?php echo $change[0]?>&idborrar=2')}">
						<i class="icon icon-red icon-md ion-md-trash"></i>
					</span>
				</td>	
			</tr>
			<?php	
				}
			?>
		</table>
		<?php
				extract($_GET);
				if(@$idborrar==2){
					$sqlborrar="DELETE FROM login WHERE id=$id";
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo '<script>alert("REGISTRO ELIMINADO")</script>';
						echo "<script>location.href='index.php'</script>";
				}
			?>
		</div>
		<div class="row" style="margin:30px 0px 5px 0px">
            <button id="button" class="btn btn-primary" onclick="location.href='index2.php'">Volver</button> 
        </div>
		
	</div>
</body>
</html>