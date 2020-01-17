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
        <h1>Añadir producto</h1>
        <span id="contadorContratos"></span>

        <h2 id="prodcuto"></h2>
        <span id="insTrans"></span>
        <span id="insTrans2"></span>
        <hr>

        <label for="fabricante" class="col-md-4 control-label">Fabricante</label>
        <input id="fabricante" type="text" ><br>

        <label for="origenProducto" class="col-md-4 control-label">Origen del producto</label>
        <input id="origenProducto" type="text"><br>

        <label for="destinoProducto" class="col-md-4 control-label">Destino del producto</label>
        <input id="destinoProducto" type="text"><br>

        <label for="distribuidor" class="col-md-4 control-label">Empresa distribuidora</label>
        <input id="distribuidor" type="text"><br>

        <label for="nombreProducto" class="col-md-4 control-label">Nombre del prodcuto</label>
        <input id="nombreProducto" type="text"><br>

        <label for="cantidad" class="col-md-4 control-label">Cantidad</label>
        <input id="cantidad" type="text"><br>

		<label for="typeCNAE" class="col-md-4 control-label">Elija el numero del CNAE que desea:</label>
        <input id="typeCNAE" type="hidden" disabled class="col-md-2">

        <select id=pruebaTipo name="CNAE" class="col-md-7">
            <option value="0">Seleccione una opción</option>
            <option value="1">1.-Agricultura, ganadería, silvicultura y pesca</option>
            <option value="2">2.-Industrias Extractivas</option>
            <option value="3">3.-Industria Manufacturera</option>
            <option value="4">4.-Suministro de energía eléctrica, gas, vapor y aire acondicionado</option>
            <option value="5">5.-Construcción</option>
            <option value="6">6.-Comercio al por mayor y al por menor; reparación de vehículos de motor</option>
            <option value="7">7.-Transporte y almacenamiento</option>
            <option value="8">8.-Hostelería</option>
            <option value="9">9.-Información y comunicaciones</option>
            <option value="10">10.-Actividades financieras y de seguro</option>
            <option value="11">11.-Actividades inmobiliarias</option>
            <option value="12">12.-Actividades profesionales, científicas y técnicas</option>
            <option value="13">13.-Actividades administrativas y servicios auxiliares</option>
            <option value="14">14.-Administración pública y defensa; seguridad social obligatoria</option>
            <option value="15">15.-Educación</option>
            <option value="16">16.-Actividades sanitarias y de servicios sociales</option>
            <option value="17">17.-Actividades artísticas, recreativas y de entretenimiento</option>
            <option value="18">18.-Otros servicios</option>
            <option value="19">19.-Actividades de los hogares como empleadores de personal doméstico</option>
            <option value="20">20.-Actividades de organizaciones y organismos extraterritoriales</option>
          </select>
        <div class="row" style="margin:30px 0px 5px 0px">
            <button id="buttonContract" type="submit" class="btn btn-primary">Realizar contrato</button>  

            <button type="button" class="btn btn-primary" style="margin-left:60px" onclick="history.back()">Volver</button> 
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
      let ethereum = window.ethereum;
		let web3 = window.web3;
		if (typeof ethereum !== 'undefined') {
		 ethereum.enable();
		 web3 = new Web3(ethereum);
		} else if (typeof web3 !== 'undefined') {
		 web3 = new Web3(web3.currentProvider);
		} else {
		 web3 = new Web3(new Web3.providers.HttpProvider(process.env.WEB3_PROVIDER));
		}

        web3.eth.defaultAccount = web3.eth.accounts[0];

        var smartContract = web3.eth.contract([{"constant":true,"inputs":[{"name":"_address","type":"address"}],"name":"getInstructor","outputs":[{"name":"","type":"uint256"},{"name":"","type":"uint256"},{"name":"","type":"string"},{"name":"","type":"string"},{"name":"","type":"string"},{"name":"","type":"string"},{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getInstructors","outputs":[{"name":"","type":"address[]"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"","type":"uint256"}],"name":"instructorAccts","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_address","type":"address"},{"name":"_cantidad","type":"uint256"},{"name":"_typeCNAE","type":"uint256"},{"name":"_fabricante","type":"string"},{"name":"_origenProducto","type":"string"},{"name":"_destinoProducto","type":"string"},{"name":"_nombreProducto","type":"string"},{"name":"_distribuidor","type":"string"}],"name":"setInstructor","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"countInstructors","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"anonymous":false,"inputs":[{"indexed":false,"name":"fabricante","type":"string"},{"indexed":false,"name":"origenProducto","type":"string"},{"indexed":false,"name":"destinoProducto","type":"string"},{"indexed":false,"name":"nombreProducto","type":"string"},{"indexed":false,"name":"distribuidor","type":"string"},{"indexed":false,"name":"typeCNAE","type":"uint256"},{"indexed":false,"name":"cantidad","type":"uint256"}],"name":"instructorInfo","type":"event"}]);

        var contrato = smartContract.at('0x62B2eBccEfEf2bb0D5B6027ECc39375413057C1F');

        var instructorEvent = contrato.instructorInfo({},'latest');

        instructorEvent.watch(function (err, result) {
            if (!err) {
                if (result.blockHash != $("#instrans").html()) {
                    $("#loading").hide();
                    $("#insTrans").html('Block hash: ' +result.blockHash);
                    //$("#insTrans2").html(result.args.fabricante + ' ' + result.args.origenProducto + ' ' + result.args.destinoProducto + ' ' + result.args.nombreProducto + ' ' + result.args.distribuidor + ' ' + result.args.typeCNAE +  ' ' + result.args.cantidad );
                    var request = $.ajax({
                        url: 'guardarProducto.php',    
                        method: 'POST', 
                        data: {
                            fabricante : result.args.fabricante ,
                            origenProducto :result.args.origenProducto,
                            distribuidor : result.args.distribuidor,
                            cantidad : "'"+result.args.cantidad+"'",
                            nombreProducto : result.args.nombreProducto,
                            typeCNAE : "'"+result.args.typeCNAE+"'",
                            destinoProducto : result.args.destinoProducto,
                            },               
                        dataType: "json",
                        success: function(){
                            alert('llego y guardo');
                        },         
                    });
                }
            } else {
                $("#loading").hide();
            }
        });

        contrato.countInstructors((err, res) => {
            if (res)
                $("#contadorContratos").html(res.c + ' contratos realizados.'); 
        });

        $("#buttonContract").click(function() {
            $("#loading").show();
           contrato.setInstructor(web3.eth.defaultAccount, $("#cantidad").val(), $("#typeCNAE").val(), $("#fabricante").val(), $("#origenProducto").val(), $("#destinoProducto").val(), $("#nombreProducto").val(), 
                                            $("#distribuidor").val(), 
                    (err, res) => {console.log(res)});
        });

        $( "#pruebaTipo" ).change(function() {
            $("#typeCNAE").val(this.value);
        });
       
    </script>
</div>
</body>
</html>