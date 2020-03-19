
<?php
  class Cliente
  {
      private $idCliente;
      private $nomCliente;
      private $apellido;
      private $telefono;
      private $celular;
      private $email;
      private $municipio;
      private $direccion;

      public function __construct($idCliente,$nomCliente,$apellido,$telefono,$celular,$email,$municipio,$direccion)
      {
          $this->idCliente = $idCliente;
          $this->nomCliente =$nomCliente;
          $this->apellido = $apellido;
          $this->telefono = $telefono;
          $this->celular = $celular;
          $this->email = $email;
          $this->municipio = $municipio;
          $this->direccion = $direccion;
      }
      public function setIdCliente($idCliente)
	{
		$this->idCliente=$idCliente;
    }
    public function setNomCliente($nomCliente)
    {
        $this->nomCliente=$nomCliente;
    }
    public function setApellido($apellido)
    {
        $this->apellido=$apellido;
    }
    public function setTelefono($telefono)
    {
        $this->telefono=$telefono;
    }
    public function setCelular($celular)
    {
        $this->celular=$celular;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function setMunicipio($municipio)
    {
        $this->municipio=$municipio;
    }
    public function setDireccion($direccion)
    {
        $this->direccion=$direccion;
    }
    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function getNomCliente()
    {
        return $this->nomCliente;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public static function ListarCliente()
	{
		$listaCliente =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM clientes');

		foreach ($sql->fetchAll() as $Cliente) {
			$listaCliente[]= new Cliente($Cliente['IdCliente'],$Cliente['NomCliente'],$Cliente['apellido'],$Cliente['Telefono'],$Cliente['celular'],$Cliente['Email'],$Cliente['Municipio'],$Cliente['Direccion']);
		}
		return $listaCliente;
    }
    public static function RegistrarCliente($cliente)
	{        
		$db=Db::getConnect();
        $insert=$db->prepare("INSERT INTO clientes (IdCliente,NomCliente,apellido,Telefono,celular,Email,Municipio,Direccion) VALUES('$cliente->idCliente','$cliente->nomCliente','$cliente->apellido','$cliente->telefono','$cliente->celular','$cliente->email','$cliente->municipio','$cliente->direccion')");
		 if($insert->execute())
		 {             
            echo "<script language='javascript'>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registro exitoso',
                showConfirmButton: false,
                timer: 1500
              });</script>";

        }
        else
        {
            echo "<script language='javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Registro no exitoso',
              });</script>";
        }
  }
  public static function BuscarClienteId($cliente)
	{
		$listaCliente=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT * FROM clientes WHERE IdCliente=$cliente");
        foreach ($sql->fetchAll() as $clienteDb)
        {
            $listaCliente[]= new Cliente($clienteDb['IdCliente'],$clienteDb['NomCliente'],$clienteDb['apellido'],$clienteDb['Telefono'],$clienteDb['celular'],$clienteDb['Email'],$clienteDb['Municipio'],$clienteDb['Direccion']);
        }  
        return $listaCliente;
    }
    public static function BuscarClienteNombre($cliente)
	{
		$listaCliente=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT * FROM clientes WHERE NomCliente LIKE '$cliente%'");
        foreach ($sql->fetchAll() as $clienteDb)
        {
            $listaCliente[]= new Cliente($clienteDb['IdCliente'],$clienteDb['NomCliente'],$clienteDb['apellido'],$clienteDb['Telefono'],$clienteDb['celular'],$clienteDb['Email'],$clienteDb['Municipio'],$clienteDb['Direccion']);
        }  
        return $listaCliente;
    }
    public static function BuscarClienteApellido($cliente)
	{
		$listaCliente=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT * FROM clientes WHERE apellido LIKE '$cliente%'");
        foreach ($sql->fetchAll() as $clienteDb)
        {
            $listaCliente[]= new Cliente($clienteDb['IdCliente'],$clienteDb['NomCliente'],$clienteDb['apellido'],$clienteDb['Telefono'],$clienteDb['celular'],$clienteDb['Email'],$clienteDb['Municipio'],$clienteDb['Direccion']);
        }  
        return $listaCliente;
    }
    public static function BuscarCliente($cliente)
	{
		
		$db=Db::getConnect();
        $sql=$db->query("SELECT * FROM clientes WHERE IdCliente=$cliente");
        $clienteDb=$sql->fetch();
            $listaCliente= new Cliente($clienteDb['IdCliente'],$clienteDb['NomCliente'],$clienteDb['apellido'],$clienteDb['Telefono'],$clienteDb['celular'],$clienteDb['Email'],$clienteDb['Municipio'],$clienteDb['Direccion']);  
        return $listaCliente;
    }
    public static function BuscarClienteMunicipio($cliente)
	{
		$listaCliente=[];
		$db=Db::getConnect();
        $sql=$db->query("SELECT * FROM clientes WHERE Municipio LIKE '$cliente%'");
        foreach ($sql->fetchAll() as $clienteDb)
        {
            $listaCliente[]= new Cliente($clienteDb['IdCliente'],$clienteDb['NomCliente'],$clienteDb['apellido'],$clienteDb['Telefono'],$clienteDb['celular'],$clienteDb['Email'],$clienteDb['Municipio'],$clienteDb['Direccion']);
        }  
        return $listaCliente;
    }
    public static function ModificarCliente($cliente)
	{
		$db=Db::getConnect();
		$insert=$db->prepare("UPDATE clientes SET IdCliente='$cliente->idCliente', NomCliente='$cliente->nomCliente', apellido='$cliente->apellido',Telefono='$cliente->telefono',celular='$cliente->celular',Email='$cliente->email',Municipio='$cliente->municipio',Direccion='$cliente->direccion'	WHERE IdCliente = $cliente->idCliente");
		 if($insert->execute())
		 {
            echo "<script language='javascript'>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Los datos se modificaron exitosamente',
                showConfirmButton: false,
                timer: 1500
              });</script>";
              //header("Location:?Controlador=Controlador&action4=ListarCliente");
		 }
		 else
		 {
            echo "<script language='javascript'>alert('Los cambios no se guardaron')</script>";
		 }
    }
}
?>
