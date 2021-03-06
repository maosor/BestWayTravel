<?php
include 'admin/conexion/conexion_web.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
foreach ($_POST as $campo => $valor) {
  $variable = "$".$campo."='".htmlentities($valor)."';";
  eval($variable);
}
$header= 'MIME-Version: 1.0'."\r\n";
$header.='Content-type: text/html; charset=UTF-8'."\r\n";
$header.= "From: {$nombre} <{$correo}>"."\r\n";
if (!isset(($_POST['paquete'])))
{
$mensaje="<html>
<head>
    <link rel='stylesheet' href='https://bestwaytravelcr.com/bestwaytravel/admin/css/materialize.min.css' />
  <title>

  </title>
</head>
<body>
  <p>{$mensaje}</p>
</body>
</html>";
}else {
  $asunto = "Solicitud de cotización - ".$paquete;
  $mensaje="<html>
  <head>
    <title>
    </title>
    <style>
    html {
      line-height: 2;
      font-family: 'Roboto', sans-serif;
      font-weight: normal;
      color: rgba(0,0,0,0.87);
    }
    b, strong {
      font-weight: bold;
    }
    .row {
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 20px;
      display: table-row;
    }
    .row .col.s3 {
      width: 25%;
      margin-left: auto;
      left: auto;
      right: auto;
    }
    .row .col.s12 {
      width: 100%;
      margin-left: auto;
      left: auto;
      right: auto;
    }
    .row .col.s8 {
      width: 66.6666666667%;
      margin-left: auto;
      left: auto;
      right: auto;
    }
  .row .col.s4 {
      width: 33.3333333333%;
      margin-left: auto;
      left: auto;
      right: auto;
    }
    .row .col {
        float: left;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0 .75rem;
        min-height: 1px;
    }
    </style>
  </head>
  <body>
  <div class='row'>
    <div class='col s12'>
      <b>Paquete o destino :</b>
    {$paquete}
    </div>
  </div>
  <div class='row'>
    <div class='col s3'>
      <b>Fecha Salida:</b>
    {$fecha_salida}
    </div>
    <div class='col s3'>
      <b>Fecha Regreso:</b>
    {$fecha_regreso}
    </div>
    <div class='col s3'>
      <b>Pasajeros Adultos:</b>
    {$pasajeros_adultos}
    </div>
    <div class='col s3'>
      <b>Pasajeros Niños:</b>
    {$pasajeros_ninos}
    </div>
  </div>
  <div class='row'>
    <div class='col s8'>
      <b>Nombre Completo:</b>
    {$nombre}
    </div>
    <div class='col s4'>
      <b>Pais</b>
    {$pais}
    </div>
  </div>
  <div class='row'>
    <div class='col s3'>
      <b>Correo:</b>
    {$correo}
    </div>
    <div class='col s3'>
      <b>Teléfono:</b>
    {$telefono}
    </div>
    <div class='col s3'>
      <b>Teléfono Celular:</b>
    {$celular}
    </div>
  </div>
  <div class='row'>
    <div class='col s12'>
      <b>Comentarios:</b>
    {$mensaje}
    </div>
  </div>
  </body>
  </html>";
  $mensaje = html_entity_decode($mensaje);
}
$mail = mail("info@bestwaytravelcr.com", $asunto, $mensaje, $header);
if ($mail) {
  echo "<h4 style='color:green;'>El mensaje ha sido enviado </h4>";
}else{
  echo "<h4 style='color:red;'>El mensaje no pudo ser enviado </h4>";
  }
$con->close();
}else {
    echo "<h4 style='color:red;'>Utilice el formulario </h4>";
}
 ?>
