<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <title>Admin - Login - sgv</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <body> 
<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
class Usuario
{
    //const SALT = 'EstoEsUnSalt';
    private $identificacion;
    private $nombres;
    private $email;
    private $clave;

    public function __construct($identificacion,$nombres,$email,$clave)
    {
        $this->identificacion = $identificacion;
        $this->nombres = $nombres;
        $this->email = $email;
        $this->clave = $clave;
    }
    public function setIdentificacion($identificacion)
	{
		$this->identificacion=$identificacion;
    }
    public function setNombres($nombres)
    {
        $this->nombres=$nombres;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function setClave($clave)
    {
        $this->clave=$clave;
    }
    public function getIdentificacion()
	{
		return $this->identificacion;
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getClave()
    {
        return $this->clave;
    }

    public static function ValidarUsuario($usuario,$clave)
    {
         
        $db=Db::getConnect();
        $sql=$db->query("SELECT * FROM usuarios WHERE Identificacion=$usuario");
        $CuentaDb=$sql->fetch();
        $contraseña=$CuentaDb['Clave'];
        $password=password_verify($clave,$contraseña);
        if($password)
         {
            //session_start();
            $_SESSION["nombreUsuario"]=$CuentaDb['Nombre'];
            $_SESSION["id"]=$CuentaDb['Identificacion'];
            $_SESSION["Clave"]=$CuentaDb['Clave'];
            return true;
         } 
         else {
          echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong><i class='fa fa-times-circle'></i></strong> Usuario o contraseña incorrectos.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div></div></div>";
        //require_once("Vista/Login.php");
            return false;
         }
    }
     
    
    public static function RegistrarUsuario($usuario)
	{ 
        try {
          
            $db=Db::getConnect();
            $insert=$db->prepare("INSERT INTO usuarios (Identificacion,Nombre,Email,Clave) VALUES('$usuario->identificacion','$usuario->nombres','$usuario->email','$usuario->clave')");
            if($insert->execute())
            {
                echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong><i class='fa fa-check'></i></strong> Registro Exitoso.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div></div></div>";
            }
            
           } catch (Exception $e) {
               
            echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><i class='fa fa-times-circle'></i></strong> El correo electrónico ya fue registrado.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div></div>";
            require_once("Vista/RegistrarUsuario.php");
            die();
            }
         
    }       
    
    public static function ModificarCuenta($listaCuenta)
	{
		$db=Db::getConnect();
		$insert=$db->prepare("UPDATE usuarios SET Nombre='$listaCuenta->nombres',Email='$listaCuenta->email',Clave='$listaCuenta->clave' WHERE Identificacion = $listaCuenta->identificacion");
		 if($insert->execute())
		 {
      echo "<script language='javascript'>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Los datos se guardaron exitosamente.',
        showConfirmButton: false,
        timer: 1500
      });</script>";
			 
		 }
		 else
		 {
			 echo "<script language='javascript'>alert('Los cambios no se guardaron')</script>";
         }
    }
    public static function BuscarCuenta($usuario)
    {
        $listaCuenta=[];
		$db=Db::getConnect();
		$sql=$db->query("SELECT * FROM usuarios WHERE Identificacion=$usuario");

		//asignarlo al objeto producto
		$CuentaDb=$sql->fetch();
		$Cuenta= new Usuario($CuentaDb['Identificacion'],$CuentaDb['Nombre'],$CuentaDb['Email'],$CuentaDb['Clave']);
        return $Cuenta;
    } 
    
    public static function validarcorreo($correo)
    { 
      $db=Db::getConnect();
      $sql=$db->query("SELECT * FROM usuarios WHERE Email='$correo'");
      $cuenta=$sql->fetch();
      $email=$cuenta['Email'];
      $nombre=$cuenta['Nombre'];
      if($cuenta > 0)
      { 
          $mail = new PHPMailer(true);
        try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'mundoanimalsgv@gmail.com';                     // SMTP username
                $mail->Password   = 'mundoanimalsgv2019';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

               //Recipients
               $mail->setFrom('mundoanimalsgv@gmail.com', 'MundoAnimalPetCare');
               $mail->addAddress($correo, $nombre);     // Add a recipient
    

               // Attachments
               //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
               $mail->addAttachment('img/logo.png','Mundo Animal Pet Care');    // Optional name

               // Content
               $mail->isHTML(true);                                  // Set email format to HTML
               $mail->Subject = 'Recuperar Clave';
               $mail->Body  = " ";
               $identificacion=$cuenta['Identificacion'];               
               $mail->MsgHTML("
               <html>
               <body>
               {$nombre}, para recuperar su contraseña por favor ingrese al siguiente link:
                <br>
               <a href=http://localhost:91/MundoAnimalPetCare(Unificado)/?cambiarclave&id=$identificacion>Cambiar Contraseña.</a>
               </body>
               </html>");
              $mail->send();
              
              echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-success alert-dismissible fade show' role='alert'>
               <strong><i class='far fa-envelope-open'></i></strong> {$nombre}, por favor ingresa a {$correo} para recuperar la contraseña.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div></div></div>";
               require_once("Vista/login.php"); 
             
            } catch (Exception $e) {
             echo "Mensaje no enviado: {$mail->ErrorInfo}";
             require_once("Vista/login.php");
           }    
         }
    
      else {
        # code...
        echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong><i class='fa fa-times-circle'></i></strong> El correo ingresado no se encuentra en la base de datos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div></div>";
      require_once("Vista/RecuperarCuenta.php");
      }
  }
    public static function cambioclave($cambio)
    {
      try{
      $db=Db::getConnect();
      $insert=$db->prepare("UPDATE usuarios SET Nombre= '$cambio->nombres', Email='$cambio->email',Clave='$cambio->clave' WHERE Identificacion=$cambio->identificacion");
      if($insert->execute())
      {
        echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong><i class='fa fa-check'></i></strong> Los datos se guardaron correctamente.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div></div>";
      require_once("Vista/login.php");
       
       
      }
      else {
        echo "<br><div align='center'><div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong><i class='fa fa-times-circle'></i></strong> Error al guardar cambios.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div></div>";
      
          
      }
    }
    catch (Exception $e){
     echo $e;
    }
  }
  public static function claveAntigua($clave,$usuario)
  {
    $db=Db::GetConnect();
    $sql=$db->query("SELECT * FROM usuarios WHERE Identificacion=$usuario ");
    $cuenta=$sql->fetch();
    $contraseña=$cuenta['Clave'];
    $password=password_verify($clave,$contraseña);
    if ($password) {
      return true;
    }
    else {
      return false;
    }
  }
  public static function validar_clave($clave){
    if(strlen($clave) < 8){
       $error_clave = "La clave debe tener al menos 8 caracteres";
       return false;
    }
    if(strlen($clave) > 10){
       $error_clave = "La clave no puede tener más de 10 caracteres";
       return false;
    }
    if (!preg_match('`[a-z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra minúscula";
       return false;
    }
    if (!preg_match('`[A-Z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra mayúscula";
       return false;
    }
    if (!preg_match('`[0-9]`',$clave)){
       $error_clave = "La clave debe tener al menos un caracter numérico";
       return false;
    }
    $error_clave = "";
    return true;
 }
  }
?>
 <!-- Bootstrap core JavaScript-->
 <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>



