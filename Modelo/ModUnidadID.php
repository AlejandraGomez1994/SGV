<?php
class UnidadID
{
 
   private $id;
   private $descripcion;
  
   public function __construct($id,$descripcion)
   {
   $this->id=$id;
   $this->descripcion=$descripcion;
  
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

          

      public static function ListarUnidadID()
	{
		$listaUnidadID =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM unidades');

		foreach ($sql->fetchAll() as $unidad) {
         
         $listaUnidadID[]= new UnidadID($unidad['id_unidad'],$unidad['descripcion']);
      }
		return $listaUnidadID;
    }
    
    public static function RegistrarUnidad($unidad)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO unidades (descripcion) VALUES('$unidad->descripcion')");
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

   public static function BuscarTiempo($descripcion)
	{
		$listaTiempo=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM unidades WHERE =$descripcion");

		//asignarlo al objeto producto
      $tiempo=$sql->fetch();
      
		$listaTiempo[]= new UnidadID($tiempo['descripcion']);
      return $listaTiempo;
      
    }


   }

?>

