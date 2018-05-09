<?php
include 'admin/extend/header-online.php';
if (isset($_GET['tip_des'])) {
  $tipo_destino = $con->real_escape_string(htmlentities($_GET['tip_des']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes WHERE tipo_destino = ? ");
  $sel->bind_param("i", $tipo_destino);
}
else if (isset($_GET['inter'])) {
  $es_inter = $con->real_escape_string(htmlentities($_GET['inter']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes WHERE internacional = ? ");
  $sel->bind_param("i", $es_inter);
}
else if (isset($_GET['oferta'])) {
  $es_oferta = $con->real_escape_string(htmlentities($_GET['oferta']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes WHERE oferta = ? ");
  $sel->bind_param("i", $es_oferta);
}
else {
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes");
}
?>
    <div class="row main">
      <?php
      $sel->execute();
      $sel->bind_result($id, $id_paquete, $titulo, $subtitulo, $descripcion, $precio, $descripcion_detallada,
        $condiciones, $dias, $continente, $pais, $foto_principal, $tipo_destino, $internacional, $oferta);
      while ($sel->fetch()) {?>
      <div class="col s12 m6 l3">
        <div class="card ">
          <span class="card-title"><?php echo $titulo?></span>
          <div class="card-image">
            <img src="admin/paquetes/<?php echo $foto_principal?>">
            <span class="card-title"><?php echo '$'.number_format($precio, 2);?></span>
          </div>
          <div class="card-content">
            <p><?php echo $descripcion?></p>
          </div>
          <div class="card-action">
            <a href="ver_mas.php?id=<?php echo $id_paquete?> ">Ver mas..</a>
          </div>
        </div>
      </div>
      <?php }
      $sel -> close();
       ?>
    </div>
<?php include 'admin/extend/footer-online.php'; ?>