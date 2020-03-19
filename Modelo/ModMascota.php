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
class Mascota
{
   private $idCliente;
   //private $NomCliente;
   private $nomMascota;
   private $edad;
   private $tiempo;
   private $raza;
   private $especie;
   private $genero;
   private $pelaje;

   public function __construct($idCliente,$nomMascota,$edad,$tiempo,$raza,$especie,$genero,$pelaje)
   {
      $this->idCliente=$idCliente;
      //$this->NomCliente=$NomCliente;
      $this->nomMascota=$nomMascota;
      $this->edad=$edad;
      $this->tiempo=$tiempo;
      $this->raza=$raza;
      $this->especie=$especie;
      $this->genero=$genero;
      $this->pelaje=$pelaje;
   }

   public function setIdCliente($idCliente)
   {
      $this->idCliente=$idCliente;
   }
  
   public function setNomMascota($nomMascota)
   {
      $this->nomMascota=$nomMascota;
   }
   public function setTiempo($tiempo)
   {
      $this->tiempo=$tiempo;
   }
   public function setRaza($raza)
   {
      $this->raza=$raza;
   }
   public function setEspecie($especie)
   {
      $this->especie=$especie;
   }
   public function setGenero($genero)
   {
      $this->genero=$genero;
   }
   public function setPelaje($pelaje)
   {
      $this->pelaje=$pelaje;
   }
   public function getIdCliente()
   {
      return $this->idCliente;
   }
   
   public function getNomMascota()
   {
      return $this->nomMascota;
   }
   public function getEdad()
   {
      return $this->edad;
   }
   public function getTiempo()
   {
      return $this->tiempo;
   }
   public function getRaza()
   {
      return $this->raza;
   }
   public function getEspecie()
   {
      return $this->especie;
   }
   public function getGenero()
   {
      return $this->genero;
   }
   public function getPelaje()
   {
      return $this->pelaje;
   }

   
    public static function RegistrarMascotas($mascota)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO mascotas (IdCliente,NomMascota,Edad,id_tiempo,id_raza,id_especie,id_genero,Pelaje) VALUES('$mascota->idCliente','$mascota->nomMascota',$mascota->edad,'$mascota->tiempo','$mascota->raza','$mascota->especie','$mascota->genero','$mascota->pelaje')");
        if($insert->execute())
        {             
             echo "<script language='javascript'>Swal.fire({
                 position: 'center',
                 icon: 'success',
                 title: 'Registro exitoso',
                 showConfirmButton: false,
                 timer: 1500
               });</script>";
 
         }
         else
         {
             echo "<script language='javascript'>
             Swal.fire({
                 icon: 'error',
                 title: 'Registro no exitoso',
               });</script>";
         }
      }catch (Exception $e)
      {
         echo $e->getmessage();
      }
   }
   public static function BuscarMascotas($idCliente,$nombre)
	{
		$listaMascota=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM mascotas WHERE IdCliente=$idCliente AND NomMascota='$nombre'");

		//asignarlo al objeto producto
      $mascotaDb=$sql->fetch();
      
		$listaMascota= new Mascota($mascotaDb['IdCliente'],$mascotaDb['NomMascota'],$mascotaDb['Edad'],$mascotaDb['id_tiempo'],$mascotaDb['id_raza'],$mascotaDb['id_especie'],$mascotaDb['id_genero'],$mascotaDb['Pelaje']);
      return $listaMascota;
      
    }
    public static function BuscarMascota($idCliente)
    {
       try{
       $listaMascotas=[];
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM mascotas WHERE IdCliente=$idCliente");
         foreach ($sql->fetchAll() as $mascota) {
         $listaMascotas[]= new Mascota($mascota['IdCliente'],$mascota['NomMascota'],$mascota['Edad'],$mascota['id_tiempo'],$mascota['Raza'],$mascota['Especie'],$mascota['Genero'],$mascota['Pelaje']);
         }
         return $listaMascotas;     
   }catch (Exception $e){
      echo $e->getmessage();
   }
     }
    public static function ModificarMascota($mascota)
	{
      try{  
		$db=Db::getConnect();
      $insert=$db->prepare("UPDATE mascotas SET IdCliente='$mascota->idCliente', NomMascota='$mascota->nomMascota',Edad='$mascota->edad',id_tiempo='$mascota->tiempo',Raza='$mascota->raza',Especie='$mascota->especie',Genero='$mascota->genero',Pelaje='$mascota->pelaje'	WHERE IdCliente = $mascota->idCliente AND NomMascota='$mascota->nomMascota'");
		 if($insert->execute())
		 {
            echo "<script language='javascript'>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Los datos se modificaron exitosamente',
                showConfirmButton: false,
                timer: 1500
              });</script>";
              //header("Location:?Controlador=Controlador&action4=ListarCliente");
		 }
		 else
		 {
            echo "<script language='javascript'>alert('Los cambios no se guardaron')</script>";
       }
      }catch (Exception $e)
      {
         echo $e->getmessage();
      }
    }
    
    public static function BuscarNom($nombre)
    {
       try{
       $listaMascotas=[];
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM mascotas WHERE NomMascota='$nombre'");
         foreach ($sql->fetchAll() as $mascota) {
         $listaMascotas[]= new Mascota($mascota['IdCliente'],$mascota['NomMascota'],$mascota['Edad'],$mascota['id_tiempo'],$mascota['Raza'],$mascota['Especie'],$mascota['Genero'],$mascota['Pelaje']);
         }
         return $listaMascotas;
       
       
            
   }catch (Exception $e){
      echo $e->getmessage();
   }
     }

    public static function BuscarNombre($nombre)
    {
       $listaMascota=[];
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM mascotas WHERE NomMascota='$nombre'");
 
       //asignarlo al objeto producto
       $mascotaDb=$sql->fetch();
       
       $listaMascota= new Mascota($mascotaDb['IdCliente'],$mascotaDb['NomCliente'],$mascotaDb['NomMascota'],$mascotaDb['Edad'],$mascotaDb['id_tiempo'],$mascotaDb['Raza'],$mascotaDb['Especie'],$mascotaDb['Genero'],$mascotaDb['Pelaje']);
       return $listaMascota;
       
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
