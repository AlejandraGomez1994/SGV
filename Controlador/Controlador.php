<?php
session_start();
require_once("Modelo/Conexion.php");
require_once("Modelo/ModUsuario.php");
require_once("Modelo/ModCitas1.php");
require_once("Modelo/ModCliente.php");
require_once("Modelo/ModMascota.php");
require_once("Modelo/ModEmpleado.php");
require_once("Modelo/ModEspecialidad.php");
require_once("Modelo/ModEspecialidadID.php");
require_once("Modelo/ModCitas.php");
require_once("Modelo/ModDatosGenerales.php");
require_once("Modelo/ModDatosCliente.php");
require_once("Modelo/ModMascotaEmpleado.php");
require_once("Modelo/ModValoracion.php");
require_once("Modelo/ModMaterial.php");
require_once("Modelo/ModMaterialID.php");
require_once("Modelo/ModConsulta.php");
require_once("Modelo/ModConsultaID.php");
require_once("Modelo/ModTiempo.php");
require_once("Modelo/ModTiempoID.php");
require_once("Modelo/ModTipoCita.php");
require_once("Modelo/ModEspecie.php");
require_once("Modelo/ModEspecieID.php");
require_once("Modelo/ModRaza.php");
require_once("Modelo/ModRazaID.php");
require_once("Modelo/ModGenero.php");
require_once("Modelo/ModGeneroID.php");
require_once("Modelo/ModUnidad.php");
require_once("Modelo/ModUnidadID.php");
require_once("Modelo/ModDiagnostico.php");
require_once("Modelo/ModFormulacion.php");

if (isset($_POST["btnIngresarUsuario"])) {
   $usuario=$_POST["inputUsuario"];
   $clave=$_POST["inputClave"];
   $validar=Usuario::ValidarUsuario($usuario,$clave);
   if($validar=="true")
   {
    $listaCliente=Cliente::ListarCliente();
    require_once("Vista/VistaPrincipal.php");
   }
   else{
    require_once("Vista/Login.php");
   }
}
elseif (isset($_POST["btnBuscarCliente"])) {
  $cliente=$_POST["inputBuscarCliente"];
  if ($cliente=="Identificación") {
      require_once("Vista/BuscarClienteId.php");
  }
  elseif ($cliente=="Nombre") {
    require_once("Vista/BuscarClienteNombre.php");
  }
  elseif ($cliente=="Apellido") {
    require_once("Vista/BuscarClienteApellido.php");
  }
  elseif ($cliente=="Municipio") {
    require_once("Vista/BuscarClienteMunicipio.php");
  }
  else {
    echo "<div align='center'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong><i class='fa fa-times-circle'></i></strong> Debe seleccionar un elemento de la lista.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div></div>";
  $listaCliente=Cliente::ListarCliente();
  require_once("Vista/ListarClientes.php");
  }
}
elseif (isset($_POST["btnBuscarIdCliente"])) {
  $idCliente=$_POST["inputBuscarIdCliente"];
  $cliente=Cliente::BuscarClienteId($idCliente);
  require_once("Vista/BuscarCliente.php");
}
elseif (isset($_POST["btnBuscarNomCliente"])) {
  $nomCliente=$_POST["inputBuscarNomCliente"];
  $cliente=Cliente::BuscarClienteNombre($nomCliente);
  require_once("Vista/BuscarCliente.php");
}
elseif (isset($_POST["btnBuscarApeCliente"])) {
  $apeCliente=$_POST["inputBuscarApeCliente"];
  $cliente=Cliente::BuscarClienteApellido($apeCliente);
  require_once("Vista/BuscarCliente.php");
}
elseif (isset($_POST["btnBuscarMunicipio"])) {
  $municipio=$_POST["inputBuscarMunicipio"];
  $cliente=Cliente::BuscarClienteMunicipio($municipio);
  require_once("Vista/BuscarCliente.php");
}
elseif (isset($_GET["registrarusuario"])) {
  if (isset($_POST["btnRegistrarUsuario"])) {
     $identificacion=$_POST["inputIdentificacion"];
     $nombre=$_POST["inputNombres"];
     $email=$_POST["inputEmail"];
     $clave=$_POST["inputClave"];
     $rclave=$_POST["inputRClave"];
     $validar=Usuario::validar_clave($clave);
     if ($validar=="true") {
      if ($clave==$rclave) {
        $password=password_hash($clave,PASSWORD_DEFAULT,['cost' => 5]);
        $usuario=new Usuario($identificacion,$nombre,$email,$password);
        Usuario::RegistrarUsuario($usuario);
        require_once("Vista/Login.php");
      }
      else {
       echo "<script language='javascript'>
       history.back();
          Swal.fire({
           icon: 'error',
           title: 'Las contraseñas no coinciden.',
         });</script>";
      }
    }
    else {
      //require_once("Vista/RegistrarUsuario.php");
    echo "<script language='javascript'>
       history.back();
       alert('Las contraseñas no cumplen con la seguridad requerida');
        </script>";
    }
  }
  else {
    require_once("Vista/RegistrarUsuario.php");
  }
}
elseif (isset($_GET["modificarusuario"])) {
  if (isset($_POST["btnModificarUsuario"])) {
    $claveantigua=$_POST["inputAntiguaClave"];
    $identificacion=$_POST["inputIdentificacion"];
    $validarclave=Usuario::claveAntigua($claveantigua,$identificacion);
    if ($validarclave=="true") {
      $identificacion=$_POST["inputIdentificacion"];
    $nombre=$_POST["inputNombres"];
    $email=$_POST["inputEmail"];
    $clave=$_POST["inputNuevaClave"];
    $rclave=$_POST["inputRClave"];
    if ($clave==$rclave) {
      $password=password_hash($clave,PASSWORD_DEFAULT,['cost' => 5]);
      $usuario=new Usuario($identificacion,$nombre,$email,$password);
      Usuario::ModificarCuenta($usuario);
      require_once("Vista/Login.php");
    }
    else {
      echo "<script language='javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Las contraseñas no coinciden.',
              });</script>";
              $identificacion=$_SESSION["id"];
              $usuario=Usuario::BuscarCuenta($identificacion);
              require_once("Vista/ModificarUsuario.php");
    }
    }
    else {
      echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong><i class='fa fa-times-circle'></i></strong> Contraseña Invalida.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div></div>";
        $identificacion=$_SESSION["id"];
        $usuario=Usuario::BuscarCuenta($identificacion);
        require_once("Vista/ModificarUsuario.php");
      
    }
    
  }
  else {
    $identificacion=$_SESSION["id"];
    $usuario=Usuario::BuscarCuenta($identificacion);
    require_once("Vista/ModificarUsuario.php");
  }
}

