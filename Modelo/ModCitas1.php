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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <body> 
 <?php
 class Citas1
 {
  private $idCliente;
  private $nomCliente;
  private $idEmpleado;
  private $nomEmpleado;
  private $tipoCita;
  private $nomMascota;
  private $fecha;
  private $hora;
  public function __construct($idCliente,$nomCliente,$idEmpleado,$nomEmpleado,$tipoCita,$nomMascota,$fecha,$hora)
  {
      $this->idCliente = $idCliente;
      $this->nomCliente=$nomCliente;
      $this->idEmpleado =$idEmpleado;
      $this->nomEmpleado=$nomEmpleado;
      $this->tipoCita=$tipoCita;
      $this->nomMascota = $nomMascota;
      $this->fecha = $fecha;
      $this->hora = $hora;
  }
  public function setIdCliente($idCliente)
{
$this->idCliente=$idCliente;
}
public function setNomCliente($nomCliente)
{
$this->nomCliente=$nomCliente;
}
public function setIdEmpleado($idEmpleado)
{
    $this->idEmpleado=$idEmpleado;
}
public function setNomEmpleado($nomEmpleado)
{
    $this->nomEmpleado=$nomEmpleado;
}
public function setTipoCita($tipoCita)
{
    $this->tipoCita=$tipoCita;
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
public function getNomCliente()
{
    return $this->nomCliente;
}
public function getIdEmpleado()
{
    return $this->idEmpleado;
}
public function getNomEmpleado()
{
    return $this->nomEmpleado;
}
public function getTipoCita()
{
    return $this->tipoCita;
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

  public static function ListaPrueba()
  {
    $citaspa=[];
    $db=Db::getConnect();
    $sql=$db->query("SELECT c.IdCliente, cl.NomCliente, cl.Telefono,  t.DescripcionTipoCita, e.Nombre, c.NomMascota,c.Fecha,c.Hora FROM citas c JOIN clientes cl ON(c.IdCliente=cl.IdCliente) JOIN empleados e ON(c.IdEmpleado=e.IdEmpleado) JOIN tipocitas t ON(c.IdTipoCita=t.IdEspecialidad)");
    foreach ($sql->fetchAll() as $Citasspa) {
        $citaspa[]= new Citas1($Citasspa['IdCliente'],$Citasspa['NomCliente'],$Citasspa['Telefono'],$Citasspa['Nombre'],$Citasspa['DescripcionTipoCita'],$Citasspa['NomMascota'],$Citasspa['Fecha'],$Citasspa['Hora']);
    }
    return $citaspa;
  }
  public static function ListaPrueba1($idEmpleado,$fecha)
  {     $citaspa=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT c.IdCliente, cl.NomCliente, c.IdEmpleado,c.IdTipoCita,e.Nombre, c.NomMascota,c.Fecha,c.Hora FROM citas c JOIN clientes cl ON(c.IdCliente=cl.IdCliente) JOIN empleados e ON(c.IdEmpleado=e.IdEmpleado AND c.IdEmpleado='$idEmpleado' AND c.Fecha='$fecha') ORDER BY c.Hora ASC");
        foreach ($sql->fetchAll() as $Citasspa) {
            $citaspa[]= new Citas1($Citasspa['IdCliente'],$Citasspa['NomCliente'],$Citasspa['IdTipoCita'],$Citasspa['IdEmpleado'],$Citasspa['Nombre'],$Citasspa['NomMascota'],$Citasspa['Fecha'],$Citasspa['Hora']);
        }
		return $citaspa;
  }
  public static function BuscarIdPropietario($idPropietario)
  {     $citas=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT c.IdCliente, cl.NomCliente, c.IdEmpleado,c.TipoCita,e.Nombre, c.NomMascota,c.Fecha,c.Hora FROM citas c JOIN clientes cl ON(c.IdCliente=cl.IdCliente) JOIN empleados e ON(c.IdEmpleado=e.IdEmpleado AND c.IdCliente='$idCliente') ORDER BY c.IdCliente ASC");
        foreach ($sql->fetchAll() as $Cita) {
            $citas[]= new Citas1($Cita['IdCliente'],$Cita['NomCliente'],$Cita['TipoCita'],$Cita['IdEmpleado'],$Cita['Nombre'],$Cita['NomMascota'],$Cita['Fecha'],$Cita['Hora']);
        }
		return $citas;
  }
  public static function BuscarNomPropietario($nomPropietario)
  {     $citas=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT c.IdCliente, cl.NomCliente, c.IdEmpleado,c.TipoCita,e.Nombre, c.NomMascota,c.Fecha,c.Hora FROM citas c JOIN clientes cl ON(c.IdCliente=cl.IdCliente) JOIN empleados e ON(c.IdEmpleado=e.IdEmpleado AND c.NomCliente='$nomCliente') ORDER BY c.NomCliente ASC");
        foreach ($sql->fetchAll() as $Cita) {
            $citas[]= new Citas1($Cita['IdCliente'],$Cita['NomCliente'],$Cita['TipoCita'],$Cita['IdEmpleado'],$Cita['Nombre'],$Cita['NomMascota'],$Cita['Fecha'],$Cita['Hora']);
        }
		return $citas;
  }
  public static function BuscarNomProfesional($nomProfesional)
  {     $citas=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT c.IdCliente, cl.NomCliente, c.IdEmpleado,c.TipoCita,e.Nombre, c.NomMascota,c.Fecha,c.Hora FROM citas c JOIN clientes cl ON(c.IdCliente=cl.IdCliente) JOIN empleados e ON(c.IdEmpleado=e.IdEmpleado AND e.Nombre='$nomProfesional') ORDER BY e.Nombre ASC");
        foreach ($sql->fetchAll() as $Cita) {
            $citas[]= new Citas1($Cita['IdCliente'],$Cita['NomCliente'],$Cita['TipoCita'],$Cita['IdEmpleado'],$Cita['Nombre'],$Cita['NomMascota'],$Cita['Fecha'],$Cita['Hora']);
        }
		return $citas;
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