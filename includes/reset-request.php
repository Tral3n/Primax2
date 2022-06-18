<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
echo '<pre>'
. print_r ($_SESSION,TRUE). '</pre>';
if(isset($_POST["recuperar-submit"])){



  $email = $_POST["email"];
  $_SESSION['email'] = $email;

 
   
    

    $token = rand(10000,99999);

    #$url = "localhost/primax/crear-new-pass.php?selector=". $selector ."&validator=" .bin2hex($token);

    $expires = date ("U") + 1800;

    require 'D:\Program Files\Xampp\htdocs\primax\Conexion\Conexion.php';

   
   
    $sql = "DELETE FROM passreset WHERE passResetEmail =?";
    $stmt = mysqli_stmt_init($conexion);
    if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Hubo un error al borrar token existente de el correo ingresado";
          exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
    }
    $sql ="INSERT INTO passreset (passResetEmail,passResetToken,passResetExpires)VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conexion);
    if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Hubo un error al ingresar un token con este correo";
          exit();
    }else{
      #  $hashedToken = password_hash ($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"sss",$email,$token,$expires);
        mysqli_stmt_execute($stmt);
        
    }
    
    mysqli_close($conexion);

  #  $message = '<p> Usted a solicitado la recuperacion de contrasena de su cuenta Primax, si usted no solicito esto contactese con el administrador<p>';
  #  $message .= '<p>Aqui esta su link para recuperar la contrasena';
   # $message .= '<a href="' . $url .'">' .$url. '</a></p>';

  #  $headers = "From : Admin <homeworksofware@gmail.com>\r\n";
   # $headers .= "Reply-to: homeworksofware@gmail.com\r\n ";#
   # $headers .= "Content-type:text/html\r\n";

   # mail($to,$subject,$message,$headers);
   

   

require 'D:\Program Files\Xampp\htdocs\primax\PHPMailer\Exception.php';
require 'D:\Program Files\Xampp\htdocs\primax\PHPMailer\PHPMailer.php';
require 'D:\Program Files\Xampp\htdocs\primax\PHPMailer\SMTP.php';

$mail = new PHPMailer();
$to = $email;
$mail->isSMTP();
$mail->Host= 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username= 'homeworksofware@gmail.com';
$mail->Password= '12345678juan';
$mail->SMTPSecure= 'tls';
$mail->Port =587;
$mail->isHTML(true);
$headers = "Content=type:text/hmtl;'charset:utf8";
$mail->Subject = 'Recuperacion de contrasena cuenta Primax';
$mail->Body = "<p> Usted a solicitado la recuperacion de contrasena de su cuenta Primax <br>
 Si usted no solicito esto , ignore este correo <br> 
 Aqui esta su codigo: <br>
  codigo: $token ";


 

$mail->addAddress($to);


if($mail->send()){
  echo 'si salio correo' ;
}else {
    echo 'no salio correo'.$mail->ErrorInfo;
}

    header("Location:../recoverPass.php?mode=enter_code");


}else{ 
header('index.php');
    

}