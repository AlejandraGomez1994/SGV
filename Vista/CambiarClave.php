<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><br><img src="img/logo.png" width="503px" height="300px"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <img src="img/cambioclave.png" height="45px">
              </div>
              <br>
              <form class="user"cambiarclave="index.php" method="POST" >
              <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="inputClave" name="inputClave"  placeholder="Contraseña" minlength="8" maxlength="10" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="inputRClave" name="inputRClave" placeholder="Confirmar contraseña"  minlength="8" maxlength="10" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" id="btnCambiarClave" name="btnCambiarClave">
                  Guardar Cambios
</button>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="inputIdentificacion" name="inputIdentificacion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $usuario->getIdentificacion();?>"  style="visibility:hidden" readonly>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="inputNombres" name="inputNombres" value="<?php echo $usuario->getNombres();?>" style="visibility:hidden" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="inputEmail" name="inputEmail"  value="<?php echo $usuario->getEmail();?>"  style="visibility:hidden" readonly>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>         
              
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script src="js/petcare.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
