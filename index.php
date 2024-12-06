<?php
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $token='hola';

        $palabraReto = $_GET['hub_challenge'];
    
        $tokenVerificacion = $GET['hub_verify_token'];
    
        if($token === $tokenVerificacion){
            echo $palabraReto;
            exit;
        };
    };

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $respuesta = file_get_contents("php://input");
        $respuesta = json_decode($respuesta, true);
        $mensaje = "Telefono:".$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from']."</br>";
        $mensaje.="Mensaje:".$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        file_put_contents("text.txt",$mensaje);
    }
?>