elseif (isset($_GET["listarcliente"])) {
  $listaCliente=Cliente::ListarCliente();
  require_once("Vista/ListarClientes.php");
}

elseif (isset($_GET["config"])) {
  require_once("Vista/ListarConfig.php");
}


elseif (isset($_GET["registrarcliente"])) {
 if (isset($_POST["btnRegistrarCliente"])) {
   $idCliente=$_POST["inputIdentificacion"];
   $nombre=$_POST["inputNomCliente"];
   $apellido=$_POST["inputApellido"];
   $telefono=$_POST["inputNumero"];
   $celular=$_POST["inputCelular"];
   $email=$_POST["inputEmail"];
   $municipio=$_POST["inputMunicipio"];
   $direccion=$_POST["InputDireccion"];
   $cliente=new Cliente($idCliente,$nombre,$apellido,$telefono,$celular,$email,$municipio,$direccion);
   $registro=Cliente::RegistrarCliente($cliente);
   if ($registro)
   {
    $listaCliente=Cliente::ListarCliente();
    require_once("Vista/ListarClientes.php");
     ?>
  
      <script language='javascript'>
         alert("Registro exitoso");
        </script>
        <?php
   } else { $listaCliente=Cliente::ListarCliente();
    require_once("Vista/ListarClientes.php");?>

      <script language='javascript'>
         alert("Registro no exitoso");
        </script>
<?php
   }
  
 }
 else {
   require_once("Vista/RegistrarCliente.php");
 }
}
elseif (isset($_GET["modificarcliente"])) {
  if (isset($_POST["btnModificarCliente"])) {
    $idCliente=$_POST["inputIdCliente"];
    $nombre=$_POST["inputNomCliente"];
    $apellido=$_POST["inputApellidos"];
    $telefono=$_POST["inputNumero"];
    $celular=$_POST["inputCelular"];
    $email=$_POST["inputEmail"];
    $municipio=$_POST["inputMunicipio"];
    $direccion=$_POST["InputDireccion"];
    $cliente=new Cliente($idCliente,$nombre,$apellido,$telefono,$celular,$email,$municipio,$direccion);
    $modificar=Cliente::ModificarCliente($cliente);
    if ($modificar)
    {$listaCliente=Cliente::ListarCliente();
    require_once("Vista/ListarClientes.php");
    ?>
    <script language='javascript'>
         alert("Los cambios se guardaron exitosamente");
        </script>
     <?php   
    }else { $listaCliente=Cliente::ListarCliente();
      require_once("Vista/ListarClientes.php"); ?> ?>
      <script language='javascript'>
         alert("Los cambios no se guardaron con exito");
        </script>
      <?php
    }
  }
  else {
    $idCliente= $_GET["id_cliente"];
    $listaCliente = Cliente::BuscarCliente($idCliente);
    require_once("Vista/ModificarCliente.php");
  }
}
elseif (isset($_GET["listarmascota"])) {
  if (isset($_POST["btnBuscarMascota"])) {
    $mascota=$_POST["inputBuscarMascota"];
    if($mascota=="Identificación Propietario")
    {
      require_once("Vista/BuscarMascotaIdCliente.php");
    }
    elseif ($mascota=="Nombres Propietario") {
       require_once("Vista/BuscarMascotaNomCliente.php");
    }
    elseif ($mascota=="Apellidos Propietario") {
      require_once("Vista/BuscarMascotaApeCliente.php");
   }
   elseif ($mascota=="Nombre Mascota") {
    require_once("Vista/BuscarMascotaNomMascota.php");
 }
 elseif ($mascota=="Edad") {
  require_once("Vista/BuscarMascotaEdad.php");
}
elseif ($mascota=="Tiempo Edad") {
  $tiempo=Tiempo::ListarTiempo();
  require_once("Vista/BuscarMascotaTiempo.php");
}
elseif ($mascota=="Raza") {
  require_once("Vista/BuscarMascotaRaza.php");
}
elseif ($mascota=="Especie") {
  require_once("Vista/BuscarMascotaEspecie.php");
}
elseif ($mascota=="Genero") {
  require_once("Vista/BuscarMascotaGenero.php");
}
elseif ($mascota=="Pelaje") {
  require_once("Vista/BuscarMascotaPelaje.php");
}
    else {
      echo "<div align='center'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong><i class='fa fa-times-circle'></i></strong> Debe seleccionar un elemento de la lista.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div></div>";
      $listaMascotasEmpleados=MascotaEmpleado::ListarMascotaEmpleado();
      require_once("Vista/ListarMascotas.php");
    }
  }
  elseif (isset($_POST["btnBuscarIdCliente"])) {
    $idCliente=$_POST["inputBuscarIdCliente"];
    $mascota=MascotaEmpleado::BuscarMascotaIdCliente($idCliente);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarNomCliente"])) {
    $nomCliente=$_POST["inputBuscarNomCliente"];
    $mascota=MascotaEmpleado::BuscarMascotaNomCliente($nomCliente);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarApeCliente"])) {
    $apeCliente=$_POST["inputBuscarApeCliente"];
    $mascota=MascotaEmpleado::BuscarMascotaApeCliente($apeCliente);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarNomMascota"])) {
    $nomMascota=$_POST["inputBuscarNomMascota"];
    $mascota=MascotaEmpleado::BuscarMascotaNomMascota($nomMascota);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarEdadMascota"])) {
    $EdadMascota=$_POST["inputBuscarEdadMascota"];
    $mascota=MascotaEmpleado::BuscarMascotaEdadMascota($EdadMascota);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarTiempo"])) {
    $tiempo=$_POST["inputBuscarTiempo"];
    $mascota=MascotaEmpleado::BuscarMascotaTiempo($tiempo);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarRaza"])) {
    $raza=$_POST["inputBuscarRaza"];
    $mascota=MascotaEmpleado::BuscarMascotaRaza($raza);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarEspecie"])) {
    $especie=$_POST["inputBuscarEspecie"];
    $mascota=MascotaEmpleado::BuscarMascotaEspecie($especie);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarGenero"])) {
    $genero=$_POST["inputBuscarGenero"];
    $mascota=MascotaEmpleado::BuscarMascotaGenero($genero);
    require_once("Vista/BuscarMascota.php");
  }
  elseif (isset($_POST["btnBuscarPelaje"])) {
    $pelaje=$_POST["inputBuscarPelaje"];
    $mascota=MascotaEmpleado::BuscarMascotaPelaje($pelaje);
    require_once("Vista/BuscarMascota.php");
  }
  else {
    $listaMascotasEmpleados=MascotaEmpleado::ListarMascotaEmpleado();
    require_once("Vista/ListarMascotas.php");
  }
}
elseif (isset($_GET["registrarmascota"])) {
  if (isset($_POST["btnRegistrarMascota"])) {
    $idCliente=$_POST["inputPropietario"];
    //$NomCliente=$_POST["inputNomPropietario"];
    $nomMascota=$_POST["inputNomMascota"];
    $edad=$_POST["inputedad"];
    $tiempoEdad=$_POST["inputTiempo"];
    $raza=$_POST["inputRaza"];
    $especie=$_POST["inputEspecie"];
    $genero=$_POST["inputGenero"];
    $pelaje=$_POST["inputPelaje"];
    $mascota=new Mascota($idCliente,$nomMascota,$edad,$tiempoEdad,$raza,$especie,$genero,$pelaje);
    Mascota::RegistrarMascotas($mascota);
    $listaMascotasEmpleados=MascotaEmpleado::ListarMascotaEmpleado();
    require_once("Vista/ListarMascotas.php");
  }
  else {
    
    $idCliente= $_GET["id_cliente"];
    $listaCliente = Cliente::BuscarCliente($idCliente); 
    $listaTiempo = TiempoID::ListarTiempoID();
    $listaEspecie = EspecieID::ListarEspecieID();
    $listaRaza = RazaID::ListarRazaID();
    $listaGenero = GeneroID::ListarGeneroID();
    require_once("Vista/RegistrarMascota.php");
  }
}
elseif (isset($_GET["modificarmascota"])) {
  if (isset($_POST["btnModificarMascota"])) {
    $idCliente=$_POST["inputIdCliente"];
    $nomMascota=$_POST["inputNomMascota"];
    $edad=$_POST["inputedad"];
    $tiempoEdad=$_POST["inputTiempo"];
    $raza=$_POST["inputRaza"];
    $especie=$_POST["inputEspecie"];
    $genero=$_POST["inputGenero"];
    $pelaje=$_POST["inputPelaje"];
    $mascota=new Mascota($idCliente,$nomMascota,$edad,$tiempoEdad,$raza,$especie,$genero,$pelaje);
    Mascota::ModificarMascota($mascota);
    $listaMascotas=Mascota::ListarMascota();
    require_once("Vista/ListarMascotas.php");
  }
  else {
    $idCliente=$_GET["id_cliente"];
    $nomMascota=$_GET["nom_mascota"];
    $listaMascotas=Mascota::BuscarMascotas($idCliente,$nomMascota);
    require_once("Vista/ModificarMascota.php");
  }
}
elseif (isset($_GET["recuperarcuenta"])) {
  if (isset($_POST["btnrecuperarcuenta"])) {
    $correo=$_POST["InputEmailRecuperacion"];
    Usuario::validarcorreo($correo);
   // require_once("Vista/Login.php");
  }
  else {
    require_once("Vista/RecuperarCuenta.php");
  }
}
elseif (isset($_GET["cambiarclave"])) {
  if (isset($_POST["btnCambiarClave"])) {
    $clave=$_POST["inputClave"];
    $rclave=$_POST["inputRClave"];
    $identificacion=$_POST["inputIdentificacion"];
    $nombre=$_POST["inputNombres"];
    $email=$_POST["inputEmail"];
    if ($clave==$rclave) {
      $password=password_hash($clave,PASSWORD_DEFAULT,['cost' => 5]);
      $usuario=new Usuario($identificacion,$nombre,$email,$password);
      Usuario::cambioclave($usuario);
      require_once("Vista/Login.php");
    }
    else {
      echo "<script language='javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Las contraseñas no coinciden.',
              });</script>";
    }
  }
  else {
    $identificacion=$_GET["id"];
    $usuario=Usuario::BuscarCuenta($identificacion);
    require_once("Vista/CambiarClave.php");
  }
}
elseif (isset($_POST["btnBuscarEmpleado"])) {
   $idEmpleado=$_POST["inputBuscarEmpleado"];
   $empleado=Empleado::BuscarEmpleado($idEmpleado);
   require_once("Vista/BuscarEmpleado.php");
}
elseif (isset($_GET["listarempleado"])) {
  $empleado=Empleado::ListarEmpleado();
  require_once("Vista/ListarEmpleados.php");
}
elseif (isset($_GET["registrarempleado"])) {
  if (isset($_POST["btnRegistrarEmpleado"])) {
    $idEmpleado=$_POST["inputIdentificacion"];
    $nombre=$_POST["inputNombre"];
    $especialidad=$_POST["inputEspecialidad"];
    $descripcion=EspecialidadId::BuscarId($especialidad);
    $idEspecialidad=$descripcion->getIdEspecialidad();
    $telefono=$_POST["inputTelefono"];
    $email=$_POST["inputEmail"];
    $direccion=$_POST["inputDireccion"];
    $empleado=new Empleado($idEmpleado,$nombre,$idEspecialidad,$telefono,$email,$direccion);
    $registro=Empleado::RegistrarEmpleado($empleado);//Modifico alerta
    if ($registro){
      $empleado=Empleado::ListarEmpleado();
      require_once("Vista/ListarEmpleados.php");?>
         <script language='javascript'>
         alert("Registro exitoso");
        </script>
     <?php   
    }else {  $especialidad=EspecialidadId::ListarEspecialidad();
      require_once("Vista/RegistrarEmpleado.php"); ?>
      <script language='javascript'>
         alert("Registro no exitoso");
        </script>
      <?php
    }
    
  }  
}

