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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/css/styles.css" rel='stylesheet' type='text/css' />

</head>

<body id="fuente1">

  <!-- Page Wrapper -->

  <!-- Page Wrapper -->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<div class="container-fluid">
  <div class="col-md-12">
 <div class="row">
 <div id="wrapper">
 <a class="sidebar-brand d-flex align-items-center justify-content-center" style="font-size:15px" href="?principal">
      <div class="sidebar-brand-icon rotate-n-15" style="font-size:37px">
          <i class="fas fa-cat"></i>
        </div>
        <div class="sidebar-brand-text mx-1" style="">Mundo Animal<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<sup>Pet Care</sup></div>
        
      </a>
</div>
 <a class="nav-item nav-link active" style="font-size:13px" href="?listarcliente">
          <i class="fas fa-fw fa-list"></i>
          <span style="color:black">Clientes</span></a>

 <a class="nav-item nav-link active" style="font-size:13px" href="?listarcitas">
          <i class="fas fa-fw fa-list"></i>
          <span style="color:black">Citas agendadas</span></a>
 <a class="nav-item nav-link active" style="font-size:13px" href="?listarmascota">
          <i class="fas fa-fw fa-list"></i>
          <span style="color:black">Mascotas</span></a>
 <a class="nav-item nav-link active" style="font-size:13px" href="?listarempleado">
          <i class="fas fa-fw fa-list"></i>
          <span style="color:black">Empleados</span></a>
      <a class="nav-item nav-link active" style="font-size:13px" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span style="color:black">Historia clínica</span></a>
<div class="topbar-divider d-none d-sm-block"></div>
<div class="col-md-3">
<!--<li class="nav-item dropdown no-arrow">-->
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-primary-900 fa-3x" style="font-size:37px"></i><span class="mr-2 d-none d-lg-inline text-gray-700" style="font-size:13px">
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
  </div><!--Cierro col-md-4>-->
  </div><!--Cierro row-->
  <!--</li>-->
  </div><!--Cierro container-->
  </div><!--Cierro col-->
</nav>
<br>
<br>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

  <!-- Page Heading -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="bg-agile">
	<div class="book-appointment">
	<h2>Datos Generales del Cliente</h2>
				
			<form modificarcliente="index.php" method="POST">
			<!--<div id="resultados_ajax" class="gaps"></div>-->
		<div class="left-agileits-w3layouts same">
      <div class="gaps">
					<p>Nombre(s)</p>
					<input type="text" name="inputNomCliente" placeholder="" required="" value="<?php echo $listaCliente->getNomCliente(); ?>" maxlength="30"/>
			</div>
      <div class="gaps">
				  <p>Identificación</p>
					<input type="text" name="inputIdCliente" placeholder="" required="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $listaCliente->getIdCliente();?>"readonly/>
			</div>
			<div class="gaps">	
					<p>Número fijo</p>
					<input type="text" name="inputNumero" placeholder="" required="" value="<?php echo $listaCliente->getTelefono(); ?>" maxlength="25" />
			</div>
			<div class="gaps">	
					<p>Municipio</p>
					<input type="text" name="inputMunicipio" placeholder="" required="" value="<?php echo $listaCliente->getMunicipio(); ?>" maxlength="15"/>
			</div>
		</div>

		<div class="right-agileinfo same">
			<div class="gaps">
					<p>Apellidos</p>
					<input type="text" name="inputApellidos" placeholder="" required="" value="<?php echo $listaCliente->getApellido(); ?>" maxlength="30"/>
			</div>	
			<div class="gaps">
			  	<p>E-mail</p>
					<input type="email" name="inputEmail" placeholder="" required="" value="<?php echo $listaCliente->getEmail(); ?>" maxlength="50"/>
			</div>
      <div class="gaps">	
					<p>Celular</p>
					<input type="text" name="inputCelular" placeholder="" required="" value="<?php echo $listaCliente->getCelular(); ?>" maxlength="25" />
			</div>
			<div class="gaps">	
					<p>Direccion</p>
					<input type="text" name="InputDireccion" placeholder="" required="" value="<?php echo $listaCliente->getDireccion(); ?>" maxlength="50"/>
		  </div>
		</div>
			<!--<div class=""></div>-->
						  <input type="submit" name="btnModificarCliente" value="Guardar Cambios">
						  <br>
						 <!-- <ul align="center">Asignar Mascota</ul>-->
			</form>
		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p style="color:black">&copy; 2019. Formulario de citas médicas en línea . Mundo Animal Pet Care </p>
	        </div>
		
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  <br><br><br>
      <!-- Footer -->
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
  <style>
        header span {
            margin:5px;
            width:100%;
            text-align:center;
            border:1px solid;
            background:#ccc;
            padding:10px;
            display:inline-block;
            font-size:14px;
            cursor:pointer;
          
        }
        .fuente1 {font-size:1.1em;}
        .fuente2 {font-size:1em;}
    </style>
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
</html>

