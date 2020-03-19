<?php
class DatosGenerales
{
   //private $idDatos;
   private $idCliente;
   private $id;
   private $nomMascota;
   private $alimentacion;
   private $cant;
   private $frecuencia;
   private $pesoInicial;
   private $pesoActual;
   private $vacunacion;
   private $alergias;
   private $desparacitacion;
   private $enfermedades;
   private $cirugias;
   private $otro;
   //private $esterilizacion;

   public function __construct($id,$alimentacion,$cant,$frecuencia,$pesoInicial,$pesoActual,$vacunacion,$alergias,$desparacitacion,$enfermedades,$cirugias,$otro)
   {

   //$this->idDatos=$idDatos;
   //$this->idCliente=$idCliente;
   $this->id=$id;
   $this->otro=$otro;
  // $this->nomMascota=$nomMascota;
   $this->alimentacion=$alimentacion;
   $this->cant=$cant;
   $this->frecuencia=$frecuencia;
   $this->pesoInicial=$pesoInicial;
   $this->pesoActual=$pesoActual;
   $this->vacunacion=$vacunacion;
   $this->alergias=$alergias;
   $this->desparacitacion=$desparacitacion;
   $this->enfermedades=$enfermedades;
   $this->cirugias=$cirugias;
   //$this->$esterilizacion=$esterilizacion;
   }

   public function setIdDatos($idDatos)
   {
      $this->idDatos=$idDatos;
   }
   public function setIdCliente($idCliente)
   {
      $this->idCliente=$idCliente;
   }
   public function setId($id)
   {
      $this->id=$id;
   }
   public function setOtro($otro)
   {
      $this->otro=$otro;
   }
   public function setNomMascota($nomMascota)
   {
      $this->nomMascota=$nomMascota;
   }
   public function setAlimentacion($alimentacion)
   {
      $this->alimentacion=$alimentacion;
   }
   public function setCant($cant)
   {
      $this->cant=$cant;
   }
   public function setFrecuencia($frecuencia)
   {
      $this->frecuencia=$frecuencia;
   }
   public function setPesoInicial($pesoInicial)
   {
      $this->pesoInicial=$pesoInicial;
   }
   public function setPesoActual($pesoActual)
   {
      $this->pesoActual=$pesoActual;
   }
   public function setVacunacion($vacunacion)
   {
      $this->vacunacion=$vacunacion;
   }
   public function setAlergias($alergias)
   {
      $this->alergias=$alergias;
   }
   public function setDesparacitacion($desparacitacion)
   {
      $this->desparacitacion=$desparacitacion;
   }
   public function setEnfermedades($enfermedades)
   {
      $this->enfermedades=$enfermedades;
   }
   public function setCirugias($cirugias)
   {
      $this->cirugias=$cirugias;
   }



   public function getIdDatos()
   {
      return $this->idDatos;
   }
   public function getIdCliente()
   {
      return $this->idCliente;
   }
   public function getId()
   {
      return $this->id;
   }
   public function getOtro()
   {
      return $this->otro;
   }
   public function getNomMascota()
   {
      return $this->nomMascota;
   }
   public function getAlimentacion()
   {
      return $this->alimentacion;
   }
   public function getCant()
   {
      return $this->cant;
   }
   public function getFrecuencia()
   {
      return $this->frecuencia;
   }
   public function getPesoInicial()
   {
      return $this->pesoInicial;
   }
   public function getPesoActual()
   {
      return $this->pesoActual;
   }
   public function getVacunacion()
   {
      return $this->vacunacion;
   }
   public function getAlergias()
   {
      return $this->alergias;
   }
   public function getDesparacitacion()
   {
      return $this->desparacitacion;
   }
   public function getEnfermedades()
   {
      return $this->enfermedades;
   }
   public function getCirugias()
   {
      return $this->cirugias;
   }



      public static function ListarDatos()
	{
		$listaDatos =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM datos');

		foreach ($sql->fetchAll() as $datos) {
         $listaDatos[]= new DatosGenerales($datos['id_consulta'],$datos['esterilizacion'],$datos['alimentacion'],$datos['cant'],$datos['frecuencia'],$datos['pesoInicial'],$datos['pesoActual'],$datos['vacunacion'],$datos['alergias'],$datos['desparacitacion'],$datos['enfermedades'],$datos['cirugias']);
      }
		return $listaDatos;
    }

    public static function RegistrarDatos($datos)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO datos (id_consulta,alimentacion,cant,frecuencia,pesoInicial,pesoActual,vacunacion,alergias,desparacitacion,enfermedades,cirugias,esterilizacion) VALUES('$datos->id','$datos->alimentacion','$datos->cant','$datos->frecuencia','$datos->pesoInicial','$datos->pesoActual','$datos->vacunacion','$datos->alergias','$datos->desparacitacion','$datos->enfermedades','$datos->cirugias','$datos->otro')");
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

   public static function BuscarDatos($idCliente,$nomMascota)
    {
       
       
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM datos WHERE id_cliente=$idCliente AND NomMascota='$nomMascota'");
       $datos=$sql->fetch();
       $listaDatos= new DatosGenerales($datos['id_cliente'],$datos['esterilizacion'],$datos['NomMascota'],$datos['alimentacion'],$datos['cant'],$datos['frecuencia'],$datos['pesoInicial'],$datos['pesoActual'],$datos['vacunacion'],$datos['alergias'],$datos['desparacitacion'],$datos['enfermedades'],$datos['cirugias']);

      return $listaDatos;      
   }

   public static function ModificarDatos($datos)
	{
      try{  
		$db=Db::getConnect();
      $insert=$db->prepare("UPDATE datos SET id_cliente='$datos->idCliente', NomMascota='$datos->nomMascota',alimentacion='$datos->alimentacion',cant='$datos->cant',frecuencia='$datos->frecuencia',pesoInicial='$datos->pesoInicial',pesoActual='$datos->pesoActual',vacunacion='$datos->vacunacion',alergias='$datos->alergias',desparacitacion='$datos->desparacitacion',enfermedades='$datos->enfermedades',cirugias='$datos->cirugias',esterilizacion='$datos->otro'	WHERE id_cliente = $datos->idCliente AND NomMascota='$datos->nomMascota'");
		if($insert->execute())
         {
         //header("location:?registrarvaloracion");
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

