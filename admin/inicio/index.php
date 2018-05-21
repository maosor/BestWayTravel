  <?php include '../extend/header.php';
$sel = $con->prepare("SELECT * FROM paquetes WHERE internacional = ?");
$sel -> bind_param('s', $operacion);
  ?>
     <div class="row">
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Internacionales</b></span>
             <h2 align="center" class="white-text">
                <?php
                $operacion = 0;
                $sel -> execute();
                $res_venta = $sel -> get_result();
                echo mysqli_num_rows($res_venta);
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?inter=1">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Nacionales</b></span>
             <h2 align="center" class="white-text">
                <?php
                $operacion = 1;
                $sel -> execute();
                $res_renta = $sel -> get_result();
                echo mysqli_num_rows($res_renta);
                $sel ->close();
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?inter=1">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Playa</b></span>
             <h2 align="center" class="white-text">
                <?php

                $tipo = 1;
                $sel = $con->prepare("SELECT * FROM paquetes WHERE tipo_destino = ?");
                $sel -> bind_param('s', $tipo);
                $sel -> execute();
                $res_tipo = $sel -> get_result();
                echo mysqli_num_rows($res_tipo);
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?tip_des=1">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Montaña</b></span>
             <h2 align="center" class="white-text">
                <?php
                $tipo = 2;
                $sel -> execute();
                $res_tipo = $sel -> get_result();
                echo mysqli_num_rows($res_tipo);
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?tip_des=2">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Cuidad</b></span>
             <h2 align="center" class="white-text">
                <?php
                $tipo = 3;
                $sel -> execute();
                $res_tipo = $sel -> get_result();
                echo mysqli_num_rows($res_tipo);
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?tip_des=3">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="col s12 m6 l6">
         <div class="card blue-grey darken-1">
           <div class="card-content">
             <span class="card-title white-text"><b>Tour un día</b></span>
             <h2 align="center" class="white-text">
                <?php
                $tipo = 4;
                $sel -> execute();
                $res_tipo = $sel -> get_result();
                echo mysqli_num_rows($res_tipo);
                 ?>
             </h2>
           </div>
            <div class="card-action">
              <a href="../paquetes/index.php?tip_des=4">ver mas..</a>
            </div>
         </div>
       </div>
       <div class="row">
         <div class="col s12">
           <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <h4 align="center"><b>comentarios</b> </h4>
            </div>
            <div class="card-tabs">
              <ul class="tabs tabs-fixed-width tabs-transparent">
                <li class="tab"><a class="active" href="#nuevos">Nuevos</a></li>
                <li class="tab"><a href="#resueltos">Resueltos</a></li>
              </ul>
            </div>
            <div class="card-content white">
              <div id="nuevos">
                <table>
                   <th>Vista</th>
                   <th>Solicitante</th>
                   <th>Telefono</th>
                   <th>Correo</th>
                   <th>Mensaje</th>
                   <?php
                   $sel_com = $con->prepare("SELECT * FROM comentario WHERE estatus = ? ");
                   $sel_com->bind_param('s', $estatus);
                   $estatus = 'NUEVO';
                   $sel_com->execute();
                   $res_nuevo = $sel_com->get_result();
                   while ($fn =$res_nuevo->fetch_assoc()) { ?>
                   <tr>
                     <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)"
                       value="<?php echo $fn['id_propiedad']?>" class="btn modal-trigger btn-floating"><i class="material-icons">
                     visibility</i><?php echo $fn['marcado']?></button></td>
                     <td>
                     <td><?php echo $fn['nombre'] ?></td>
                     <td><?php echo $fn['tel'] ?></td>
                     <td><a href="correo.php?correo=<?php echo $fn['correo']?>&nombre=<?php echo $fn['nombre']?>&id_mensaje=<?php echo $fn['id'] ?>">
                       <?php echo $fn['correo']?></a> </td>
                     <td><?php echo $fn['mensaje'] ?></td>
                   </tr>
                   <?php } ?>
                 </table>
              </div>
              <div id="resueltos">
                <table>
                   <th>Vista</th>
                   <th>Solicitante</th>
                   <th>Telefono</th>
                   <th>Correo</th>
                   <th>Mensaje</th>
                   <?php
                   $estatus = 'RESUELTO';
                   $sel_com->execute();
                   $res_resuelto = $sel_com->get_result();
                   while ($fr =$res_resuelto->fetch_assoc()) { ?>
                   <tr>
                     <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)"
                       value="<?php echo $fr['id_propiedad']?>" class="btn modal-trigger btn-floating"><i class="material-icons">
                     visibility</i><?php echo $fr['marcado']?></button></td>
                     <td>
                     <td><?php echo $fr['nombre'] ?></td>
                     <td><?php echo $fr['tel'] ?></td>
                     <td><?php echo $fn['correo'] ?></td>
                     <td><?php echo $fr['mensaje'] ?></td>
                   </tr>
                   <?php } ?>
                 </table>
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
     <?php include '../extend/scripts.php'; ?>
     <script>
       $('.modal').modal();
       function enviar(valor) {
           $.get('../propiedades/modal.php', {
             id:valor,
             beforeSend: function () {
               $('.res_modal').html('Espere un momento por favor');
              }
            }, function (respuesta) {
                 $('.res_modal').html(respuesta);
           });
         }

     </script>
  </body>
</html>
