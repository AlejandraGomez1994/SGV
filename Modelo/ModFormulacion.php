<?php
class Formulacion
{
   private $consulta;
   private $tratamiento;
   private $cant;
   private $unidad;
   private $cada;
   private $tiempo;

   public function __construct($consulta,$tratamiento,$cant,$unidad,$cada,$tiempo)
   {
   $this->consulta=$consulta;
   $this->tratamiento=$tratamiento;
   $this->cant=$cant;
   $this->unidad=$unidad;
   $this->cada=$cada;
   $this->tiempo=$tiempo;
   }

     
      public function setConsulta($consulta)
      {
         $this->consulta=$consulta;
      }
      public function setTratamiento($tratamiento)
      {
         $this->tratamiento=$tratamiento;
      }
      public function setCantidad($cant)
      {
         $this->cant=$cant;
      }
      public function setUnidad($unidad)
      {
         $this->unidad=$unidad;
      } 
      public function setCada($cada)
      {
         $this->cada=$cada;
      }
      public function setTiempo($tiempo)
      {
         $this->tiempo=$tiempo;
      }

      public function getConsulta()
      {
         return $this->consulta;
      }
      public function getTratamiento()
      {
         return $this->tratamiento;
      }
      public function getCantidad()
      {
         return $this->cant;
      }
      public function getUnidad()
      {
         return $this->unidad;
      }
      public function getCada()
      {
         return $this->cada;
      }
      public function getTiempo()
      {
         return $this->tiempo;
      }
      

      
      public static function ListarMateriales()
      {
         $listaMateriales =[];
         $db=Db::getConnect();
         $sql=$db->query('SELECT * FROM formulacion');
   
         foreach ($sql->fetchAll() as $material) {
            $listaMateriales[]= new Formulacion($material['NomMaterial'],$material['Cant']);
         }
         return $listaMateriales;
       }

       public static function RegistrarFormulacion($formulacion)
      {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO formulacion (id_consulta,tratamiento,cantidad,id_unidad,cada,id_tiempo) VALUES('$formulacion->consulta','$formulacion->tratamiento','$formulacion->cant','$formulacion->unidad',$formulacion->cada,'$formulacion->tiempo')");
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

