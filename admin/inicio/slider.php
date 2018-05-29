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
                  <div class="col s6">
                    <?php
                    $sel = $con->prepare("SELECT id_paquete, titulo FROM paquetes WHERE mostrar = 1 ");
                    $sel->execute();
                    $sel->bind_result($id_paq, $titulo);
                    ?>
                    <select id="id_paquete" name="id_paquete" value = "1">
                      <option value="0" selected disabled>SELECCIONE UN PAQUETE</option>
                        <?php while ($sel->fetch()) {?>
                        <option value="<?php echo $id_paq ?>"><?php echo $titulo ?></option>
                      <?php }
                      $sel ->close();    ?>
                    </select>
                  </div>
                  <div class="">
                    <button type="submit" class="btn">Guardar</button>
                  </div>
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
          $sel_img = $con->prepare("SELECT id, ruta FROM slider ");
          $sel_img -> execute();
          $sel_img -> bind_result($id, $ruta);
          while ($sel_img->fetch()) { ?>

            <a href="#" onclick="swal({title: '¿Esta seguro que desea eliminar la imagen?',text: 'Al eliminarla no podrá recuperarla!',
              type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarla!'
            }).then((result) => { location.href='eliminar_slider.php?id=<?php echo $id?>&ruta=<?php echo $ruta?>';})">
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
