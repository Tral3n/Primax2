<?php
session_start();
use LDAP\Result;
echo '<pre>'
. print_r ($_SESSION,TRUE). '</pre>';
if (isset($_POST["code-submit"])) {
    $code = $_POST["code"];  
    $_SESSION ['code']=$code;
    
    
   

    $currentDate = date("U");

    require 'D:/Program Files/Xampp/htdocs/primax/Conexion/Conexion.php';

    $sql = "SELECT * FROM passreset WHERE passResetToken = $code ";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Hubo un erreor al buscar el codigo en la base de datos o expiro";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $code);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
            if(mysqli_num_rows($result)>0){
                header("Location:../recoverPass.php?mode=enter_password");
               
                
            }else{
                header ("Location:../recoverPass.php?mode=code_incorrect")  ; 
                     }
                   ##///      
                                  
                    
                    }
                   
            
        
    
} 

else{
    header("Location:../index.php");
     
    
}
