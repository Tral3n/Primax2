<?php

session_start();
$_SESSION['mensaje'] = " ";

if($_POST['formulario'] == 'registro'){


    $email = trim($_POST['email']);
    $user = trim($_POST['user_name']);
    $pass = trim($_POST['password']);
    

    if (empty($email) or empty($user) or empty($pass)) {
        
        
        if (isset($_SESSION['mensaje'])) {
            
            $_SESSION['mensaje'] = "Debes ingresar los datos obligatorios para el registro";
            header('Location:../Registro.php');
            

        }
        

    }else {
        if (!empty($_POST["user_name"]) and !empty($_POST["password"])) {

            $con = mysqli_connect(
                "us-cdbr-east-04.cleardb.com",
                "be638dfe02bc87",
                "18c8a290",
                "heroku_f7036baf347b6a5"
            ) or die("No se conecto.");

            

            $sql = "INSERT INTO login_user VALUES('','$email', '$user', '$pass')";
                echo $sql;
            if ($con->query($sql) === TRUE) {
                $_SESSION['mensaje']= "Usuario Registrado Correctamente";
                    header("Location:../index.php");
            } else {
            echo "Error: " . $sql . "<br>" . $con->error;
            }


            
    }
}
}
?>