elseif (isset($_GET["registrardatos"])) {
  $listaTiempo = TiempoID::ListarTiempoID();
    $idCliente=$_GET["id_cliente"];
    $nombre=$_GET["nom_mascota"];
    $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
    require_once("Vista/RegistrarDatos.php");
}

elseif(isset($_GET["modificardatos"])) { 

  if(isset($_POST["btnModificarDatos"])) {    
  $idCliente=$_GET["id_cliente"];
  $otro=$_POST["esterilizacion"];
  $nomMascota=$_POST["inputNomMascota"];
  $alergias=$_POST["inputAlergias"];
  $enfermedades=$_POST["inputEnfermedades"];
  $cirugias=$_POST["inputCirugias"];
  $alimentacion=$_POST["inputAlimentacion"];
  $cant=$_POST["inputCant"];
  $frecuencia=$_POST["inputFrecuencia"];
  $pesoinicial=$_POST["inputPesoI"];
  $pesoactual=$_POST["inputPesoA"];
  $vacunacion=$_POST["inputVacunacion"];
  $desparacitacion=$_POST["inputDesparacitacion"];
  //$esterilizacion=$_POST["inputEsterilizacion"];
  $dato=new DatosGenerales($idCliente,$otro,$nomMascota,$alimentacion,$cant,$frecuencia,$pesoinicial,$pesoactual,$vacunacion,$alergias,$desparacitacion,$enfermedades,$cirugias);
  DatosGenerales::ModificarDatos($dato);
  }
  else{
  $idCliente=$_GET["id_cliente"];
  $nombre=$_GET["nom_mascota"];
  $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
   require_once("Vista/ModificarDatos.php");  
  }
}

