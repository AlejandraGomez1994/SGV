
<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mundo Animal Pet Care</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <link href="css/css/styles-historiaclinica.css" rel='stylesheet' type='text/css' />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <br>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?Controlador=Controlador&listarmascota=ListarMascotas">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dog"></i>
        </div>
        <div class="sidebar-brand-text mx-0">Mundo Animal <sup>Pet Care</sup></div>
        
      </a>
      <br>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="?Controlador=Controlador&registrarcliente=RCliente">
          <i class="fas fa-fw fa-user"></i>
          <span>Registrar Cliente</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      
      <li class="nav-item">
      <a class="nav-link" href="?Controlador=Controlador&listarcliente=ListarCliente">
      <i class="fas fa-fw fa-list"></i>
      <span>Listar Clientes</span></a>
     </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
      <a class="nav-link" href="?Controlador=Controlador&listarmascota=ListarMascota">
      <i class="fas fa-fw fa-list"></i>
      <span>Listar Mascotas</span></a>
     </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!--<div class="sidebar-heading">
        Interface
      </div>-->

      <!-- Nav Item - Pages Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Agenda</span>
        </a>
        <hr class="sidebar-divider">
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Agendar cita</a>
            <a class="collapse-item" href="#">Cancelar cita</a>
            <!--<a class="collapse-item" href="#">Asignar veterinario</a>-->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      Divider
      <hr class="sidebar-divider">

      Heading
      <div class="sidebar-heading">
        Addons
      </div>

      Nav Item - Pages Collapse Menu
     <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      Nav Item - Charts 
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>-->

      <!-- Nav Item - Tables -->
 

      <!-- Divider -->
    

      <!-- Divider -->
    
      <!-- Divider 
      <hr class="sidebar-divider d-none d-md-block">-->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
         <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action6="index.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" name="inputBuscar" placeholder="Ingresar identificación" aria-label="" aria-describedby="">
              <div class="input-group-append">
                <button class="btn btn-primary" type="botton" name="btnBuscar">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-->
        <a href="?Controlador=Controlador&listarmascota=ListarMascota">Listar Mascota</a>&nbsp >> &nbsp
        <a >Formulario 3 registro Valoración mascotas</a>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="?Controlador=Controlador&action6=Buscar&id_cliente=inputBuscar" id="btnBuscar" name="btnBuscar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Identificación" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" name="btnBuscar">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
             <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                 Counter - Alerts 
                <span class="badge badge-danger badge-counter">3+</span>
              </a>-->
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
             <!-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                 Counter - Messages
                <span class="badge badge-danger badge-counter">7</span>
              </a>-->
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i><span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color:'blue'">
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
                <a class="dropdown-item" href="?Controlador=ControladorLogin&action2=Modificar">
                  <i class="fas fa-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                  Editar Cuenta
              </a>
                <!--<a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Vista/cerrarsesion.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
              </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Inicia formulario -->
