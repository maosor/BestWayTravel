<footer class="blue-grey page-footer">
  <div class="container">
    <div class="row footer">
      <div class="col l4 m4 s12">
        <div class="col s1">
          <i class="material-icons">call</i>
        </div>
        <div class="col s11">
          <b class="white-text">Teléfonos: </b>
          <br>(506) 2101-0042
        </div>
        <div class="col s1">
          <img src="admin/img/whatsapp.png" alt="">
        </div>
        <div class="col s11">
          <b class="white-text">WhatsApp: </b>
          <br>(506) 7200-2542
        </div>
      </div>
      <div class="col l4 m4 s12">
        <div class="col s1">
          <i class="material-icons">email</i>
        </div>
        <div class="col s11">
          <b class="white-text">Correo Electrónico: </b>
          <br>info@bestwaytravelcr.com
        </div>
        <div class="col s1">
          <img src="admin/img/facebook.png" alt="">
        </div>
        <div class="col s11">
          <b class="white-text">Siguenos en Facebook: </b>
          <br>@infoviajescr
        </div>
      </div>
      <div class="col l4 m4 s12">
        <div class="col s1">
          <i class="material-icons">schedule</i>
        </div>
        <div class="col s11">
          <b class="white-text">Horarios: </b>
          <br>Lunes a Viernes de 9:00am – 5:30pm
          <br>Sábados de 9:00am – 12:00md
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2018 Copyright BestWay Travel
      <img class="img right"src="admin/img/logo-png-grey.png" height=60px alt="">
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
  $(".button-collapse").sideNav();
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
  $('.datepicker').pickadate({
    format:'yyyy-m-d',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
  $('#enviar_cot').click(function() {
    $.post('email.php',{
      paquete:$('#paquete').val(),
      fecha_salida:$('#fecha_salida').val(),
      fecha_regreso:$('#fecha_regreso').val(),
      pasajeros_adultos:$('#pasajeros_adultos').val(),
      pasajeros_ninos:$('#pasajeros_ninos').val(),
      pais:$('#pais option:selected').text(),
      nombre:$('#nombre').val(),
      correo:$('#correo').val(),
      telefono:$('#telefono').val(),
      celular:$('#celular').val(),
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
