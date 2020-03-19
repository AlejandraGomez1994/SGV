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
class MascotaEmpleado
{
   private $idCliente;
   private $NomCliente;
   private $apeCliente;
   private $nomMascota;
   private $edad;
   private $tiempo;
   private $raza;
   private $especie;
   private $genero;
   private $pelaje;

   public function __construct($idCliente,$NomCliente,$apeCliente,$nomMascota,$edad,$tiempo,$raza,$especie,$genero,$pelaje)
   {
      $this->idCliente=$idCliente;
      $this->NomCliente=$NomCliente;
      $this->apeCliente=$apeCliente;
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
   public function setNomCliente($NomCliente)
   {
      $this->NomCliente=$NomCliente;
   }
   public function seApeCliente($apeCliente)
   {
      $this->apeCliente=$apeCliente;
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
   public function getNomCliente()
   {
      return $this->NomCliente;
   }
   public function getApeCliente()
   {
      return $this->apeCliente;
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

   public static function ListarMascotaEmpleado()
	{
		$listaMascotasEmpleados=[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT m.IdCliente, c.NomCliente, c.apellido, m.NomMascota, m.Edad, t.descripcion AS tiempo, r.descripcion AS raza, e.descripcion AS especie, g.descripcion AS genero, m.Pelaje from mascotas m 
      JOIN clientes c ON(m.IdCliente = c.IdCliente) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)');

		foreach ($sql->fetchAll() as $mascota) {
         $listaMascotasEmpleados[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
		}
		return $listaMascotasEmpleados;
    }
    public static function BuscarMascotaIdCliente($mascotas)
    {
       
       $listaMascotas=[];
       $db=Db::getConnect();
       $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND c.IdCliente=$mascotas) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
         foreach ($sql->fetchAll() as $mascota) {
         $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['NomMascota'],$mascota['apellido'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
         }
         return $listaMascotas;
     }
     public static function BuscarMascotaNomCliente($mascotas)
     {
        
        $listaMascotas=[];
        $db=Db::getConnect();
        $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND c.NomCliente LIKE '$mascotas%') JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
          foreach ($sql->fetchAll() as $mascota) {
          $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
          }
          return $listaMascotas;
      }
      public static function BuscarMascotaApeCliente($mascotas)
      {
         
         $listaMascotas=[];
         $db=Db::getConnect();
         $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND c.apellido LIKE '$mascotas%') JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
           foreach ($sql->fetchAll() as $mascota) {
           $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
           }
           return $listaMascotas;
       }
       public static function BuscarMascotaNomMascota($mascotas)
       {
          
          $listaMascotas=[];
          $db=Db::getConnect();
          $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND m.NomMascota LIKE '$mascotas%') JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
            foreach ($sql->fetchAll() as $mascota) {
            $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
            }
            return $listaMascotas;
        }
        public static function BuscarMascotaEdadMascota($mascotas)
        {
           
           $listaMascotas=[];
           $db=Db::getConnect();
           $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND m.Edad=$mascotas) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
             foreach ($sql->fetchAll() as $mascota) {
             $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
             }
             return $listaMascotas;
         }
         public static function BuscarMascotaTiempo($mascotas)
         {
            
            $listaMascotas=[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo AND t.descripcion LIKE '$mascotas') JOIN raza r ON(m.id_raza=r.id_raza) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
              foreach ($sql->fetchAll() as $mascota) {
              $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
              }
              return $listaMascotas;
          }
          public static function BuscarMascotaRaza($mascotas)
          {
             
             $listaMascotas=[];
             $db=Db::getConnect();
             $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza AND r.descripcion LIKE '$mascotas%') JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero)");
               foreach ($sql->fetchAll() as $mascota) {
               $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
               }
               return $listaMascotas;
           }
           public static function BuscarMascotaEspecie($mascotas)
           {
              
              $listaMascotas=[];
              $db=Db::getConnect();
              $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza ) JOIN especie e ON(m.id_especie=e.id_especie AND e.descripcion LIKE '$mascotas%') JOIN genero g ON(m.id_genero=g.id_genero)");
                foreach ($sql->fetchAll() as $mascota) {
                $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
                }
                return $listaMascotas;
            }
            public static function BuscarMascotaGenero($mascotas)
            {
               
               $listaMascotas=[];
               $db=Db::getConnect();
               $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente) JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza ) JOIN especie e ON(m.id_especie=e.id_especie) JOIN genero g ON(m.id_genero=g.id_genero AND g.descripcion LIKE '$mascotas%')");
                 foreach ($sql->fetchAll() as $mascota) {
                 $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
                 }
                 return $listaMascotas;
             }
             public static function BuscarMascotaPelaje($mascotas)
             {
                
                $listaMascotas=[];
                $db=Db::getConnect();
                $sql=$db->query("SELECT m.IdCliente, c.NomCliente,c.apellido,m.NomMascota,m.Edad, t.descripcion AS tiempo, r.descripcion AS raza,e.descripcion AS especie,g.descripcion AS genero,m.Pelaje FROM mascotas m JOIN  clientes c ON(m.IdCliente=c.IdCliente AND m.pelaje LIKE '%$mascotas%') JOIN tiempo t ON(m.id_tiempo=t.id_tiempo) JOIN raza r ON(m.id_raza=r.id_raza ) JOIN especie e ON(m.id_especie=e.id_especie ) JOIN genero g ON(m.id_genero=g.id_genero)");
                  foreach ($sql->fetchAll() as $mascota) {
                  $listaMascotas[]= new MascotaEmpleado($mascota['IdCliente'],$mascota['NomCliente'],$mascota['apellido'],$mascota['NomMascota'],$mascota['Edad'],$mascota['tiempo'],$mascota['raza'],$mascota['especie'],$mascota['genero'],$mascota['Pelaje']);
                  }
                  return $listaMascotas;
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
