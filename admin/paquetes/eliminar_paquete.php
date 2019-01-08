<?php
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$foto = htmlentities($_GET['foto']);
$del = $con->prepare("DELETE FROM paquetes WHERE id_paquete=? ");
$del -> bind_param('s', $id);
if ($del -> execute()) {
  unlink($foto);
  $sel = $con->prepare("SELECT ruta FROM imagenes WHERE id_paquete = ?");
  $sel -> bind_param('s', $id);
  $sel -> execute();
  $sel -> bind_result();
  while ($sel ->fetch()) {
    if ($foto != "fotos_paquete/foto_principal") {
      unlink($f['ruta']);
    }

  }
  $del_img = $con->prepare("DELETE FROM imagenes WHERE id_paquete = ?");
  $del_img -> bind_param('s', $id);
  $del_img -> execute();
  $del_img ->close();
  header('location:../extend/alerta.php?msj=Paquete eliminado&c=paq&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=Paquete no eliminado&c=paq&p=in&t=error');
}


$con ->close();
$del ->close();
 ?>
