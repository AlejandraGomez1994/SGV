<?php 
 class Especialidad
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
     public static function RegistrarEspecialidad($especialidad)
     {   
        try{     
        $db=Db::getConnect();
          $insert=$db->prepare("INSERT INTO especialidad (Descripcion) VALUES('$especialidad->descripcion')");
          if($insert->execute())
          {
            echo "<div align='center'><div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><i class='fa fa-check'></i></strong> Registro exitoso.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div>";
          }
          else
          {
            echo "<div align='center'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><i class='fa fa-times-circle'></i></strong> Registro no exitoso.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div>";
          }
       }catch (Exception $e)
       {
          echo $e->getmessage();
       }
      
      }
 }
?>