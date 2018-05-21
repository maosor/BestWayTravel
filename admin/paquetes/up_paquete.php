<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

foreach ($_POST as $campo => $valor) {
  $variable = "$" . $campo. "='" . htmlentities($valor). "';";
  eval($variable);
}

$up = $con->prepare("UPDATE paquetes SET titulo =?, dias =?, precio =?, subtitulo =?, pais =?, internacional =?,
   tipo_destino =?, descripcion =?, descripcion_detallada =?, condiciones =? WHERE id_paquete =? ");
$up->bind_param("sidsiiissss", $titulo, $dias, $precio, $subtitulo, $pais, $internacional,
$tipo_destino, $descripcion, $descripcion_detallada, $condiciones, $id);

if ($up->execute()) {
  header('location:../extend/alerta.php?msj=Editó paquete&c=paq&p=in&t=success');
}else{
  header('location:../extend/alerta.php?msj=No editó la paquete&c=paq&p=in&t=error');
}

  $up->close();
  $con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
  }

 ?>
