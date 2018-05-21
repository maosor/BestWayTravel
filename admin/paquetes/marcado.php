<?php
include '../conexion/conexion.php';
$id= htmlentities($_GET['id']);
if (isset($_GET['mostrar']))
{
  $marcado = htmlentities($_GET['mostrar']);
  $up = $con->prepare("UPDATE paquetes SET mostrar=? WHERE id_paquete=? ");
}
else if (isset($_GET['oferta']))
{
  $marcado = htmlentities($_GET['oferta']);
  $up = $con->prepare("UPDATE paquetes SET oferta=? WHERE id_paquete=? ");
}
else if (isset($_GET['favorito']))
{
  $marcado = htmlentities($_GET['favorito']);
  $up = $con->prepare("UPDATE paquetes SET favorito=? WHERE id_paquete=? ");
}
$up -> bind_param('is', $marcado, $id);
if ($marcado == 0) {
  $marc = 'desmarcado';
}else {
  $marc = 'marcado';
}
if ($up -> execute()) {
  header('location:../extend/alerta.php?msj=Paquete '.$marc.'&c=paq&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=El paquete no pudo ser marcado&c=paq&p=in&t=error');
}
$up ->close();
$con ->close();
 ?>
