<?php include 'admin/extend/header-online.php';
include 'admin/conexion/conexion_web.php';
?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Cotizar destino</span>
        <div class="row">
          <div class="col s12">
            <div class="input-field">
              <input type="text" name="paquete" pattern="[A-Za-z/s ]+"  title=""  id="paquete" required >
              <label for="paquete">Paquete o Destino</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s3">
            <div class="input-field">
              <input type="date" class="datepicker" name="fecha_salida" title=""  id="fecha_salida" required >
              <label for="fecha_salida">Fecha Salida</label>
            </div>
          </div>
          <div class="col s3">
            <div class="input-field">
              <input type="date" class="datepicker" name="fecha_regreso" title=""  id="fecha_regreso" required >
              <label for="fecha_regreso">Fecha Regreso</label>
            </div>
          </div>
          <div class="col s3">
            <div class="input-field">
              <input type="number" name="pasajeros_adultos"  title=""  id="pasajeros_adultos" required >
              <label for="pasajeros_adultos">Pasajeros Adultos</label>
            </div>
          </div>
          <div class="col s3">
            <div class="input-field">
              <input type="number" name="pasajeros_ninos" title=""  id="pasajeros_ninos" required >
              <label for="pasajeros_ninos">Pasajeros Niños</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s8">
            <div class="input-field">
              <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
              <label for="nombre">Nombre Completo:</label>
            </div>
          </div>
          <div class="col s4">
            <select id="pais" name="pais" required>
                <option value="" disabled>SELECCIONA UN PAIS</option>
                <?php
                $sel_pais = $con->prepare("SELECT id, nombre FROM paices order by nombre");
                $sel_pais -> execute();
                $sel_pais -> bind_result($idp, $nombre);
                while ($sel_pais->fetch()) {?>
                  <option value="<?php echo $idp?>" ><?php echo $nombre?></option>
                <?php }
                $sel_pais->close();
               ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col s4">
            <div class="input-field">
              <input type="email" name="correo"   title=""  id="correo" required  >
              <label for="correo">Correo:</label>
            </div>
          </div>
          <div class="col s4">
            <div class="input-field">
              <input type="number" name="telefono"   title=""  id="telefono" required  >
              <label for="telefono">Teléfono:</label>
            </div>
          </div>
          <div class="col s4">
            <div class="input-field">
              <input type="number" name="celular"   title=""  id="celular" required  >
              <label for="celular">Teléfono Celular:</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="input-field">
              <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="">Comentarios:</label>
            </div>
            <button type="button" class="btn" id = "enviar_cot">Enviar</button>
            <div class="resultado"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
</script>
<?php include 'admin/extend/footer-online.php'; ?>
