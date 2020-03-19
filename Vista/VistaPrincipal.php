<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body background="img/img_0.jpg">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Mundo Animal Pet Care</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
</div>
<div class="col-md-6">
                <div align="right">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-primary-900 fa-3x" style="font-size:37px"></i><span class="mr-2 d-none d-lg-inline text-gray-700" style="font-size:20px"> Bienvenido:
    <?php
    if(isset($_SESSION["nombreUsuario"]))
    {
      echo $_SESSION["nombreUsuario"];
    }
  ?>
    </span> 
    <!--<img class="img-profile rounded-circle" src="../img/logo.png/60x60">-->
  </a>
  
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <!--<a class="dropdown-item" href="#">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      Profile
    </a>-->
    <a class="dropdown-item" style="font-size:14px" href="?config">
                <i class="fa fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Configuración
                </a>
    <!--<a class="dropdown-item" href="#">
      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
      Activity Log
    </a>-->
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" style="font-size:14px" href="Vista/CerrarSesion.php">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Cerrar sesión
    </a>
  </div>
</div><!--Cierro container-->
</div><!--Cierro row-->
</div><!--Cierro col-->

                </div>
            </div>
        </nav>
        <br><br><br><br><br><br><br><br><br><br>
        <div class="container">
        <div class="row">
        <div class="card" style="width: 18rem;">
  <img src="img/logo.png" class="card-img-top" alt="...">
  <div class="card-body" align="center">
    <a href="?listarcliente" style="color:blue">Clientes</a>
    <p>Para gestionar el modulo de clientes de clic en el enlace azul.
  </div>
</div>
&nbsp&nbsp
<div class="card" style="width: 18rem;">
  <img src="img/logo.png" class="card-img-top" alt="...">
  <div class="card-body" align="center">
    <a href="?listarmascota" style="color:blue">Mascotas</a>
    <p>Para gestionar el modulo de mascotas de clic en el enlace azul.
  </div>
</div>
&nbsp&nbsp
<div class="card" style="width: 18rem;">
  <img src="img/logo.png" class="card-img-top" alt="...">
  <div class="card-body" align="center">
    <a href="?listarempleado" style="color:blue">Empleados</a>
    <p>Para gestionar el modulo de empleado de clic en el enlace azul.
  </div>
</div>
</div>
</div>  
    </body>
    
</html>
