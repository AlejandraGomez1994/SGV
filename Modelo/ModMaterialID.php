<?php
class MaterialID
{
 //  private $material;
   private $id;
   private $nomMaterial;
   private $Cant;
   private $Unidad;
   private $otro;


   public function __construct($id,$nomMaterial,$Cant,$Unidad,$otro)
   {
  // $this->material=$material;
   $this->id=$id;
   $this->nomMaterial=$nomMaterial;
   $this->Cant=$Cant;
   $this->Unidad=$Unidad;
   $this->otro=$otro;
   }

      
      public function setId($id)
      {
         $this->id=$id;
      }
      public function setNomMaterial($nomMaterial)
      {
         $this->nomMaterial=$nomMaterial;
      }
      public function setCant($Cant)
      {
         $this->Cant=$Cant;
      }    
      public function setUnidad($Unidad)
      {
         $this->Unidad=$Unidad;
      }
      public function setOtro($otro)
      {
         $this->otro=$otro;
      }

     
      public function getId()
      {
         return $this->id;
      }
      public function getNomMaterial()
      {
         return $this->nomMaterial;
      }
      public function getCant()
      {
         return $this->Cant;
      }
      public function getUnidad()
      {
         return $this->Unidad;
      }
      public function getOtro()
      {
         return $this->otro;
      }

      public static function ListarMaterialesID($nomMaterial)
      {
         $listaMaterialesID =[];
         $db=Db::getConnect();
         $sql=$db->query("SELECT * FROM materiales WHERE id_consulta='$nomMaterial'");
   
         foreach ($sql->fetchAll() as $material) {
            $listaMaterialesID[]= new Material($material['idMaterial'],$material['id_consulta'],$material['NomMaterial'],$material['Cant'],$material['id_unidad']);
         }
         return $listaMaterialesID;
       }
     
   public static function EliminarMaterial($id)
	{
		$db=Db::getConnect();
		$insert=$db->prepare("DELETE FROM materiales WHERE idMaterial='$id'");
		if($insert->execute())
		{
			echo "Se elimino correctamente";
		}
		else
		{ 
            echo "Vaya! ocurrio un error y no se pudo eliminar";
		}
	}

}

?>

