<?php include '../extend/header.php';
include '../extend/libreria.php';
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
  $sel->bind_param("b", $es_inter);
}
else {
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta FROM paquetes");
}
?>

<br>
<div class="row">
  <div class="col s12">
    <nav class="yellow darken-3" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <!-- <form action="excel.php" method="post" target="_blank" id="exportar">
            <span class="card-title">Paquetes<button class="btn-floating green botonExcel" type="button"
               name="button"><i class="material-icons">grid_on</i></button>
               <a href="mapa_completo.php" class="btn btn-floating red" target="-_blank">
                 <i class="material-icons">map</i></a>
             </span>
            <input type="hidden" name="datos" id ="datos">

        </form> -->
          <span class="card-title">Paquetes  <a href="alta_paquete.php" class="btn btn-floating green">
            <i class="material-icons btnadd">add</i></a></span>
        <table class="excel" border="1">
          <thead>
            <tr class="cabecera">
              <th class="borrar">Vista</th>
              <th>Oferta</th>
              <th>Título</th>
              <th>Subtítulo</th>
              <th>Precio</th>
              <th>Dias</th>
              <th>País</th>
              <th>Tipo <br>destino</th>
              <th>Destino</th>
              <th colspan="5">Opciones</th>
            </tr>
          </thead>
          <?php
          $sel->execute();
          $res = $sel->get_result();
          while ($f =$res->fetch_assoc()) {?>
            <tr>
              <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)"
                value="<?php echo $f['id_paquete']?>" class="btn modal-trigger btn-floating"><i class="material-icons">
              visibility</i><?php echo $f['oferta']?></button></td>
              <td>
                <?php if ($f['oferta']== ''): ?>
                  <a href="oferta.php?id=<?php echo $f['id_paquete']?>&oferta=1"><i class="small grey-text material-icons">grade</i></a>
                <?php else: ?>
                  <a href="oferta.php?id=<?php echo $f['id_paquete']?>&ofreta=0"><i class="small green-text material-icons">grade</i></a>
                <?php endif; ?>
              </td>
              <td><?php echo $f['titulo'] ?></td>
              <td><?php echo $f['subtitulo'] ?></td>
              <td><?php echo "$".number_format($f['precio'],2); ?></td>
              <td><?php echo $f['dias'] ?></td>
              <td><?php echo $f['pais'] ?></td>
              <td><?php echo tipo_destino($f['internacional']) ?></td>
              <td><?php echo destino($f['tipo_destino']) ?></td>
              <td class="borrar"><a href="imagenes.php?id=<?php echo $f['id_paquete']?>" class="btn-floating pink"><i
                class="material-icons">image</i></a></td>
              <td class="borrar"><a href="alta_paquete.php?id=<?php echo $f['id_paquete']?>" class="btn-floating blue"><i
                class="material-icons">edit</i></a></td>
              <td class="borrar"><a href="#" class="btn-floating red" onclick="swal({title: '¿Esta seguro que desea eliminar el paquete?',
                type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarlo!'
              }).then((result) => { if (result.value){location.href='eliminar_paquete.php?id=<?php echo $f['id_paquete']?>';}})"><i class="material-icons">delete</i></a></td>

            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Informacion</h4>
    <div class="res_modal">

    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CERRAR</a>
  </div>
</div>
<?php include '../extend/scripts.php'; ?>
<script>
  $('.modal').modal();
  function enviar(valor) {
      $.get('modal.php', {
        id:valor,
        beforeSend: function () {
          $('.res_modal').html('Espere un momento por favor');
         }
       }, function (respuesta) {
            $('.res_modal').html(respuesta);
      });
    }

</script>
<script>
  $('.botonExcel').click(function () {
  $('.borrar').remove();
  $('#datos').val( $("<div>").append($('.excel').eq(0).clone()).html());
  $('#exportar').submit();
  setInterval(function(){location.reload();},3000);
});

</script>

</body>
</html>
