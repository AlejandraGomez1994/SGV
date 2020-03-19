<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <title>Admin - Login - sgv</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <body> 
 <?php
 class CitasSpa
 {
  private $idCliente;
  private $idEmpleado;
  private $nomMascota;
  private $fecha;
  private $hora;

  public function __construct($idCliente,$idEmpleado,$nomMascota,$fecha,$hora)
  {
      $this->idCliente = $idCliente;
      $this->idEmpleado =$idEmpleado;
      $this->nomMascota = $nomMascota;
      $this->fecha = $fecha;
      $this->hora = $hora;
  }
  public function setIdCliente($idCliente)
{
$this->idCliente=$idCliente;
}
public function setIdEmpleado($idEmpleado)
{
    $this->idEmpleado=$idEmpleado;
}
public function setNomMascota($nomMascota)
{
    $this->nomMascota=$nomMascota;
}
public function setFecha($fecha)
{
    $this->fecha=$fecha;
}
public function setHora($hora)
{
    $this->hora=$hora;
}
public function getIdCliente()
{
    return $this->idCliente;
}
public function getIdEmpleado()
{
    return $this->idEmpleado;
}

public function getNomMascota()
{
    return $this->nomMascota;
}
public function getFecha()
{
    return $this->fecha;
}
public function getHora()
{
    return $this->hora;
}
   public static function ListarCitasSpa()
   {
     $citasspa= [];
     $db=Db::getConnect();
     $sql=$db->query('SELECT * FROM citasspa');
     foreach ($sql->fetchAll() as $citaspa) {
       $citasspa[]= new CitasSpa($citaspa['IdCliente'],$citaspa['IdEmpleado'],$citaspa['NomEmpleado'],$citaspa['NomMascota'],$citaspa['Fecha'],$citaspa['Hora']);
     }
     return $citasspa;
   }
   public static function FechaActual()
   {
     $db=Db::getConnect();
     $sql=$db->query('SELECT CURDATE() AS fecha');
     $fecha=$sql->fetch();
     $fechaactual=$fecha['fecha'];
     return $fechaactual;
   }
   public static function HoraActual()
   {
      $db=Db::getConnect();
      $sql=$db->query('SELECT TIME(NOW()) AS hora');
      $hora=$sql->fetch();
      $horaactual=$hora['hora'];
      return $horaactual; 
   }
   public static function ValidarHoras($idEmpleado,$idCliente,$nomMascota,$fecha,$hora)
   {
      $db=Db::getConnect();
      $sql=$db->query("SELECT * FROM citasspa WHERE IdEmpleado=$idEmpleado,IdCliente=$idCliente,NomMascota='$nomMascota',Fecha=$fecha, Hora='$hora'");
      $disponibilidad=$sql->fetch();
      if ($disponibilidad > 0) {
          return true;
      }
      else {
          return false;
      }
   }
   public static function AgendarCitaSpa($cita)
   {
     $db=Db::getConnect();
     $insert=$db->prepare("INSERT INTO citasspa (IdCliente,IdEmpleado,NomMascota,Fecha,Hora) VALUES('$cita->$idCliente','$cita->idEmpleado','$cita->NomMascota','$cita->fecha','$cita->hora')");
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

 
 }
 ?>
</body>
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