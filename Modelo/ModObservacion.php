<?php
class Observacion
{
   private $idCliente;
   private $nomMascota;
   private $idConsulta;
   private $cuidados;
   private $observaciones;
   
   public function __construct($idCliente,$nomMascota,$idConsulta,$cuidados,$observaciones)
   {
   $this->idCliente=$idCliente;
   $this->nomMascota=$nomMascota;
   $this->idConsulta=$idConsulta;
   $this->cuidados=$cuidados;
   $this->observaciones=$observaciones;
   }
    
      public function setIdCliente($idCliente)
      {
         $this->idCliente=$idCliente;
      }
      public function setNomMascota($nomMascota)
      {
         $this->nomMascota=$nomMascota;
      }
      public function setIdConsulta($idConsulta)
      {
         $this->idConsulta=$idConsulta;
      }
      public function setCuidados($cuidados)
      {
         $this->cuidados=$cuidados;
      }
      public function setObservaciones($problemas)
      {
         $this->observaciones=$observaciones;
      } 
      public function setProblemas($problemas)
      {
         $this->problemas=$problemas;
      }
      public function setDifereciales($diagDiferenciales)
      {
         $this->diagDiferenciales=$diagDiferenciales;
      }
      public function setPresuntivos($diagPresuntivos)
      {
         $this->diagPresuntivos=$diagPresuntivos;
      } 
      public function setExamenes($examenes)
      {
         $this->examenes=$examenes;
      } 
      public function setFinal($diagFinal)
      {
         $this->diagFinal=$diagFinal;
      } 

      public function getIdConsulta()
      {
         return $this->idConsulta;
      }
      public function getIdCliente()
      {
         return $this->idCliente;
      }
      public function getNomMascota()
      {
         return $this->nomMascota;
      }
      public function getAnamnesis()
      {
         return $this->anamnesis;
      }
      public function getHallazgos()
      {
         return $this->hallazgos;
      } 
      public function getProblemas()
      {
         return $this->problemas;
      }
      public function getDifereciales()
      {
         return $this->diagDiferenciales;
      }
      public function getPresuntivos()
      {
         return $this->diagPresuntivos;
      } 
      public function getExamenes()
      {
         return $this->examenes;
      } 
      public function getFinal()
      {
         return $this->diagFinal;
      } 

      public static function ListarDiagnostico()
	{
		$listaDiagnostico =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM diagnosticos');

		foreach ($sql->fetchAll() as $diagnostico) {
         
         $listaDiagnostico[]= new Diagnostico($diagnostico['id_consulta'],$diagnostico['IdCliente'],$diagnostico['NomMascota'],$diagnostico[''],$diagnostico[''],$diagnostico[''],$diagnostico[''],$diagnostico[''],$diagnostico[''],$diagnostico[''],$diagnostico['']);
      }
		return $listaDiagnostico;
    }

    public static function RegistrarDiagnostico($diagnostico)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO diagnosticos (id_consulta,id_cliente,NomMascota,anamnesis,hallazgos,problemas,diag_diferenciales,diag_presuntivos,examenes,diag_final) VALUES('$diagnostico->idConsulta','$diagnostico->idCliente','$diagnostico->nomMascota','$diagnostico->anamnesis','$diagnostico->hallazgos','$diagnostico->problemas','$diagnostico->diagDiferenciales','$diagnostico->diagPresuntivos','$diagnostico->examenes','$diagnostico->diagFinal')");
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

   public static function BuscarValoracion($idCliente,$nomMascota)
    {   
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM valoracion WHERE IdCliente=$idCliente AND NomMascota='$nomMascota'");
       $v=$sql->fetch();
       $listaValoracion= new Valoracion($v['IdCliente'],$v['id_consulta'],$v['NomMascota'],$v['temperatura'],$v['deshidratacion'],$v['pulso'],$v['fc'],$v['fr'],$v['tllc'],$v['cc'],$v['otro'],$v['actitud'],$v['hidratacion'],$v['nutricion'],$v['ganglios'],$v['m_mucosa'],$v['s_esqueletico'],$v['s_nervioso'],$v['s_digestivo'],$v['sentidos'],$v['piel_anexos']);

      return $listaValoracion;      
   }

   
   public static function ModificarDatos($datos)
	{
      try{  
		$db=Db::getConnect();
      $insert=$db->prepare("UPDATE datos SET id_cliente='$datos->idCliente',id_consulta='$datos->idConsulta', NomMascota='$datos->nomMascota',alimentacion='$datos->alimentacion',cant='$datos->cant',frecuencia='$datos->frecuencia',pesoInicial='$datos->pesoInicial',pesoActual='$datos->pesoActual',vacunacion='$datos->vacunacion',alergias='$datos->alergias',desparacitacion='$datos->desparacitacion',enfermedades='$datos->enfermedades',cirugias='$datos->cirugias',esterilizacion='$datos->otro'	WHERE id_cliente = $datos->idCliente AND NomMascota='$datos->nomMascota'");
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

    public static function ValidarDatos($idCliente,$nomMascota)
    {
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM datos WHERE id_cliente=$idCliente AND NomMascota='$nomMascota'");
       if($sql->fetch() > 0)
       {
          return true;
       }
       else{
          return false;
       }
    }
   }

?>

