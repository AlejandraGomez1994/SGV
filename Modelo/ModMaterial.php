<?php
class Material
{
   //private $id_material;
   private $id;
   private $nomMaterial;
   private $Cant;
   private $Unidad;
   


   public function __construct($id,$nomMaterial,$Cant,$Unidad)
   {
   //$this->id_material=$id_material;
   $this->id=$id;
   $this->nomMaterial=$nomMaterial;
   $this->Cant=$Cant;
   $this->Unidad=$Unidad;
   }

     
      public function setNomMaterial($nomMaterial)
      {
         $this->nomMaterial=$nomMaterial;
      }
      public function setCant($Cant)
      {
         $this->Cant=$Cant;
      }
      public function setId($id)
      {
         $this->id=$id;
      }
      public function setUnidad($Unidad)
      {
         $this->Unidad=$Unidad;
      }

     
      public function getNomMaterial()
      {
         return $this->nomMaterial;
      }
      public function getCant()
      {
         return $this->Cant;
      }
      public function getId()
      {
         return $this->id;
      }
      public function getUnidad()
      {
         return $this->Unidad;
      }

      public static function ListarMateriales()
      {
         $listaMateriales =[];
         $db=Db::getConnect();
         $sql=$db->query("SELECT * FROM materiales");
   
         foreach ($sql->fetchAll() as $material) {
            $listaMateriales[]= new Material($material['id_consulta'],$material['NomMaterial'],$material['Cant'],$material['id_unidad']);
         }
         return $listaMateriales;
       }

      public static function ListarMaterialesID($id)
      {
         $listaMaterialesID =[];
         $db=Db::getConnect();
         $sql=$db->query("SELECT * FROM materiales WHERE id_consulta='$id'");
   
         foreach ($sql->fetchAll() as $material) {
            $listaMaterialesID[]= new Material($material['id_consulta'],$material['NomMaterial'],$material['Cant'],$material['id_unidad']);
         }
         return $listaMaterialesID;
       }

       public static function RegistrarMaterial($material)
      {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO materiales (id_consulta,NomMaterial,Cant,id_unidad) VALUES('$material->id','$material->nomMaterial','$material->Cant','$material->Unidad')");
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

 

}

?>

