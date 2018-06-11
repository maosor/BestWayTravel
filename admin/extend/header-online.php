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
    <title>BestWay Travel</title>
  </head>
  <body class="grey lighten-5">
    <nav id = "top-bar"class="orange darken-3"style="height: 40px !important;line-height: 40px;">
      <div class="nav-wrapper">
        <ul class="nav-bar">
           <li><span class="hide-on-small-only">Llámenos al (506) 2101-0042 | WhatsApp (506) 7200-2542</span>
           <li><span class="hide-on-med-and-up">T: (506) 2101-0042 | C: (506) 7200-2542</span>
           <li class="right"><a href="https://www.facebook.com/BestWayTravelcr" class="img_top_menu"><img class="orange darken-4 bordeimg circle z-depth-1" src="admin/img/facebook.png" style="padding: 4px;margin: 3px;"> </a>
           <li class="right" style="width: 40px;"><a href="https://api.whatsapp.com/send?phone=50672002542" class="img_top_menu"><img class="orange darken-4 bordeimg circle z-depth-1" src="admin/img/whatsapp.png" style="padding: 4px;margin: 3px;"> </a>
          <li class="right">
            <div class="hide-on-med-and-down" style="position:static;">
              <form class="buscar" role="search" method="post" action="paquetes.php">
                <div class="field" id="searchform">
                  <input id="criterio" value="" name="criterio" placeholder="Escribe ..." type="text">
                  <button type="submit" id="search">BUSCAR</button>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
      <nav class="menu white" >
      <a href="#" data-activates="mobile-demo" class="button-collapse orange-text text-darken-4"><i class="material-icons">menu</i></a>
      <div class="nav-wrapper">
      <a href="index.php" class="blue-grey-text brand-logo lelf"><img src="admin/img/logo-png.png" /></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="index.php" class="blue-grey-text text-darken-2 center">Nosotros</a></li>
          <li><a href="paquetes.php?inter=1" class="blue-grey-text text-darken-2 center">Internacionales</a></li>
          <li><a href="paquetes.php?inter=0" class="blue-grey-text text-darken-2 center">Nacionales</a></li>
          <li><a href="paquetes.php?oferta=1" class="blue-grey-text text-darken-2 center">Ofertas</a></li>
          <li><a href="contacto.php" class="blue-grey-text text-darken-2 center">Contactenos</a></li>
          <li><a href="cotizar.php" class="orange-text text-darken-4 center enf">Cotizar</a></li>
      </ul>

      <ul class="side-nav" id="mobile-demo">
        <li class="center orange darken-4">
          <div class="show-on-med-and-down">
            <form class="buscar" role="search" method="post" action="paquetes.php">
              <div class="field" id="searchform">
                <input id="criterio" value="" name="criterio" placeholder="Escribe ..." type="text">
                <button type="submit" id="search">BUSCAR</button>
              </div>
            </form>
          </div>
        </li>
        <li><div class="divider"></div></li>
        <li><a href="index.php" class="blue-grey-text text-darken-2 center">Nosotros</a></li>
        <li><div class="divider"></div></li>
        <li><a href="paquetes.php?inter=1" class="blue-grey-text text-darken-2 center">Internacionales</a></li>
        <li><div class="divider"></div></li>
        <li><a href="paquetes.php?inter=0" class="blue-grey-text text-darken-2 center">Nacionales</a></li>
        <li><div class="divider"></div></li>
        <li><a href="paquetes.php?oferta=1" class="blue-grey-text text-darken-2 center">Ofertas</a></li>
        <li><div class="divider"></div></li>
        <li><a href="contacto.php" class="blue-grey-text text-darken-2 center">Contactenos</a></li>
        <li><div class="divider"></div></li>
        <li><a href="cotizar.php" class="orange-text text-darken-4 center enf">Cotizar</a></li>
        <li><div class="divider"></div></li>
      </ul>
      </div>
    </nav>
