<?php include 'admin/extend/header-online.php'; ?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Contacto</span>
        <div class="row">
          <div id = "map" class="col s6">
            <iframe src="admin/extend/mapa.php" width="100%" height="500"
              frameborder="0" class="z-depth-4"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15717.19657734039!2d-84.2542193!3d9.99212985!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scr!4v1519962002279"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen class="z-depth-4"></iframe> -->
          </div>
          <div class="col s6">
            <div class="input-field">
              <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
              <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field">
              <input type="text" name="asunto"   title=""  id="asunto"  >
              <label for="asunto">Asunto:</label>
            </div>
            <div class="input-field">
              <input type="email" name="correo"   title=""  id="correo" required  >
              <label for="correo">Correo:</label>
            </div>
            <div class="input-field">
              <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="">Mensaje:</label>
            </div>
            <button type="button" class="btn" id = "enviar">Enviar</button>
            <div class="resultado"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('#enviar').click(function() {
  $.post('email.php',{
    nombre:$('#nombre').val(),
    asunto:$('#asunto').val(),
    correo:$('#correo').val(),
    mensaje:$('#mensaje').val(),
    id_propiedad:$('#id_propiedad').val(),

    beforeSend: function () {
      $('.resultado').html('Espere un momento por favor');
     }
   }, function (respuesta) {
        $('.resultado').html(respuesta);
  });
});

</script>
<?php include 'admin/extend/footer-online.php'; ?>
