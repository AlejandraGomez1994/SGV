<?php
class Valoracion
{
   //private $idCliente;
   private $idConsulta;
   //private $nomMascota;
   private $temperatura;
   private $deshidratacion;
   private $pulso;
   private $fc;
   private $fr;
   private $tllc;
   private $cc;
   private $otro;
   private $actitud;
   private $hidratacion;
   private $nutricion;
   private $ganglios;
   private $m_mucosa;
   private $esqueletico;
   private $nervioso;
   private $s_digestivo;
   private $sentidos;
   private $piel_anexos;


   public function __construct($idConsulta,$temperatura,$deshidratacion,$pulso,$fc,$fr,$tllc,$cc,$otro,$actitud,$hidratacion,$nutricion,$ganglios,$m_mucosa,$esqueletico,$nervioso,$s_digestivo,$sentidos,$piel_anexos)
   {
   //$this->idCliente=$idCliente;
   $this->idConsulta=$idConsulta;
   //$this->nomMascota=$nomMascota;
   $this->temperatura=$temperatura;
   $this->deshidratacion=$deshidratacion;
   $this->pulso=$pulso;
   $this->fc=$fc;
   $this->fr=$fr;
   $this->tllc=$tllc;
   $this->cc=$cc;
   $this->otro=$otro;
   $this->actitud=$actitud;
   $this->hidratacion=$hidratacion;
   $this->nutricion=$nutricion;
   $this->ganglios=$ganglios;
   $this->m_mucosa=$m_mucosa;
   $this->esqueletico=$esqueletico;
   $this->nervioso=$nervioso;
   $this->s_digestivo=$s_digestivo;
   $this->sentidos=$sentidos;
   $this->piel_anexos=$piel_anexos;
   }
   
      public function setIdCliente($idCliente)
      {
         $this->idCliente=$idCliente;
      }
      public function setIdConsulta($idConsulta)
      {
         $this->idConsulta=$idConsulta;
      }
      public function setNomMascota($nomMascota)
      {
         $this->nomMascota=$nomMascota;
      }
      public function setTemperatura($temperatura)
      {
         $this->temperatura=$temperatura;
      }
      public function setDeshidratacion($deshidratacion)
      {
         $this->deshidratacion=$deshidratacion;
      } 
      public function setPulso($pulso)
      {
         $this->pulso=$pulso;
      }
      public function setFc($fc)
      {
         $this->fc=$fc;
      }
      public function setFr($fr)
      {
         $this->fr=$fr;
      } 
      public function setTllc($tllc)
      {
         $this->tllc=$tllc;
      } 
      public function setCc($cc)
      {
         $this->cc=$cc;
      } 
      public function setOtro($otro)
      {
         $this->otro=$otro;
      }
      public function setActitud($actitud)
      {
         $this->actitud=$actitud;
      } 
      public function setHidratacion($hidratacion)
      {
         $this->hidratacion=$hidratacion;
      }
      public function setNutricion($nutricion)
      {
         $this->nutricion=$nutricion;
      } 
      public function setGlanglios($ganglios)
      {
         $this->ganglios=$ganglios;
      } 
      public function setMucosa($m_mucosa)
      {
         $this->m_mucosa=$m_mucosa;
      } 
      public function setEsqueletico($esqueletico)
      {
         $this->esqueletico=$esqueletico;
      } 
      public function setNervioso($nervioso)
      {
         $this->nervioso=$nervioso;
      } 
      public function setDigestivo($s_digestivo)
      {
         $this->s_digestivo=$s_digestivo;
      }
      public function setSentidos($sentidos)
      {
         $this->sentidos=$sentidos;
      }  
      public function setPielAnexos($piel_anexos)
      {
         $this->piel_anexos=$piel_anexos;
      }

      public function getIdCliente()
      {
         return $this->idCliente;
      }
      public function getIdConsulta()
      {
         return $this->idConsulta;
      }
      public function getNomMascota()
      {
         return $this->nomMascota;
      }
      public function getTemperatura()
      {
         return $this->temperatura;
      }
      public function getDeshidratacion()
      {
         return $this->deshidratacion;
      } 
      public function getPulso()
      {
         return $this->pulso;
      }
      public function getFc()
      {
         return $this->fc;
      }
      public function getFr()
      {
         return $this->fr;
      } 
      public function getTllc()
      {
         return $this->tllc;
      } 
      public function getCc()
      {
         return $this->cc;
      } 
      public function getOtro()
      {
         return $this->otro;
      }
      public function getActitud()
      {
         return $this->actitud;
      } 
      public function getHidratacion()
      {
         return $this->hidratacion;
      }
      public function getNutricion()
      {
         return $this->nutricion;
      } 
      public function getGlanglios()
      {
         return $this->ganglios;
      } 
      public function getMucosa()
      {
         return $this->m_mucosa;
      } 
      public function getEsqueletico()
      {
         return $this->esqueletico;
      } 
      public function getNervioso()
      {
         return $this->nervioso;
      } 
      public function getDigestivo()
      {
         return $this->s_digestivo;
      }
      public function getSentidos()
      {
         return $this->sentidos;
      }  
      public function getPielAnexos()
      {
         return $this->piel_anexos;
      }



      public static function ListarValoracion()
	{
		$listaValoracion =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM valoracion');

		foreach ($sql->fetchAll() as $valoracion) {
         
         $listaValoracion[]= new Valoracion($valoracion['id_consulta'],$valoracion['temperatura'],$valoracion['deshidratacion'],$valoracion['pulso'],$valoracion['fc'],$valoracion['fr'],$valoracion['tllc'],$valoracion['cc'],$valoracion['otro'],$valoracion['actitud'],$valoracion['hidratacion'],$valoracion['nutricion'],$valoracion['ganglios'],$valoracion['m_mucosa'],$valoracion['s_esqueletico'],$valoracion['s_nervioso'],$valoracion['s_digestivo'],$valoracion['sentidos'],$valoracion['piel_anexos']);
      }
		return $listaValoracion;
    }

    public static function RegistrarValoracion($valoracion)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO valoracion (id_consulta,temperatura,deshidratacion,pulso,fc,fr,tllc,cc,otro,actitud,hidratacion,nutricion,ganglios,m_mucosa,s_esqueletico,s_nervioso,s_digestivo,sentidos,piel_anexos) VALUES('$valoracion->idConsulta','$valoracion->temperatura','$valoracion->deshidratacion','$valoracion->pulso','$valoracion->fc','$valoracion->fr','$valoracion->tllc','$valoracion->cc','$valoracion->otro','$valoracion->actitud','$valoracion->hidratacion','$valoracion->nutricion','$valoracion->ganglios','$valoracion->m_mucosa','$valoracion->esqueletico','$valoracion->nervioso','$valoracion->s_digestivo','$valoracion->sentidos','$valoracion->piel_anexos')");
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

