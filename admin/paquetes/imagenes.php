<?php include '../extend/header.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT foto_principal FROM paquetes WHERE id_paquete = ?");
$sel -> bind_param('s', $id);
$sel -> execute();
$sel -> bind_result($foto);
$sel->fetch();
$sel->close();
?>
  <div class="row">
    <div class="col s6">
        <h5 class="header">Actualizar foto principal</h5>
        <div class="card horizontal">
          <div class="card-image">
            <img src="<?php echo $foto ?>" width="200" height="200">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <form action="up_principal.php" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="anterior" value="<?php echo $foto ?>">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto:</span>
                    <input type="file" name="foto">
                   </div>
                  <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                  </div>
                </div>
                <button type="submit" class="btn">Actualizar</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    <div class="col s6">
      <h5 class="header">Cargar imagenes</h5>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <form action="ins_imagenes.php" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto:</span>
                    <input type="file" name="ruta[]" multiple>
                   </div>
                  <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                  </div>
                </div>
                <button type="submit" class="btn">Guardar</button>

              </form>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
          <center>  <input  type="reset" class="btn green" onclick="window.location='index.php'" value ="Regresar"></input> </center>
    </div>
  <div class="row">
    <div class="col s12 center cargador">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php
          $sel_img = $con->prepare("SELECT id, ruta FROM imagenes WHERE id_paquete = ?");
          $sel_img -> bind_param('s', $id);
          $sel_img -> execute();
          $sel_img -> bind_result($id_img,$ruta);
          while ($sel_img ->fetch()) { ?>

            <a href="#" onclick="swal({title: '¿Esta seguro que desea eliminar la imagen?',text: 'Al eliminarla no podrá recuperarla!',
              type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarla!'
            }).then((result) => { location.href='eliminar_img.php?id=<?php echo $id_img?>&ruta=<?php echo $ruta?>&id_paquete=<?php echo $id?>';})">
            <img src= "<?php echo $ruta?>"alt=""></a>
          <?php }
          $sel_img-> close();
           ?>
        </div>
      </div>
    </div>
  </div>
 <?php include '../extend/scripts.php' ?>
 <script>
 $('.cargador').hide();
 $('.form').submit(function(event){
   $('.cargador').show();
 });

 </script>
</body>
</html>
