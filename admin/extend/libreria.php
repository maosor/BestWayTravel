<?php
function tipo_destino($tipo_destino)
{
  if ($tipo_destino == 1)
  {
    return "Internacional";
  }else {
    return "Nacional";
  }
}
function destino($destino)
{
  if ($destino == 1)
  {
    return "Playa";
  }else if($destino == 2) {
    return "Montaña";
  }
  else if($destino == 3) {
    return "Tour un Día";
  }else {
    return "";
  }

}
function obtener_continente($id_pais)
{
  include '../conexion/conexion.php';
  $sel = $con->prepare("SELECT id_continente FROM paices WHERE id = ?");
  $sel->bind_param("i", $id_pais);
  $sel -> execute();
  $sel->bind_result($id_continente);
  $sel->fetch();
  $sel -> close();
  return $id_continente;

}
function obtener_pais($id_pais)
{
  include '../conexion/conexion.php';
  $sel = $con->prepare("SELECT nombre FROM paices WHERE id = ?");
  $sel->bind_param("i", $id_pais);
  $sel -> execute();
  $sel->bind_result($nombre);
  $sel -> close();
  return $nombre;

}
 ?>
