<?php
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);
$id_paquete = htmlentities($_GET['id_paquete']);
$del = $con->prepare("DELETE FROM imagenes WHERE id=? ");
$del -> bind_param('i', $id);

if ($del -> execute()) {
  unlink($ruta);
  header('location:../extend/alerta.php?msj=Imagen borrada&c=paq&p=img&t=success&id='.$id_paquete.'');
}else {
  header('location:../extend/alerta.php?msj=Imagen no borrada&c=paq&p=img&t=error&id='.$id_paquete.'');
}
$del ->close();
$con ->close();

 ?>
