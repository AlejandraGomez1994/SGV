<?php
class ConsultaID
{
   private $id;
   private $fecha;
   private $procedimiento;
   private $veterinario;
   private $cliente;
   private $nomMascota;
  
   public function __construct($id,$fecha,$procedimiento,$veterinario,$cliente,$nomMascota)
   {
   $this->id=$id;
   $this->fecha=$fecha;
   $this->procedimiento=$procedimiento;
   $this->veterinario=$veterinario;
   $this->cliente=$cliente;
   $this->nomMascota=$nomMascota;
  
   }

      public function setId($id)
      {
         $this->id=$id;
      }
      public function setFecha($fecha)
      {
         $this->fecha=$fecha;
      }
      public function setProcedimiento($procedimiento)
      {
         $this->procedimiento=$procedimiento;
      }
      public function setVeterinario($veterinario)
      {
         $this->veterinario=$veterinario;
      }
      public function setCliente($cliente)
      {
         $this->cliente=$cliente;
      }
      public function setNomMascota($nomMascota)
      {
         $this->nomMascota=$nomMascota;
      } 

      public function getId()
      {
         return $this->id;
      }
      public function getFecha()
      {
         return $this->fecha;
      }
      public function getProcedimiento()
      {
         return $this->procedimiento;
      }
      public function getVeterinario()
      {
         return $this->veterinario;
      }
      public function getCliente()
      {
         return $this->cliente;
      } 
      public function getNomMascota()
      {
         return $this->nomMascota;
      } 
      

      public static function ListarConsultaiD()
	{
		$listaConsultaId =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM consultas');

		foreach ($sql->fetchAll() as $consulta) {
         
         $listaConsultaId[]= new ConsultaID($consulta['id_consulta'],$consulta['fecha'],$consulta['procedimiento'],$consulta['id_veterinario'],$consulta['id_cliente'],$consulta['NomMascota']);
      }
		return $listaConsultaId;
    }

   public static function BuscarConsulta($nomMascota)
	{
        $lista=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM consultas WHERE fecha>=CURDATE() AND NomMascota='$nomMascota'");//Modificado por Gomez

	foreach ($sql->fetchAll() as $consulta) {
      $lista[]= new ConsultaID($consulta['id_consulta'],$consulta['fecha'],$consulta['procedimiento'],$consulta['id_veterinario'],$consulta['id_cliente'],$consulta['NomMascota']);
   }      
		
      return $lista;
      
    }


   }

?>

