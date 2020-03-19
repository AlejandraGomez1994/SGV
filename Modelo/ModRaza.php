<?php
class Raza
{
 
   private $id;
   private $descripcion;
  
   public function __construct($id,$descripcion)
   {
  
   $this->descripcion=$descripcion;
   $this->id=$id;
   }

      public function setId($id)
      {
         $this->id=$id;
      }
      public function setDescripcion($descripcion)
      {
         $this->descripcion=$descripcion;
      }

      public function getId()
      {
         return $this->id;
      }
      public function getDescripcion()
      {
         return $this->descripcion;
      }

          

      public static function ListarRaza()
	{
		$listaRaza =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM raza order by descripcion');

		foreach ($sql->fetchAll() as $raza) {
         
         $listaRaza[]= new Raza($raza['id_especie'],$raza['descripcion']);
      }
		return $listaRaza;
    }
    
    public static function RegistrarRaza($raza)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO raza (id_especie,descripcion) VALUES('$raza->id','$raza->descripcion')");
         if($insert->execute())
         {
              
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

   public static function BuscarTiempo($id)
	{
		$listaTiempo=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM tiempo WHERE =$id");

		//asignarlo al objeto producto
      $tiempo=$sql->fetch();
      
		$listaTiempo[]= new Raza($tiempo['id_especie'],$tiempo['descripcion']);
      return $listaTiempo;
      
    }


   }

?>

