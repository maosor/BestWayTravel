
  <nav class="black">
    <a href="#" data-activates="menu" class="button-collapse"><i class="material-icons">menu</i></a>
  </nav>
  <ul id="menu" class="side-nav fixed">
    <li>
      <div class="userView">
        <div class="background fixed">
          <img src="../css/images/abstract-q-c-640-480-9.jpg">
        </div>
        <a href="../perfil/index.php"><img src="../usuario/<?php echo $_SESSION['foto'] ?>" class="circle" alt=""></a>
          <a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['nombre'] ?></a>
          <a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['correo'] ?> </a>
      </div>
    </li>
    <li><a href="../inicio"><i class="material-icons">home</i>INICIO</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../usuario"><i class="material-icons">contacts</i>USUARIOS</li></a>
    <li><div class="divider"></div></li>
    <!-- <li><a href="../clientes"><i class="material-icons">contact_phone</i>CLIENTES</li></a>
    <li><div class="divider"></div></li> -->
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">work</i>PAQUETES
      <i class="material-icons right">arrow_drop_down</i></a></li>
    <li><div class="divider"></div></li>
    <li><a href="../inicio/slider.php"><i class="material-icons">web</i>SLIDER</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../login/salir.php"><i class="material-icons">power_setting_new</i>SALIR</li></a>
    <li><div class="divider"></div></li>
  </ul>

  <ul id="dropdown1" class="dropdown-content">
    <li><a href="../paquetes/index.php">GENERAL</a></li>
    <li><a href="../paquetes/index.php?inter=1">INTERNACIONAL</a></li>
    <li><a href="../paquetes/index.php?inter=0">NACIONAL</a></li>
    <li><a href="../paquetes/index.php?tip_des=1">PLAYA</a></li>
    <li><a href="../paquetes/index.php?tip_des=2">MONTAÑA</a></li>
    <li><a href="../paquetes/index.php?tip_des=3">CIUDAD</a></li>
    <li><a href="../paquetes/index.php?tip_des=4">TOUR UN DIA</a></li>
   </ul>