elseif (isset($_GET["tipocita"])) {
 if (isset($_POST["btnTipoCita"])) {
  $tipocita=$_POST["inputTipoCita"];
  $idEspecialidad=TipoCita::idEspecialidad($tipocita);
  $idCliente=$_GET["id_cliente"];
  $nomMascota=$_GET["nom_mascota"];
  $empleados=Empleado::Empleados($idEspecialidad);
  require_once("Vista/Profesional.php");
 }
 elseif (isset($_POST["btnProfesional"])) {
  $tipocita=$_GET["tipo_cita"];
  $idCliente=$_GET["id_cliente"];
  $nomMascota=$_GET["nom_mascota"];
  $mascota=Mascota::BuscarMascotas($idCliente,$nomMascota);
  $empleado=$_POST["inputProfesional"];
  $empleado=Empleado::ValidarEmpleado($empleado);
  $idEmpleado=$_POST["inputProfesional"];
  $Fecha=$_POST["inputFecha"];
  $citasspa=Citas1::ListaPrueba1($idEmpleado,$Fecha);
  require_once("Vista/ElegirHora.php");
  }
 else {
  $tipocita=TipoCita::ListarTipoCita();
  require_once("Vista/TipoCita.php");
 }
}
elseif (isset($_GET["asignarcita"])) {
  $idCliente=$_GET["id_cliente"];
  $nomMascota=$_GET["nom_mascota"];
  $hora=$_GET["hora"];
  $fecha=$_GET["fecha"];
  $fechaactual=Citas::FechaActual();
  $horaactual=Citas::HoraActual();
  if (($hora <= $horaactual) && ($fecha==$fechaactual)) {
    echo "<script language='javascript'>
    alert('Hora no disponible {$hora}, la hora actual es: {$horaactual}.');
    window.location.href = 'http://localhost:91/MundoAnimalPetCare(Unificado)/?tipocita&id_cliente=$idCliente&nom_mascota=$nomMascota';
      </script>";
  }
  else{
  if (isset($_POST["btnAsignarcita"])) {
    $idCliente=$_POST["inputIdPropietario"];
    $cliente=Cliente::BuscarCliente($idCliente);
    $correo=$cliente->getEmail();
    $idEmpleado=$_POST["IdProfesional"];
    $tipocita=$_GET["tipo_cita"];
    $nomMascota=$_POST["inputNomMascota"];
    $nomEmpleado=$_POST["NomProfesional"];
    $hora=$_POST["inputHora"];
    $fecha=$_POST["inputFecha"];
    //Citas::ValidarCorreo($correo,$tipocita,$fecha, $hora,$nomEmpleado,$nomMascota);
    $citas=new Citas($idCliente,$idEmpleado,$tipocita,$nomMascota,$fecha,$hora);
    Citas::AgendarCitas($citas);
    $listaMascotasEmpleados=MascotaEmpleado::ListarMascotaEmpleado();
    require_once("Vista/ListarMascotas.php");
    
  }
  else {
    $tipocita=$_GET["tipo_cita"];
    $idCliente=$_GET["id_cliente"];
    $nomMascota=$_GET["nom_mascota"];
    $idEmpleado=$_GET["id_empleado"];
    $nomEmpleado=$_GET["nom_empleado"];
    $hora=$_GET["hora"];
    $fecha=$_GET["fecha"];
    require_once("Vista/ConfirmarCita.php");
  }
  }
}
elseif (isset($_GET["listarcitaspa"])) {
  
  $citasspa=CitasSpa::ListarCitasSpa();
  require_once("Vista/ListarCitasSpa.php");
}
elseif (isset($_GET["listardatos"])) {
  $datos= DatosCliente::ListarDatosCliente();
  require_once("Vista/ListarDatosGenerales.php");
}
elseif (isset($_GET["listarvaloracion"])) {
  $valoracion= Valoracion::ListarValoracion();
  require_once("Vista/ListarValoracion.php");
}

