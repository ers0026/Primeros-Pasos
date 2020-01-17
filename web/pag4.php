<!DOCTYPE html>
<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
    }
    $id_usuario = $_SESSION['id'];
    
    require("connect_db.php");
    $consulta = "SELECT * FROM productosusuarios WHERE id_usuario = $id_usuario ORDER BY id DESC LIMIT 1";	
    // var_dump($consulta); exit;
    	
    $ressql=mysqli_query($mysqli,$consulta);
    $producto = null;
    while($change=mysqli_fetch_array($ressql)){
        $producto = $change;
    }
	?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto</title>

    <script src="./node_modules/web3/dist/web3.min.js"></script>
    
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/body.css">
</head>
<body>
<div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 bc-white">
	<?php
		include("include/menu.php");
	?>
    <div class="registerAdmin"  valign="middle"> 
        <div class="col-lg-12 m-total-40">
        <h1>Esta consultando el registro de: <?php echo $_SESSION['user'];?></h1> 
        <h1 class="datosUsuario">Los datos son:</h1>
        <div class="col-lg-12">
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Fabricante</span>: 
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaManufacturer" disabled value="<?php echo !is_null($producto) ? $producto['fabricante'] : null ?>"/><br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Origen del producto</span>: 
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaDistribuidora" disabled value="<?php echo !is_null($producto) ? $producto['origenProducto'] : null ?>"/><br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Destino del producto</span>: 
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaDestino" disabled value="<?php echo !is_null($producto) ? $producto['destinoProducto'] : null ?>"/><br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Empresa distribuidora</span>:
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaOrigen" disabled value="<?php echo !is_null($producto) ? $producto['distribuidor'] : null ?>"/><br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Nombre</span>:
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaNombre" disabled value="<?php echo !is_null($producto) ? $producto['nombreProducto'] : null ?>"/><br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Cantidad</span>:
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaFecha" disabled value="<?php echo !is_null($producto) ? $producto['cantidad'] : null ?>" /> <br/>
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">CNAE</span>:
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="pruebaTipo" disabled value="<?php 
                    if($producto['typeCNAE']==1){
                        echo "Agricultura, ganadería, silvicultura y pesca";
                    }elseif($producto['typeCNAE']==2){
                        echo "Industrias Extractivas";
                    }
                    elseif($producto['typeCNAE']==3){
                        echo "Industria Manufacturera";
                    }
                    elseif($producto['typeCNAE']==4){
                        echo "Suministro de energía eléctrica, gas, vapor y aire acondicionado";
                    }
                    elseif($producto['typeCNAE']==5){
                        echo "Construcción";
                    }
                    elseif($producto['typeCNAE']==6){
                        echo "Comercio al por mayor y al por menor; reparación devehículos de motor y motocicletas";
                    }
                    elseif($producto['typeCNAE']==7){
                        echo "Transporte y almacenamiento";
                    }
                    elseif($producto['typeCNAE']==8){
                        echo "Hostelería";
                    }
                    elseif($producto['typeCNAE']==9){
                        echo "Información y comunicaciones";
                    }
                    elseif($producto['typeCNAE']==10){
                        echo "Actividades financieras y de seguro";
                    }
                    elseif($producto['typeCNAE']==11){
                        echo "Actividades inmobiliarias";
                    }
                    elseif($producto['typeCNAE']==12){
                        echo "Actividades profesionales, científicas y técnicas";
                    }
                    elseif($producto['typeCNAE']==13){
                        echo "Actividades administrativas y servicios auxiliares";
                    }
                    elseif($producto['typeCNAE']==14){
                        echo "Administración pública y defensa; seguridad social obligatoria";
                    }
                    elseif($producto['typeCNAE']==15){
                        echo "Educación";
                    }
                    elseif($producto['typeCNAE']==16){
                        echo "Actividades sanitarias y de servicios sociales";
                    }
                    elseif($producto['typeCNAE']==17){
                        echo "Actividades artísticas, recreativas y de entretenimiento";
                    }
                    elseif($producto['typeCNAE']==18){
                        echo "Otros servicios";
                    }
                    elseif($producto['typeCNAE']==19){
                        echo "Actividades de los hogares como empleadores de personal doméstico; como productores de bienes y servicio de uso propio";
                    }
                    elseif($producto['typeCNAE']==20){
                        echo "Actividades de organizaciones y organismos extraterritoriales";
                    }
                ?>"><br/>
                    
                </div>
            </div>
            <div class= "row m-top-10">
                <div class="col-md-offset-2 col-lg-4">
                    <span class= "font-bold">Fecha y hora</span>:
                </div>
                <div class="col-lg-4">
                    <input class="input-user-data" type="text" id="fecha" disabled value="<?php echo !is_null($producto) ? $producto['fecha'] : null ?>"/><br/>
                </div>
            </div>
        </div>
        <div class="row" style="margin:30px 0px 5px 0px">
            <button id="button" class="btn btn-primary" style="margin-left:60px" onclick="history.back()">Volver</button> 
        </div>
    </div>     
</div>
</body>
</html>
