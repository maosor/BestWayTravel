<?php
include 'admin/conexion/conexion_web.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->prepare("SELECT  condiciones FROM paquetes WHERE id_paquete= ? ");
$sel->bind_param('s', $id);
$sel->execute();
$sel->bind_result($condiciones);
$sel->fetch();
 ?>

 <!DOCTYPE html>
 <html lang="en"> <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/materialize.min.css">
   <title>modal</title>
 </head>
 <body>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h5 align="center"><b>Condiciones</b></h5>
          <div class="row">
            <div class = "input-field">
              <div class="col s12">
                <?php foreach (explode("\r\n",$condiciones) as $key => $value): ?>
                 <li>
                   <?php echo $value?>
                 </li>
               <?php endforeach; ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

 </body>
</html>
