<?php
 $destinatario = "xoyehog489@xmail365.net";
 $aunto = "prueba de email";
 $mensaje = "esto es una prueba";

 $exito = mail($destinatario, $aunto, $mensaje);
 if ($exito){
     echo 'email enviado';
 }else{
     echo 'envio fallido';
 }

?>

//xampp configuar el servicio 
