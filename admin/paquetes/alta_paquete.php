<?php include '../extend/header.php';
include '../extend/libreria.php';
if(isset($_GET['id']))
{
  $id = $con->real_escape_string(htmlentities($_GET['id']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta, mostrar FROM paquetes
    WHERE id_paquete = ?");
  $sel->bind_param("s", $id);
  $sel -> execute();
  $sel->bind_result( $consecutivo, $id_paquete, $titulo, $subtitulo, $descripcion, $precio, $descripcion_detallada,
     $condiciones, $dias, $continente, $pais, $foto_principal, $tipo_destino, $internacional, $oferta, $mostrar);
  $sel->fetch();
  $accion = 'Actualizar';
  $sel -> close();
}else {
  $accion = 'Insertar';
  $consecutivo =''; $id_paquete =''; $titulo =''; $subtitulo =''; $descripcion =''; $precio =''; $descripcion_detallada ='';
    $condiciones =''; $dias =''; $continente =''; $pais =''; $foto_principal =''; $tipo_destino =''; $internacional =''; $oferta =''; $mostrar ='';
  }

?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <?php if ($accion=='Actualizar'): ?>
          <span class="card-title">Edición de paquete </span>
        <?php else: ?>
          <span class="card-title">Insertar paquete </span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h5 align="center"><b>DATOS GENERALES</b></h5>
        <form  action="ins_paquete.php" method="post" autocomplete="off" >
          <div class="row">
            <div class="col s7">
              <div class="input-field">
                <input type="text" name="titulo"  id="titulo" value="<?php echo $titulo?>" required maxlength=50>
                <label for="titulo">Titulo</label>
              </div>
            </div>
            <div class="col s2">
              <div class="input-field">
                <input type="number" name="dias"  id="dias" value="<?php echo $dias?>" required maxlength=2 >
                <label for="dias">días</label>
              </div>
            </div>
            <div class="col s3">
              <div class="input-field">
                <input type="number" name="precio"  id="precio" value="<?php echo $precio?>" required  >
                <label for="precio">Precio</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field">
                <input type="text" name="subtitulo"  id="subtitulo" value="<?php echo $subtitulo?>"required maxlength=150 >
                <label for="subtitulo">SubTitulo</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s4">
              <select id="pais" name="pais" required>
                <?php if ($accion=="Insertar"): ?>
                  <option value="" disabled>SELECCIONA UN PAIS</option>
                <?php else: ?>
                  <option value="<?php echo $pais?>" disabled><?php echo obtener_pais($pais)?></option>
                <?php endif;
                  $sel_pais = $con->prepare("SELECT * FROM paices order by nombre");
                  $sel_pais -> execute();
                  $res_pais = $sel_pais -> get_result();
                  while ($f_pais =$res_pais->fetch_assoc()) {?>
                    <option value="<?php echo $f_pais['id']?>" ><?php echo $f_pais['nombre']?></option>
                  <?php }
                  $sel_pais->close();
                 ?>
              </select>
            </div>
            <div class="col s4">
              <select id="internacional" name="internacional" value="" required>
                <?php if ($accion=="Insertar"): ?>
                  <option value="" disabled>SELECCIONA UN TIPO DESTINO</option>
                <?php else: ?>
                  <option value="<?php echo $internacional?>" disabled ><?php echo tipo_destino($internacional)?></option>
                <?php endif; ?>

                  <option value="0">NACIONAL</option>
                  <option value="1">INTERNACIONAL</option>
              </select>
            </div>
            <div class="col s4">
              <select id="tipo_destino" name="tipo_destino" required>
                <?php if ($accion=="Insertar"): ?>
                  <option value="" disabled>SELECCIONA UN DESTINO</option>
                  <?php else: ?>
                  <option value="<?php echo $tipo_destino?>" ><?php echo destino($tipo_destino)?></option>
                <?php endif; ?>

                  <option value="1">PLAYA</option>
                  <option value="2">MONTAÑA</option>
                  <option value="3">TOUR UN DIA</option>
              </select>
            </div>
          </div>
        <h5 align="center"><b>DATOS DETALLADOS</b></h5>
        <div class="row">
          <div class="col s12">
            <div class="input-field">
              <textarea name="descripcion" class="materialize-textarea" maxlength=400><?php echo $descripcion?></textarea>
              <label for="descripcion">Descripcion corta</label>
            </div>
          </div><!--Termina Primer columna -->
        </div>
        <div class="row">
          <div class="col s12">
            <div class="input-field">
              <textarea name="descripcion_detallada" class="materialize-textarea" maxlength=1000><?php echo $descripcion_detallada?></textarea>
              <label for="descripcion_detallada">Descripcion detallada</label>
            </div>
          </div><!--Termina Primer columna -->
        </div>
        <div class="row">
          <div class="col s12">
            <div class="input-field">
              <textarea name="condiciones" class="materialize-textarea" maxlength=400><?php echo $condiciones?></textarea>
              <label for="condiciones">Condiciones</label>
            </div>
          </div><!--Termina Primer columna -->
        </div>
        <center>
          <button type="submit" class="btn">Guardar</button>
          <input  type="reset" class="btn red darken-4" onclick="window.location='index.php'" value ="Cancelar"></input>
        </center>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/estados.js"></script>
</body>
</html>
