<?php include 'admin/extend/header-online.php'; ?>
    <div class="slider">
      <ul class="slides">
        <?php
          $sel = $con->prepare("SELECT ruta,titulo, descripcion FROM slider");
          $sel -> execute();
          $sel -> bind_result($ruta,$titulo, $descripcion);
          while ($sel ->fetch()) {?>
        <li>
          <img src="admin/inicio/<?php echo $ruta ?> "> <!-- random image -->
            <div class="infopaq light white-text">
              <div class="infopaqtexto">
                <h5><b><?php echo $titulo?></b></h5>
                <div class="content">
                  <p class="flow-text"><?php echo $descripcion?></p>
                  <button type="button" class="btn small right infopaqtexto" name="button"><i class="material-icons">more_horiz</i></button>
                </div>
              </div>

            </div>

        </li>
        <?php }
        $sel->close(); ?>
      </ul>
    </div>
    <div class="row">
      <?php
      $sel_marc = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
        condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes WHERE oferta = 1 and mostrar = 1");
      $sel_marc -> execute();
      $sel_marc -> bind_result($id, $id_paquete, $titulo, $subtitulo, $descripcion, $precio, $descripcion_detallada,
        $condiciones, $dias, $continente, $pais, $foto_principal, $tipo_destino, $internacional, $oferta);
      while ($sel_marc->fetch()) {?>
      <div class="col s12 m6 l3">
        <div class="card">
          <div class="card-image">
            <img src="admin/paquetes/<?php echo $foto_principal?>">
            <span class="card-title"><?php echo '¢'.number_format($precio, 2);?></span>
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
$sel_marc -> close();
 ?>
    </div>
    <?php include 'admin/extend/footer-online.php'; ?>
