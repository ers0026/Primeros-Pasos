<?php

    function aleatorioCnt($longitud){
        $caracteres= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        $numero_caracteres = strlen($caracteres);
        $string_aleatrorio = '';
        for($i=0; $i<9; $i++){
            $string_aleatrorio .=$caracteres[rand(0, $numero_caracteres-1)];
        }
        return $string_aleatrorio;
    }
    if(isset($_POST['enviar_email'])){
        $email = $_POST['email'];
        require("connect_db.php");
        //la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
        $checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
        $check_mail=mysqli_num_rows($checkemail);
		if($check_mail>0){
            //falta sacar el usuario para que se añada a la clave 
        }

        $nombre_usuario = $usuario;
        $string_aleatrorio = sa(10);

        $url_unkonow = hash('sha1', $string_aleatrorio . $nombre_usuario);//devolvera una clave aleatoria mas el nombre de usuario 

    }

?>