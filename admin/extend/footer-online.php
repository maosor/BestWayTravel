<footer class="blue-grey page-footer">
  <div class="container">
    <div class="row">
      <div class="col l4 s2">
        <h5 class="white-text"><a class="btn-floating blue-grey lighten-1" ><i class="material-icons">call</i></a> Teléfonos: </h5>
        <p class="grey-text text-lighten-4">Llámenos al (506) 2101-0042</p>
        <h5 class="white-text"><a class="btn-floating blue-grey lighten-1" ><img src="admin/img/whatsapp.png" style="padding: 9px;" alt=""></a>  Asistencia WhatsApp: </h5>
        <p class="grey-text text-lighten-4">(506) 7200-2542</p>
      </div>
      <div class="col l4 s2">
        <h5 class="white-text"><a class="btn-floating blue-grey lighten-1" ><i class="material-icons">email</i></a> Correo Electrónico: </h5>
        <p class="grey-text text-lighten-4">info@bestwaytravelcr.com</p>
        <h5 class="white-text"><a class="btn-floating blue-grey lighten-1" ><img src="admin/img/facebook.png" style="padding: 9px;" alt=""> </a> Siguenos en Facebook: </h5>
        <p class="grey-text text-lighten-4">/bestwaytravelcr</p>
      </div>
      <div class="col l4 s2">
        <h5 class="white-text"><a class="btn-floating blue-grey lighten-1" ><i class="material-icons">schedule</i></a> Horarios: </h5>
        <p class="grey-text text-lighten-4">Lunes a Viernes de 8:00am – 6:00pm</p>
        <p class="grey-text text-lighten-4">Sábados de 8:00am – 12:00md</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2018 Copyright BestWay Travel <img class="img right"src="admin/img/logo-png-grey.png" height=40px alt="">
    </div>
  </div>
</footer>
<script
    src="admin/js/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="admin/js/materialize.min.js"></script>
<script>
  $('.slider').slider({height:600});
  $('select').material_select();
  $('#estado').change(function() {
    $.post('admin/propiedades/ajax_muni.php',{
      estado:$('#estado').val(),
      beforeSend: function () {
        $('.res_estado').html('Espere un momento por favor');
       }
     }, function (respuesta) {
          $('.res_estado').html(respuesta);
    });
  });
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
</body>
</html>
