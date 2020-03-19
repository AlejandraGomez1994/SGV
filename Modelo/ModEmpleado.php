<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Admin - Login - sgv</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <body> 
<?php
  class Empleado
  {
      private $idEmpleado;
      private $nombre;
      private $especialidad;
      private $telefono;
      private $email;
      private $direccion;

      public function __construct($idEmpleado,$nombre,$especialidad,$telefono,$email,$direccion)
      {
          $this->idEmpleado=$idEmpleado;
          $this->nombre=$nombre;
          $this->especialidad=$especialidad;
          $this->telefono=$telefono;
          $this->email=$email;
          $this->direccion=$direccion;
      }
      public function setIdVeterinario($idEmpleado)
      {
          $this->idEmpleado=$idEmpleado;
      }
      public function setNombre($nombre)
      {
          $this->nombre=$nombre;
      }
      public function setEspecialidad($especialidad)
      {
          $this->especialidad=$especialidad;
      }
      public function setTelefono($telefono)
      {
          $this->telefono=$telefono;
      }
      public function setEmail($email)
      {
          $this->email=$email;
      }
      public function setDireccion($direccion)
      {
          $this->direccion=$direccion;
      }
      public function getIdEmpleado()
      {
          return $this->idEmpleado;
      }
      public function getNombre()
      {
          return $this->nombre;
      }
      public function getEspecialidad()
      {
          return $this->especialidad;
      }
      public function getTelefono()
      {
          return $this->telefono;
      }
      public function getEmail()
      {
          return $this->email;
      }
      public function getDireccion()
      {
          return $this->direccion;
      }
      public static function ListarEmpleado()
      {
          $Empleado=[];
          $db=Db::getConnect();
          $sql=$db->query('SELECT e.IdEmpleado,e.Nombre, es.Descripcion,e.Telefono,e.Email,e.Direccion FROM empleados e JOIN especialidad es ON(e.IdEspecialidad=es.IdEspecialidad)');
          foreach ($sql->fetchAll() as $empleado) {
              $Empleado[]= new Empleado($empleado['IdEmpleado'],$empleado['Nombre'],$empleado['Descripcion'],$empleado['Telefono'],$empleado['Email'],$empleado['Direccion']);
          }
          return $Empleado;
      }
      public static function Empleados($idEspecialidad)
      {
          $Empleado=[];
          $db=Db::getConnect();
          $sql=$db->query("SELECT * FROM empleados e JOIN tipocitas t ON(e.IdEspecialidad=t.IdEspecialidad AND e.IdEspecialidad='$idEspecialidad')");
          foreach ($sql->fetchAll() as $empleado) {
              $Empleado[]= new Empleado($empleado['IdEmpleado'],$empleado['Nombre'],$empleado['IdEspecialidad'],$empleado['Telefono'],$empleado['Email'],$empleado['Direccion']);
          }
          return $Empleado;
      }

      public static function ListarEmpleadosSelect()
      {
          $Empleado=[];
          $db=Db::getConnect();
          $sql=$db->query("SELECT * FROM empleados WHERE IdEspecialidad = 9");
          foreach ($sql->fetchAll() as $empleado) {
              $Empleado[]= new Empleado($empleado['IdEmpleado'],$empleado['Nombre'],$empleado['IdEspecialidad'],$empleado['Telefono'],$empleado['Email'],$empleado['Direccion']);
          }
          return $Empleado;
      }

      public static function RegistrarEmpleado($empleado)
      {
        $db=Db::getConnect();
        $insert=$db->prepare("INSERT INTO empleados (IdEmpleado,Nombre,IdEspecialidad,Telefono,Email,Direccion) VALUES('$empleado->idEmpleado','$empleado->nombre','$empleado->especialidad','$empleado->telefono','$empleado->email','$empleado->direccion')");
        if ($insert->execute()) {
            echo "<script language='javascript'>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registro exitoso',
                showConfirmButton: false,
                timer: 1500
              });</script>";
        }
        else {
            echo "<script language='javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Registro no exitoso',
              });</script>";
        }
      }
      public static function BuscarEmpleado($idEmpleado)
      {
          $Empleado=[];
          $db=Db::getConnect();
          $sql=$db->query("SELECT * FROM empleados WHERE IdEmpleado=$idEmpleado");
          $empleado=$sql->fetch();
          if ($empleado > 0) {
             $empleado=new Empleado($empleado['IdEmpleado'],$empleado['Nombre'],$empleado['Especialidad'],$empleado['Telefono'],$empleado['Email'],$empleado['Direccion']);
             return $empleado;
          }
          else {
              echo "<script language='javascript'>
              Swal.fire({
                  icon: 'error',
                  title: 'Registro no encontrado.',
              });</script>";
          }
          
      }
      public static function ModificarVeterinario($veterinario)
      {
         $db=Db::getConnect();
         $insert=$db->prepare("UPDATE veterinarios SET IdVeterinario='$veterinario->idVeterinario', Nombre='$veterinario->nombre', Fijo='$veterinario->fijo', Celular='$veterinario->celular', Email='$veterinario->email', Direccion='$veterinario->direccion' WHERE IdVeterinario=$veterinario->idVeterinario");
         if ($insert->execute()) {
            echo "<script language='javascript'>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Los datos se modificaron exitosamente.',
                showConfirmButton: false,
                timer: 1500
              });</script>";
         }
         else {
            echo "<script language='javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Los datos no fueron modificados.',
              });</script>";
         }
      }
      public static function ValidarEmpleado($empleado)
      {
          $db=Db::getConnect();
          $sql=$db->query("SELECT * FROM empleados WHERE IdEmpleado='$empleado'");
          $empleadodb=$sql->fetch();
          $empleado=new Empleado($empleadodb['IdEmpleado'],$empleadodb['Nombre'],$empleadodb['IdEspecialidad'],$empleadodb['Telefono'],$empleadodb['Email'],$empleadodb['Direccion']);
          return $empleado;
      }
     
  }
?>
 <!-- Bootstrap core JavaScript-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>