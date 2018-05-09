<?php include '../extend/header.php';

?>
  <div class="row">
    <div class="col s12">
      <h4 class="header">Cargar información banners</h4>
      <div class="row">
        <form action="ins_slider.php" class="form" method="post" enctype="multipart/form-data">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                  <div class="input-field col s6">
                    <input name="titulo" type="text" maxlength=20 class="validate">
                    <label for="titulo">Título</label>
                  </div>
                  <div class="file-field input-field col s6">
                    <div class="btn">
                      <span>Imágen:</span>
                      <input type="file" name="ruta[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                      <input type="text" class="file-path validate">
                    </div>
                  </div>
                  <div class="input-field col s12">
                    <textarea name="descripcion" class="materialize-textarea" maxlength=270></textarea>
                    <label for="descripcion">Descripción</label>
                  </div>
                  <button type="submit" class="btn">Guardar</button>
              </div>
            </div>
          </div>
          </div>
        </form>
      </div>
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
          $sel_img = $con->prepare("SELECT * FROM slider ");
          $sel_img -> execute();
          $res_img = $sel_img -> get_result();
          while ($f_img = $res_img->fetch_assoc()) { ?>

            <a href="#" onclick="swal({title: '¿Esta seguro que desea eliminar la imagen?',text: 'Al eliminarla no podrá recuperarla!',
              type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarla!'
            }).then((result) => { location.href='eliminar_slider.php?id=<?php echo $f_img['id']?>&ruta=<?php echo $f_img['ruta']?>';})">
            <img src= "<?php echo $f_img['ruta']?>"alt=""></a>
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
