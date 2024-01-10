<?php

// Verifica si todos los campos del formulario están completos
if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['correo']) || !isset($_POST['comentarios'])) {
    echo 'Por favor, complete todos los campos del formulario.';
    exit;
}

if( $SERVER [ 'REQUEST_METHOD'] != 'POST'){
    header('Location: index.html');
}

//Variables
$empresa = $_POST['empresa'];
$solucion = $_POST['solucion-de-problemas'];
$presentacion = $_POST['presentacion-del-personal'];
$desempeño = $_POST['desempeño-del-personal'] ;
$calidad = $_POST['calidad-de-servicio'];
$rapidez =  $_POST['rapidez-de-respuesta'];
$referencia = $_POST['referencia'];

$para = 'soporte@jerlysecurity.com.ar, contacto@jerlysecurity.com.ar'; 
$subject = "Resultado de la encuesta de $empresa";

// Mensaje que se envia al mail

$mensaje = <<< HTML
    <div style= "padding: 1rem; border: 1px solid">
    <h2 style="text-align: center"> Encuesta de satisfacción de <strong>$empresa</strong> </h2>
    <p style="text-align: center"><strong>Solución de Problemas:</strong> $solucion </p>
    <p style="text-align: center"><strong>Presentación del Personal:</strong> $presentacion </p>
    <p style="text-align: center"><strong>Desempeño del Personal:</strong> $desempeño </p>
    <p style="text-align: center"><strong>Calidad de Servicios:</strong> $calidad </p>
    <p style="text-align: center"><strong>Rapidez en la Respuesta:</strong> $rapidez </p>
    <p style="text-align: center"><strong>Referencia:</strong> $referencia </p>
    <p style="text-align: center"> Encuesta creada por Tomas Saini (tomas.saini@msn.com)</p>
    </div>
    HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: Enviado desde la encuesta online \r\n";



if (mail($para , "Encuesta de satisfacción de $empresa", $mensaje, $headers)) {
    header ("Location: gracias.html");
    exit();
} else {
    echo ("Hubo un error y no se pudo enviar la encuesta, intente nuevamente");
}



?>



