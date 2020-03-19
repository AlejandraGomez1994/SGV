<?php
class GeneroID
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

          

      public static function ListarGeneroID()
	{
		$listaGenero =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM genero');

		foreach ($sql->fetchAll() as $raza) {
         
         $listaGenero[]= new GeneroID($raza['id_genero'],$raza['descripcion']);
      }
		return $listaGenero;
    }
    
    public static function RegistrarTiempo($tiempo)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO tiempo (id_tiempo,descripcion) VALUES('$tiempo->id','$tiempo->descripcion')");
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
      
		$listaTiempo[]= new TiempoID($tiempo['id_tiempo'],$tiempo['descripcion']);
      return $listaTiempo;
      
    }


   }

?>

