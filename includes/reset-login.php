<?php
session_start();
echo '<pre>'
. print_r ($_SESSION,TRUE). '</pre>';

if(isset($_POST["reset-submit"])) {

    
    $email = $_SESSION['email'];
    $code = $_SESSION['code'];
 
  
  
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    
   
    
     if($pass1 != $pass2){
        header("Location:../recoverPass.php?mode=enter_password_passnotsame");
        exit(); 
    }
    require 'D:/Program Files/Xampp/htdocs/primax/Conexion/Conexion.php';
    $sql = "UPDATE login_user
    INNER JOIN passreset ON login_user.email = passreset.passResetEmail
    SET login_user.pass = ? 
    WHERE login_user.email = ? AND passreset.passResetToken = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Hubo un erreor al buscar el codigo en la base de datos o expiro";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sss",$pass1,$email,$code);
        mysqli_stmt_execute($stmt);
       header("Location:../index.php?mode=reset_success");
       
    }
   
}else{
    header("Location:../index.php");
    
}