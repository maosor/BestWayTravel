<?php include '../extend/header.php';
include '../extend/libreria.php';
if (isset($_GET['tip_des'])) {
  $tipo_destino = $con->real_escape_string(htmlentities($_GET['tip_des']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta, mostrar, favorito FROM paquetes WHERE tipo_destino = ? ");
  $sel->bind_param("i", $tipo_destino);
}
else if (isset($_GET['inter'])) {
  $es_inter = $con->real_escape_string(htmlentities($_GET['inter']));
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta, mostrar, favorito FROM paquetes WHERE internacional = ? ");
  $sel->bind_param("b", $es_inter);
}
else {
  $sel = $con->prepare("SELECT id, id_paquete, titulo, subtitulo, descripcion, precio, descripcion_detallada,
    condiciones, dias, continente, pais, foto_principal, tipo_destino, internacional, oferta, mostrar, favorito FROM paquetes");
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
          <tr>
            <td colspan="16">
              <i class="yellow-text material-icons">local_offer</i> Oferta |
              <i class="lime-text accent-4 material-icons">slideshow</i> Mostrar |
              <i class="purple-text darken-4 material-icons">grade</i> Favorito
            </td>

          </tr>
            <tr class="cabecera">
              <th class="borrar">Vista</th>
              <th colspan="3"></th>
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
          $sel->bind_result($id, $id_paquete, $titulo, $subtitulo, $descripcion, $precio, $descripcion_detallada,
            $condiciones, $dias, $continente, $pais, $foto_principal, $tipo_destino, $internacional, $oferta, $mostrar, $favorito);
          while ($sel->fetch()) {?>
            <tr>
              <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)"
                value="<?php echo $id_paquete?>" class="btn modal-trigger btn-floating"><i class="material-icons">
              visibility</i><?php echo $oferta?></button></td>
              <td>
                <?php if ($oferta== 0): ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&oferta=1"><i class="small grey-text material-icons">local_offer</i></a>
                <?php else: ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&oferta=0"><i class="small yellow-text material-icons">local_offer</i></a>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($mostrar== 0): ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&mostrar=1"><i class="small grey-text material-icons">slideshow</i></a>
                <?php else: ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&mostrar=0"><i class="small lime-text accent-4 material-icons">slideshow</i></a>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($favorito== 0): ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&favorito=1"><i class="small grey-text material-icons">grade</i></a>
                <?php else: ?>
                  <a href="marcado.php?id=<?php echo $id_paquete?>&favorito=0"><i class="small purple-text darken-4 material-icons">grade</i></a>
                <?php endif; ?>
              </td>
              <td><?php echo $titulo ?></td>
              <td><?php echo $subtitulo ?></td>
              <td><?php echo "$".number_format($precio,2); ?></td>
              <td><?php echo $dias ?></td>
              <td><?php echo $pais ?></td>
              <td><?php echo tipo_destino($internacional) ?></td>
              <td><?php echo destino($tipo_destino) ?></td>
              <td class="borrar"><a href="imagenes.php?id=<?php echo $id_paquete?>" class="btn-floating pink"><i
                class="material-icons">image</i></a></td>
              <td class="borrar"><a href="alta_paquete.php?id=<?php echo $id_paquete?>" class="btn-floating blue"><i
                class="material-icons">edit</i></a></td>
              <td class="borrar"><a href="#" class="btn-floating red" onclick="swal({title: '¿Esta seguro que desea eliminar el paquete?',
                type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarlo!'
              }).then((result) => { if (result.value){location.href='eliminar_paquete.php?id=<?php echo $id_paquete?>&foto=<?php echo$foto_principal?>';}})"><i class="material-icons">delete</i></a></td>

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
