<?php
    class  TipoCita
    {
        private  $idEspecialidad;
        private  $descripcion;
        public function __construct($idEspecialidad,$descripcion)
        {
            $this->idEspecialidad=$idEspecialidad;
            $this->descripcion=$descripcion;
        }
        public function setIdEspecialidad($idEspecialidad)
        {
          $this->idEspecialidad=$idEspecialidad;
        }
        public function setDescripcion($descripcion)
        {
            $this->descripcion=$descripcion;
        }
        public function  getIdEspecialidad()
        {
            return $this->idEspecialidad;
        }
        public function getDescripcion()
        {
            return $this->descripcion;
        }
        public static function ListarTipoCita()
        {
          $listatipocita=[];
          $db=Db::getConnect();
          $sql=$db->query("SELECT * FROM tipocitas ORDER BY DescripcionTipoCita ASC");
          foreach ($sql->fetchAll() as $tipocitadb) {
            $listatipocita[]=new TipoCita($tipocitadb['IdEspecialidad'],$tipocitadb['DescripcionTipoCita']);
          }
          return $listatipocita;
        }
        public static function RegistrarTipocita($tipoCita)
        {   
           try{     
           $db=Db::getConnect();
             $insert=$db->prepare("INSERT INTO tipocitas (IdEspecialidad,DescripcionTipoCita) VALUES($tipoCita->idEspecialidad,'$tipoCita->descripcion')");
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
       public static function idEspecialidad($descripcion)
       {
        $db=Db::getConnect();
        $sql=$db->query("SELECT IdEspecialidad FROM tipocitas WHERE DescripcionTipoCita='$descripcion'");
        $aux=$sql->fetch();
        $idEspecialidad=$aux['IdEspecialidad'];
        return $idEspecialidad;
       }
       
    }
?>