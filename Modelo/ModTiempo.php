<?php
class Tiempo
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

          

      public static function ListarTiempo()
	{
		$listaTiempo =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM tiempo');

		foreach ($sql->fetchAll() as $tiempo) {
         
         $listaTiempo[]= new Tiempo($tiempo['descripcion']);
      }
		return $listaTiempo;
    }
    
    public static function RegistrarTiempo($tiempo)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO tiempo (descripcion) VALUES('$tiempo->descripcion')");
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
		$sql=$db->query("SELECT * FROM tiempo WHERE =$descripcion");

		//asignarlo al objeto producto
      $tiempo=$sql->fetch();
      
		$listaTiempo[]= new Tiempo($tiempo['descripcion']);
      return $listaTiempo;
      
    }


   }

?>

