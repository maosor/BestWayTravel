<?php include 'admin/conexion/conexion_web.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="admin/css/materialize.min.css" />
    <link href="admin/css/icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href="admin/css/styles.css" rel="stylesheet">
    <title>Sitio Web</title>
  </head>
  <body class="grey lighten-5">
    <nav class="orange darken-3"style="height: 40px !important;line-height: 40px;">
      <span class="hide-on-small-only">Llámenos al (506) 2101-0042 | WhatsApp (506) 7200-2542</span>
      <span class="hide-on-med-and-up">T: (506) 2101-0042 | C: (506) 7200-2542</span>
      <a href="https://www.facebook.com/BestWayTravelcr" class="right"><img class="orange darken-4 bordeimg circle z-depth-1" src="admin/img/facebook.png" style="padding: 4px;margin: 3px;"> </a>
      <a href="https://api.whatsapp.com/send?phone=50672002542" class="right"><img class="orange darken-4 bordeimg circle z-depth-1" src="admin/img/whatsapp.png" style="padding: 4px;margin: 3px;"> </a>
    </nav>
      <nav class="menu white" >
      <div class="nav-wrapper">
      <a href="index.php" class="blue-grey-text brand-logo lelf"><img class="grey lighten-5"src="admin/img/logo-png.png" /></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="index.php" class="blue-grey-text text-darken-2 center">Nosotros</a></li>
          <li><a href="paquetes.php?inter=1" class="blue-grey-text text-darken-2 center">Internacionales</a></li>
          <li><a href="paquetes.php?inter=0" class="blue-grey-text text-darken-2 center">Nacionales</a></li>
          <li><a href="paquetes.php?oferta=1" class="blue-grey-text text-darken-2 center">Ofertas</a></li>
          <li><a href="contacto.php" class="blue-grey-text text-darken-2 center">Contactenos</a></li>
          <li><a href="index.php" class="orange-text text-darken-4 center enf">Cotizar</a></li>
          <li> <form>
        <div class="input-field">
          <i class="menu material-icons prefix blue-grey-text text-darken-2">search</i>
          <input name="search" class="border" type="search" style="padding-left: 2px" required>
          <label class="menu label-icon " for="search"></label>
          <i class="menu material-icons">close</i>
        </div>
      </form>
        </li>
      </ul>
      </div>
    </nav>