<!--<h5 style="color:black">Formulario Registro Mascotas</h5>-->
 

      
    <div class="bg-agile">

	<div class="book-appointment">
	<h3>FORMULARIO VALORACIÓN MASCOTAS</h3>
  <form action="?registrardiagnostico&id_cliente=<?php echo $_GET['id_cliente'] ?>&nom_mascota=<?php echo $_GET['nom_mascota'] ?>&id_consulta=<?php echo $_GET['id_consulta'] ?>" method="POST">
      <div id="resultados_ajax" class="gaps"></div>
      <div class="gaps">
    
   
      <div class="gaps">
            <p>Nombre de la mascota:</p>
                <input type="text" name="inputNomMascota" placeholder="" required="" value="<?php echo $listaMascota->getNomMascota();?>" readonly/>
        </div>
        <br>
			<h3>CONSTANTES FISIOLÓGICAS</h3>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputCity">Temperatura
					<input type="text" class="form-control" name="inputTemperatura" required=""></label>
				</div>
				<div class="form-group col-md-3">
					<label for="inputCity">Pulso</label>
					<input type="text" class="form-control" name="inputPulso" required="">
				</div>
				<div class="form-group col-md-3">
					<label for="inputCity">Deshidratación</label>
					<input type="text" class="form-control" name="inputDeshidratacion" required="">
				</div>
				<div class="form-group col-md-3">
					<label for="inputZip">TLLC</label>
					<input type="text" class="form-control" name="inputTllc" required="">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
				  <label for="inputCity">FC</label>
				  <input type="text" class="form-control" name="inputFc" required="">
				</div>
				<div class="form-group col-md-3">
					<label for="inputCity">FR</label>
					<input type="text" class="form-control" name="inputFr" required="">
				</div>
				<div class="form-group col-md-3">
					<label>CC</label>
					<input type="text" class="form-control" name="inputCc" required="">
				</div>
				<div class="form-group col-md-3">
				  <label>OTRO</label>
				  <input type="text" class="form-control" name="inputOtro" required="">
				</div>
			</div>
			<br>
			<h3>EVALUACIÓN POR SISTEMAS</h3>
			
      <h4 align="center">AN:[Aparente/Normal] 	&nbsp NE:[No Evaluado] 	&nbsp  A:[Anormal]</h4>
      <br>
			<div>
			
     
			<div class="row">
				<div class="form-group col-md-3">
					<p>Actitud </p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputActitud" value="AN" required="">
					&nbsp 
					NE <input type="radio" name="inputActitud" value="NE">
					&nbsp
					A <input type="radio" name="inputActitud" value="A">
				</div>
				<div class="form-group col-md-3"> 
					<p>S. Esqueletico </p>
				</div>
				<div class="form-group col-md-3"> 	
					AN <input type="radio" name="inputEsqueletico" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputEsqueletico" value="NE">
					&nbsp
					A <input type="radio" name="inputEsqueletico" value="A">
				</div>
				<div class="form-group col-md-3">
					<p>Hidratación </p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputHidratacion" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputHidratacion" value="NE">
					&nbsp
					A <input type="radio" name="inputHidratacion" value="A">
				</div>
				<div class="form-group col-md-3">
					<p>S. Nervioso</p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputNervioso" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputNervioso" value="NE">
					&nbsp
					A <input type="radio" name="inputNervioso" value="A"> 
				</div>
				<div class="form-group col-md-3">
					<p>Nutrición </p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputNutricion" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputNutricion" value="NE">
					&nbsp
					A <input type="radio" name="inputNutricion" value="A"> 
				</div>
				<div class="form-group col-md-3">
					<p>S. Digestivo</p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputDigestivo" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputDigestivo" value="NE">
					&nbsp
					A <input type="radio" name="inputDigestivo" value="A"> 
				</div>
				<div class="form-group col-md-3">
					<p>Ganglios</p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputGanglios" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputGanglios" value="NE">
					&nbsp
					A <input type="radio" name="inputGanglios" value="A"> 
				</div>
				<div class="form-group col-md-3">
					<p>Sentidos </p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputSentidos" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputSentidos" value="NE">
					&nbsp
					A <input type="radio" name="inputSentidos" value="A"> 
				</div>
				<div class="form-group col-md-3">
					<p>M. Muscosa </p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputMucosa" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputMucosa" value="NE">
					&nbsp
					A <input type="radio" name="inputMucosa" value="A"> 			
				</div>
				<div class="form-group col-md-3">
					<p>Piel y Anexos</p>
				</div>
				<div class="form-group col-md-3">
					AN <input type="radio" name="inputPiel" value="AN" required="">
					&nbsp
					NE <input type="radio" name="inputPiel" value="NE">
					&nbsp
					A <input type="radio" name="inputPiel" value="A"> 
				</div>
				</div>
		
		
				<div class="clear"></div>
      <input type="submit" name="btnRegistrarValoracion" value="Continuar">
						 
			</form>
		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p style="color:black">&copy; 2019. Formulario registro valoración de la mascota en línea . Mundo Animal Pet Care </p>
	        </div>

 
		
			



      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>



