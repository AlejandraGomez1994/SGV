
 <?php
 use PHPMailer\PHPMailer\PHPMailer;
 //use PHPMailer\PHPMailer\Exception;
 
 //require 'phpmailer/Exception.php';
 require 'phpmailer/PHPMailerN.php';
 require 'phpmailer/SMTPN.php';
 class Citas
 {
  private $idCliente;
  private $idEmpleado;
  private $idTipoCita;
  private $nomMascota;
  private $fecha;
  private $hora;

  public function __construct($idCliente,$idEmpleado,$idTipoCita,$nomMascota,$fecha,$hora)
  {
      $this->idCliente = $idCliente;
      $this->idEmpleado =$idEmpleado;
      $this->idTipoCita=$idTipoCita;
      $this->nomMascota = $nomMascota;
      $this->fecha = $fecha;
      $this->hora = $hora;
  }
  public function setIdCliente($idCliente)
{
$this->idCliente=$idCliente;
}
public function setIdEmpleado($idEmpleado)
{
    $this->idEmpleado=$idEmpleado;
}
public function setIdTipoCita($idTipoCita)
{
  $this->idTipoCita=$idTipoCita;
}
public function setNomMascota($nomMascota)
{
    $this->nomMascota=$nomMascota;
}
public function setFecha($fecha)
{
    $this->fecha=$fecha;
}
public function setHora($hora)
{
    $this->hora=$hora;
}
public function getIdCliente()
{
    return $this->idCliente;
}
public function getIdEmpleado()
{
    return $this->idEmpleado;
}
public function getIdTipoCita()
{
  return $this->idTipoCita();
}
public function getNomMascota()
{
    return $this->nomMascota;
}
public function getFecha()
{
    return $this->fecha;
}
public function getHora()
{
    return $this->hora;
}
   public static function ListarCitasSpa()
   {
     $citasspa= [];
     $db=Db::getConnect();
     $sql=$db->query('SELECT * FROM citasspa');
     foreach ($sql->fetchAll() as $citaspa) {
       $citasspa[]= new CitasSpa($citaspa['IdCliente'],$citaspa['IdEmpleado'],$citaspa['NomEmpleado'],$citaspa['NomMascota'],$citaspa['Fecha'],$citaspa['Hora']);
     }
     return $citasspa;
   }
   public static function FechaActual()
   {
     $db=Db::getConnect();
     $sql=$db->query('SELECT CURDATE() AS fecha');
     $fecha=$sql->fetch();
     $fechaactual=$fecha['fecha'];
     return $fechaactual;
   }
   public static function HoraActual()
   {
      $db=Db::getConnect();
      $sql=$db->query('SELECT TIME(NOW()) AS hora');
      $hora=$sql->fetch();
      $horaactual=$hora['hora'];
      return $horaactual; 
   }
   public static function ValidarHoras($idEmpleado,$idCliente,$nomMascota,$fecha,$hora)
   {
      $db=Db::getConnect();
      $sql=$db->query("SELECT * FROM citasspa WHERE IdEmpleado=$idEmpleado,IdCliente=$idCliente,NomMascota='$nomMascota',Fecha=$fecha, Hora='$hora'");
      $disponibilidad=$sql->fetch();
      if ($disponibilidad > 0) {
          return true;
      }
      else {
          return false;
      }
   }
   public static function AgendarCitas($cita)
   {
    
      $db=Db::getConnect();
      $insert=$db->prepare("INSERT INTO citas (IdCliente,IdEmpleado,IdTipoCita,NomMascota,Fecha,Hora) VALUES($cita->idCliente,$cita->idEmpleado,'$cita->idTipoCita','$cita->nomMascota','$cita->fecha','$cita->hora')");
      if($insert->execute())
      {             
        echo "<div align='center'><div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong><i class='fa fa-check'></i></strong> La cita fue asigada exitosamente.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button></div></div>";
 
         }
         else
         {
            echo "<div align='center'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><i class='fa fa-times-circle'></i></strong> La cita no fue asigada exitosamente.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div>";
         }
   }
 
   public static function ValidarCorreo($correo,$servicio,$fecha,$hora,$nomEmpleado,$nomMascota)
   {
       $db=Db::getConnect();
       $sql=$db->query("SELECT * FROM clientes WHERE Email='$correo'");
       $cuenta=$sql->fetch();
       $email=$cuenta['Email'];
       $nombre=$cuenta['NomCliente'];
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
                $mail->Subject = 'Asignacion Cita';
                $mail->Body  = " ";
                $identificacion=$cuenta['IdCliente'];               
                $mail->MsgHTML("
                <html>
                <body>
                <div align='center'>
                Señor(a), {$nombre}<br>
                La cita de {$nomMascota} para el servicio de {$servicio}, ha sido programada<br>
                Profesional: {$nomEmpleado}.<br>
                Día: {$fecha}.<br>
                Hora: {$hora}.<br>
                Lugar: Mundo Animal Pet Care.
                Dirección: Calle 47 # 47 - 76 Itagüi Teléfono: 3712593 WhatsApp: 3006801596.<br> 
                Si no va a asistir, debe cancelar la cita con mínimo 2 horas de anticipación.<br>
                Recuerde llegar 20 minutos antes de la cita.
                </div>
                </body>
                </html>");
               $mail->send();               
             } catch (Exception $e) {
              //echo "Mensaje no enviado: {$mail->ErrorInfo}";
              //require_once("Vista/login.php");
            }   
           }
   }

 
 }
 ?>
