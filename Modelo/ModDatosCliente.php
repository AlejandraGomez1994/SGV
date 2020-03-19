<?php
class DatosCliente
{
   //private $idDatos;
   private $idCliente;
   private $NomCliente;
   private $otro;
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
   //private $esterilizacion;

   public function __construct($idCliente,$NomCliente,$otro,$nomMascota,$alimentacion,$cant,$frecuencia,$pesoInicial,$pesoActual,$vacunacion,$alergias,$desparacitacion,$enfermedades,$cirugias)
   {

   //$this->idDatos=$idDatos;
   $this->idCliente=$idCliente;
   $this->NomCliente=$NomCliente;
   $this->otro=$otro;
   $this->nomMascota=$nomMascota;
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
   public function setNomCliente($NomCliente)
   {
      $this->NomCliente=$NomCliente;
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
   public function getNomCliente()
   {
      return $this->NomCliente;
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



      public static function ListarDatosCliente()
	{
		$listaDatosCliente =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT d.id_cliente,c.NomCliente,d.NomMascota,d.alimentacion,d.cant,d.frecuencia,d.pesoInicial,d.pesoActual,d.vacunacion,d.alergias,d.desparacitacion,d.enfermedades,d.cirugias,d.esterilizacion from datos d JOIN clientes c ON(d.id_cliente = c.IdCliente)');

		foreach ($sql->fetchAll() as $datos) {
         $listaDatosCliente[]= new DatosCliente($datos['id_cliente'],$datos['NomCliente'],$datos['esterilizacion'],$datos['NomMascota'],$datos['alimentacion'],$datos['cant'],$datos['frecuencia'],$datos['pesoInicial'],$datos['pesoActual'],$datos['vacunacion'],$datos['alergias'],$datos['desparacitacion'],$datos['enfermedades'],$datos['cirugias']);
      }
		return $listaDatosCliente;
    }


}

?>

