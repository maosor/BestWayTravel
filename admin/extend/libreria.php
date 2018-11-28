<?php
function tipo_destino($tipo_destino)
{
  if ($tipo_destino == 1)
  {
    return "INTERNACIONAL";
  }else {
    return "NACIONAL";
  }
}
function destino($destino)
{
  if ($destino == 1)
  {
    return "PLAYA";
  }else if($destino == 2) {
    return "MONTAÑA";
  }
  else if($destino == 3) {
    return "CIUDAD";
  }
  else if($destino == 4) {
    return "TOUR DE UN DIA";
  }
  else if($destino == 5) {
    return "CIUDAD Y PLAYA";
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
  $sel->fetch();
  $sel -> close();
  return $nombre;

}
 ?>
