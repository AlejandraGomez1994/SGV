<?php
class Genero
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

          

      public static function ListarEspecie()
	{
		$listaEspecie =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM especie');

		foreach ($sql->fetchAll() as $especie) {
         
         $listaEspecie[]= new Especie($especie['descripcion']);
      }
		return $listaEspecie;
    }
    
    public static function RegistrarGenero($genero)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO genero (descripcion) VALUES('$genero->descripcion')");
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