//--- VISTAS DE REGISTRAR Y MODIFICAR DATOS --- //
  elseif (isset($_GET["validardatos"])) {
    $Empleado=Empleado::ListarEmpleadosSelect();
    $idCliente=$_GET["id_cliente"];
    $nomMascota=$_GET["nom_mascota"];
    $validar= DatosGenerales::ValidarDatos($idCliente,$nomMascota);
    if($validar)
    {
      $Empleado=Empleado::ListarEmpleadosSelect();
      $idCliente=$_GET["id_cliente"];
      $nomMascotae=$_GET["nom_mascota"];
      $listaDatos = DatosGenerales::BuscarDatos($idCliente,$nomMascota);
      require_once("Vista/ModificarDatos.php");
    }
else{
  $Empleado=Empleado::ListarEmpleadosSelect();
      $idCliente=$_GET["id_cliente"];
      $nombre=$_GET["nom_mascota"];
      $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
      require_once("Vista/RegistrarDatos.php");

    }
  }

   // --- REGSITRAR DATOS --- //
  elseif(isset($_GET["registrarvaloracion"])){   
    if (isset($_POST["btnRegistrarDatos"])) {
      $id=$_GET["id_consulta"];
      $alimentacion=$_POST["inputAlimentacion"];
      $cant=$_POST["inputCant"];
      $frecuencia=$_POST["inputTiempo"];
      $pesoinicial=$_POST["inputPesoI"];
      $pesoactual=$_POST["inputPesoA"];
      $vacunacion=$_POST["inputVacunacion"];
      $alergias=$_POST["inputAlergias"];
      $desparasitacion=$_POST["inputDesparasitacion"];
      $enfermedades=$_POST["inputEnfermedades"];
      $cirugias=$_POST["inputCirugias"];
      $esterilizacion=$_POST["inputEsterilizacion"];
      $dato=new DatosGenerales($id,$alimentacion,$cant,$frecuencia,$pesoinicial,$pesoactual,$vacunacion,$alergias,$desparasitacion,$enfermedades,$cirugias,$esterilizacion);
      DatosGenerales::RegistrarDatos($dato);
      $idCliente=$_GET["id_cliente"];
      $nombre=$_GET["nom_mascota"];
      $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
      require_once("Vista/Rvaloracion.php");
    }
  else{
   $idCliente=$_GET["id_cliente"];
   $nombre=$_GET["nom_mascota"];
   $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
   require_once("Vista/RValoracion.php");
  }
}
elseif(isset($_GET["registrarconsulta"])){
  $idCliente=$_GET["id_cliente"];
  $nombre=$_GET["nom_mascota"];
  $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
  $Empleado=Empleado::ListarEmpleadosSelect();
  require_once("Vista/RegistrarConsulta.php"); 
}

