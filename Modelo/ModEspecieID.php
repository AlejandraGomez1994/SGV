<?php
class EspecieID
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

          

      public static function ListarEspecieID()
	{
		$listaEspecie =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM especie');

		foreach ($sql->fetchAll() as $especie) {
         
         $listaEspecie[]= new EspecieID($especie['id_especie'],$especie['descripcion']);
      }
		return $listaEspecie;
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

   public static function BuscarEspecie($id)
	{
		$listaEspecie=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM especie WHERE =$id");

		//asignarlo al objeto producto
      $especie=$sql->fetch();
      
		$listaEspecie[]= new EspecieID($especie['id_especie'],$especie['descripcion']);
      return $listaEspecie;
      
    }


   }

?>

