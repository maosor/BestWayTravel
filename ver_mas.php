<?php include 'admin/extend/header-online.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT * FROM paquetes WHERE id_paquete = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {

}
?>
<div class="container">
  <div class="row">
    <div class="col s12">
      <h5 class="header"><?php echo $f['titulo'] ?></h5>
      <h6 class="header"><?php echo $f['subtitulo'] ?></h6>
      <div class="card horizontal">
        <div class="card-image">
          <img src="admin/paquetes/<?php echo $f['foto_principal'] ?>">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p><?php echo $f['descripcion']?></p>
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
           <?php $sel_img = $con->prepare("SELECT * FROM imagenes WHERE id_paquete = ? ");
           $sel_img->bind_param('s', $id);
           $sel_img->execute();
           $res_img = $sel_img->get_result();
           while ($f_img =$res_img->fetch_assoc()) {?>
             <div class="col s3">
               <img src="admin/paquetes/<?php echo $f_img['ruta'] ?>" width="200" class="materialboxed" >
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
         <span class="card-title">DESCRIPCION DETALLADA</span>
         <div class="row">
           <div class="col s6">
             <p><?php echo $f['descripcion_detallada']?></p>
           </div>
           <div class="col s6">
               <div class="input-field">
                 <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
                 <label for="nombre">Nombre:</label>
               </div>
               <div class="input-field">
                 <input type="text" name="telefono"   title=""  id="telefono"  >
                 <label for="telefono">Telefono:</label>
               </div>
               <div class="input-field">
                 <input type="email" name="correo"   title=""  id="correo" required  >
                 <label for="correo">Correo:</label>
               </div>
               <div class="input-field">
                 <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
                 <label for="">Mensaje:</label>
                 <input type="hidden" name="id_propiedad" id="id_propiedad" value="<?php echo $id ?>">
               </div>
               <button type="button" class="btn" id = "enviar">Enviar</button>
               <div class="resultado"></div>
           </div>
         </div>
       </div>
     </div>
   </div>
  </div>
</div>
<?php include 'admin/extend/footer-online.php'; ?>
<script>
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
