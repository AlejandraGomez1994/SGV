<?php
class Unidad
{
 
   private $descripcion;
  
   public function __construct($descripcion)
   {
  
   $this->descripcion=$descripcion;
  
   }

   
      public function setDescripcion($descripcion)
      {
         $this->descripcion=$descripcion;
      }

      public function getDescripcion()
      {
         return $this->descripcion;
      }

          

      public static function ListarUnidad()
	{
		$listaUnidad =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM unidad');

		foreach ($sql->fetchAll() as $unidad) {
         
         $listaUnidad[]= new Unidad($unidad['descripcion']);
      }
		return $listaUnidad;
    }
    
    public static function RegistrarUnidad($unidad)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO unidad (descripcion) VALUES('$unidad->descripcion')");
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

   public static function BuscarUnidad($descripcion)
	{
		$listaUnidad=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM unidad WHERE =$descripcion");

		//asignarlo al objeto producto
      $unidad=$sql->fetch();
      
		$listaUnidad[]= new Unidad($unidad['descripcion']);
      return $listaUnidad;
      
    }


   }

?>