// --REGISTRAR MATERIALES Y REGISTRAR DIAGNOSTICO--//
elseif(isset($_GET["registrarmateriales"])){ 

  if(isset($_POST["btnRegistrarMaterial"])) {
    $id=$_GET["id_consulta"];
    $nomMaterial=$_POST["inputTratamiento"];
    $Cant=$_POST["inputCant"];
    $Unidad=$_POST["inputUnidad"];
    $material=new Material($id,$nomMaterial,$Cant,$Unidad);
    Material::RegistrarMaterial($material);
    $listaMaterialesID = MaterialID::ListarMaterialesID($id);
    $listaUnidadID = UnidadID::ListarUnidadID();
    require_once("Vista/RegistrarMateriales.php");
   }

  if(isset($_POST["btnRegistrarDiagnostico"])) {
    $id=$_GET["id_consulta"];
    $anamnesis=$_POST["inputAnamnesis"];
    $hallazgos=$_POST["inputHallazgos"];
    $problemas=$_POST["inputProblemas"];
    $diagDiferenciales=$_POST["inputDiferenciales"];
    $diagPresuntivos=$_POST["inputPresuntivos"];
    $examenes=$_POST["inputExamenes"];
    $diagFinal=$_POST["inputFinal"];
    $cuidados=$_POST["inputCuidados"];
    $diagnostico=new Diagnostico($id,$anamnesis,$hallazgos,$problemas,$diagDiferenciales,$diagPresuntivos,$examenes,$diagFinal,$cuidados);
    Diagnostico::RegistrarDiagnostico($diagnostico);
    $id=$_GET["id_consulta"];
    $listaMaterialesID = MaterialID::ListarMaterialesID($id);
    $listaUnidadID = UnidadID::ListarUnidadID();
    require_once("Vista/RegistrarMateriales.php");
   }
else {
    $id=$_GET["id_consulta"];
    $listaMaterialesID = MaterialID::ListarMaterialesID($id);
    //print_r ($listaMateriales);
    $listaUnidadID = UnidadID::ListarUnidadID();
    require_once("Vista/RegistrarMateriales.php");
}
}

