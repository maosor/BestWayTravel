<?php include 'admin/extend/header-online.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT titulo, subtitulo, foto_principal, descripcion, descripcion_detallada, lugares, servicios_adicionales FROM paquetes WHERE id_paquete = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$sel->bind_result($titulo,$subtitulo,$foto_principal,$descripcion,$descripcion_detallada, $lugares,$servicios_adicionales);
if ($sel->fetch()) {
?>
<div class="container">
  <div class="row">
    <div class="col s12">
      <h5 class="header"><?php echo $titulo ?></h5>
      <h6 class="header"><?php echo $subtitulo ?></h6>
      <div class="card horizontal">
        <div class="card-image">
          <img src="admin/paquetes/<?php echo $foto_principal?>">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p><?php echo $descripcion?></p>
            <div class="row">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
   <div class="col s12">
     <div class="card">
       <div class="card-content">
         <div class="row">
           <?php $sel->close();
           $sel_img = $con->prepare("SELECT ruta FROM imagenes WHERE id_paquete = ? ");
           $sel_img->bind_param('s', $id);
           $sel_img->execute();
           $sel_img->bind_result($ruta);
           while ($sel_img->fetch()) {?>
             <div class="col s3">
               <img src="admin/paquetes/<?php echo $ruta ?>" width="200" class="materialboxed" >
             </div>
            <?php }
            ?>
          </div>
       </div>
     </div>
   </div>
  </div>
  <div class="row">
   <div class="col s12">
     <div class="card">
       <div class="card-content">
         <div class="row">
           <div class="col s6">
             <span class="card-title">PRECIO INCLUYE</span>
             <?php
              foreach (explode("\r\n",$descripcion_detallada) as $key => $value): ?>
               <li>
                 <?php echo $value?>
               </li>
             <?php endforeach; ?>

           </div>
           <div class="col s6">
             <div class="">
               <span class="card-title">TOURS OPCIONALES</span>
               <?php
                foreach (explode("\r\n",$lugares) as $key => $value): ?>
                 <li>
                   <?php echo $value?>
                 </li>
               <?php endforeach; ?>
             </div>
             <div class="">
               <span class="card-title">SERVICIOS ADICIONALES</span>
               <?php
                foreach (explode("\r\n",$servicios_adicionales) as $key => $value): ?>
                 <li>
                   <?php echo $value?>
                 </li>
               <?php endforeach; ?>
             </div>

           </div>
         </div>
         <div class="">
           <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)"
             value="<?php echo $id ?>" class="btn modal-trigger tooltipped"
             data-position="top" data-tooltip="Ver condiciones del paquete: <?php echo $titulo?>">Condiciones</button></td>

         </div>
       </div>
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
<?php }
include 'admin/extend/footer-online.php'; ?>
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
  $('.materialboxed').materialbox();
  $('#enviar').click(function() {
    $.post('ins_comentario.php',{
      nombre:$('#nombre').val(),
      telefono:$('#telefono').val(),
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
