<?php
class Consulta
{
 
   private $fecha;
   private $procedimiento;
   private $veterinario;
   private $cliente;
   private $nomMascota;
  
   public function __construct($fecha,$procedimiento,$veterinario,$cliente,$nomMascota)
   {
  
   $this->fecha=$fecha;
   $this->procedimiento=$procedimiento;
   $this->veterinario=$veterinario;
   $this->cliente=$cliente;
   $this->nomMascota=$nomMascota;
  
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
      

      public static function ListarConsulta()
	{
		$listaConsulta =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM consultas');

		foreach ($sql->fetchAll() as $consulta) {
         
         $listaConsulta[]= new Consulta($consulta['fecha'],$consulta['procedimiento'],$consulta['id_veterinario'],$consulta['id_cliente'],$consulta['NomMascota']);
      }
		return $listaConsulta;
    }
    
    public static function RegistrarConsulta($consulta)
    {   
       try{     
       $db=Db::getConnect();
         $insert=$db->prepare("INSERT INTO consultas (fecha,procedimiento,id_veterinario,id_cliente,NomMascota) VALUES('$consulta->fecha','$consulta->procedimiento','$consulta->veterinario','$consulta->cliente','$consulta->nomMascota')");
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

   public static function BuscarConsulta($idCliente,$nomMascota)
	{
		$listaBConsulta=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM consultas WHERE IdCliente=$idCliente AND NomMascota='$nomMascota'");

		//asignarlo al objeto producto
      $consulta=$sql->fetch();
      
		$listaBConsulta[]= new Consulta($consulta['fecha'],$consulta['procedimiento'],$consulta['id_veterinario'],$consulta['id_cliente'],$consulta['NomMascota']);
      return $listaBConsulta;
      
    }


   }

?>