//--REGISTRAR CONSULTA -----//
elseif(isset($_GET["listarconsulta"])){ 
  
  if(isset($_POST["btnRegistrarConsulta"])) {
    $fecha=$_POST["inputFecha"];
    $procedimiento=$_POST["inputProcedimiento"];
    $veterinario=$_POST["inputProfesional"];
    $cliente=$_GET["id_cliente"];       
    $nomMascota=$_POST["inputNomMascota"];
    $consulta=new Consulta($fecha,$procedimiento,$veterinario,$cliente,$nomMascota);
    Consulta::RegistrarConsulta($consulta);
    $nomMascota=$_GET["nom_mascota"];
    $listaBConsulta = ConsultaID::BuscarConsulta($nomMascota);  
    require_once("Vista/ListarConsulta.php"); 
  }
else {
    $id=$_GET["id_cliente"];
    $nomMascota=$_GET["nom_mascota"];
    $listaBConsulta = ConsultaID::BuscarConsulta($id,$nomMascota);
    $idCliente=$_GET["id_cliente"];
    $nombre=$_GET["nom_mascota"];
    $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
  require_once("Vista/ListarConsulta.php");
}
}

//------ REGISTRAR VALORACIÓN -------//
elseif(isset($_GET["registrardiagnostico"])){ 

  if(isset($_POST["btnRegistrarValoracion"])) {
    $idConsulta=$_GET["id_consulta"];
    $temperatura=$_POST["inputTemperatura"];
    $deshidratacion=$_POST["inputDeshidratacion"];
    $pulso=$_POST["inputPulso"];
    $fc=$_POST["inputFc"];
    $fr=$_POST["inputFr"];
    $tllc=$_POST["inputTllc"];
    $cc=$_POST["inputCc"];
    $otro=$_POST["inputOtro"];
    $actitud=$_POST["inputActitud"];
    $hidratacion=$_POST["inputHidratacion"];
    $nutricion=$_POST["inputNutricion"];
    $ganglios=$_POST["inputGanglios"];
    $m_mucosa=$_POST["inputMucosa"];
    $s_esqueletico=$_POST["inputEsqueletico"];
    $s_nervioso=$_POST["inputNervioso"];
    $s_digestivo=$_POST["inputDigestivo"];
    $sentidos=$_POST["inputSentidos"];
    $piel_anexos=$_POST["inputPiel"];
    $Valoracion=new Valoracion($idConsulta,$temperatura,$deshidratacion,$pulso,$fc,$fr,$tllc,$cc,$otro,$actitud,$hidratacion,$nutricion,$ganglios,$m_mucosa,$s_esqueletico,$s_nervioso,$s_digestivo,$sentidos,$piel_anexos);
    Valoracion::RegistrarValoracion($Valoracion);
    $idCliente=$_GET["id_cliente"];
    $nombre=$_GET["nom_mascota"];
    $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
    require_once("Vista/RegistrarDiagnostico.php"); 
  }
  else{
    $idCliente=$_GET["id_cliente"];
    $nombre=$_GET["nom_mascota"];
    $listaMascota = Mascota::BuscarMascotas($idCliente,$nombre);
    require_once("Vista/RegistrarDiagnostico.php");
  } 
}

