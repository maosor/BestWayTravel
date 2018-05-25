<?php
include '../conexion/conexion.php';
include '../extend/libreria.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
foreach ($_POST as $campo => $valor) {
$variable = "$".$campo."='".htmlentities($valor)."';";
eval($variable);
}
$id_paquete= sha1(rand(00000,99999));
$consecutivo = '';
$foto_principal = 'fotos_paquete/foto_principal.png';
$oferta = 0;
$mostrar = 0;
$favorito = 0;
$continente= obtener_continente($pais);
$ins = $con->prepare("INSERT INTO paquetes VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$ins->bind_param("issssdssiiisiiiiiss", $consecutivo, $id_paquete, $titulo, $subtitulo, $descripcion, $precio, $descripcion_detallada,
 $condiciones, $dias, $continente, $pais, $foto_principal, $tipo_destino, $internacional, $oferta, $mostrar, $favorito, $lugares, $servicios);

if ($ins->execute()) {
  header('location:../extend/alerta.php?msj=Guardó paquete&c=paq&p=in&t=success');
}else {

  header('location:../extend/alerta.php?msj=No guardó el paquete'.$ins->error.'&c=paq&p=in&t=error');
}
$con->close();
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=paq&p=in&t=error');
}
 ?>