//------- REGISTRAR MATERIAL --------//
elseif(isset($_GET["registrarformulacion"])){ 

  if(isset($_POST["btnRegistrarMaterial"])) {
    $id=$_GET["id_consulta"];
    $nomMaterial=$_POST["inputTratamiento"];
    $Cant=$_POST["inputCant"];
    $Unidad=$_POST["inputUnidad"];
    $material=new Material($id,$nomMaterial,$Cant,$Unidad);
    Material::RegistrarMaterial($material);
    $id=$_GET["id_consulta"];
    $listaMateriales = MaterialID::ListarMaterialesID($id);
    $listaUnidadID = UnidadID::ListarUnidadID();
    require_once("Vista/RegistrarMateriales.php");
   }

   // BTN Continuar a registrar tratamiento //
   if (isset($_GET["btnContinuar"])) {
    require_once("Vista/RegistrarFormulacion.php");
    }

  else{
    $listaUnidadID = UnidadID::ListarUnidadID();
    $listaTiempo = TiempoID::ListarTiempoID();
    require_once("Vista/RegistrarFormulacion.php");
  }  
}

// ELIMINAR MATERIAL //
elseif (isset($_GET["eliminarmaterial"])) {

  // BTN Continuar a registrar tratamiento //
    if (isset($_GET["btnContinuar"])) {
    require_once("Vista/RegistrarFormulacion.php");
    }

else{
    $id=$_GET["idMaterial"];
    MaterialID::EliminarMaterial($id);
    $id=$_GET["id_consulta"];
    $listaMaterialesID = MaterialID::ListarMaterialesID($id);
    $listaUnidadID = UnidadID::ListarUnidadID();
    require_once("Vista/RegistrarMateriales.php");
}   
}


  elseif (isset($_GET["listarhclinica"])) {
    
    if(isset($_POST["btnRegistrarFormulacion"])) {
      $consulta=$_GET["id_consulta"];
      $tratamiento=$_POST["inputTratamiento"];
      $cant=$_POST["inputCant"];
      $unidad=$_POST["inputUnidad"];
      $cada=$_POST["inputCada"];
      $tiempo=$_POST["inputTiempo"];
      $formulacion=new Formulacion($consulta,$tratamiento,$cant,$unidad,$cada,$tiempo);
      Formulacion::RegistrarFormulacion($formulacion);
      $listaConsultaId = ConsultaID::ListarConsultaiD();
      require_once("Vista/ListarHistoriaClinica.php");
     }
  else{
    require_once("Vista/ListarHistoriaClinica.php");
  }
  }


elseif (isset($_GET["registrartiempo"])) {

  if(isset($_POST["btnRegistrarTiempo"])) {
    $descripcion=$_POST["inputDescripcion"];
    $tiempo=new Tiempo($descripcion);
    Tiempo::RegistrarTiempo($tiempo);
    require_once("Vista/RegistrarTiempo.php");
  }
 else{
   require_once("Vista/RegistrarTiempo.php");
 }
}

elseif (isset($_GET["registrarespecie"])) {

  if(isset($_POST["btnRegistrarEspecie"])) {
    $descripcion=$_POST["inputDescripcion"];
    $especie=new Especie($descripcion);
    Especie::RegistrarEspecie($especie);
    require_once("Vista/RegistrarEspecie.php");
  }
 else{
   require_once("Vista/RegistrarEspecie.php");
 }
}

elseif (isset($_GET["registrarraza"])) {

  if(isset($_POST["btnRegistrarRaza"])) {
    $id=$_POST["inputEspecie"];
    $descripcion=$_POST["inputDescripcion"];
    $raza=new Raza($id,$descripcion);
    Raza::RegistrarRaza($raza);
    require_once("Vista/ListarConfig.php");
  }
 else{
  $listaEspecie = EspecieID::ListarEspecieID();
  require_once("Vista/RegistrarRaza.php");
 }
}

elseif (isset($_GET["listarespecie"])) {
  $listaEspecie=EspecieID::ListarEspecieID();
  require_once("Vista/ListarEspecie.php");
}

elseif (isset($_GET["registrargenero"])) {

  if(isset($_POST["btnRegistrarGenero"])) {
    $descripcion=$_POST["inputDescripcion"];
    $genero=new Genero($descripcion);
    Genero::RegistrarGenero($genero);
    require_once("Vista/RegistrarGenero.php");
  }
 else{
   require_once("Vista/RegistrarGenero.php");
 }
}
//-----------Vista principal----------------------//
elseif (isset($_GET["principal"])) {
  require_once("Vista/VistaPrincipal.php");
}
else {
  
  require_once("Vista/Login.php");
}
?>
</body>
</html>
