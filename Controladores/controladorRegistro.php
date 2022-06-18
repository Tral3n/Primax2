<?php

session_start();
$_SESSION['mensaje'] = " ";

if($_POST['formulario'] == 'registro'){


    $name = trim($_POST['nombre']);
    $user = trim($_POST['user_name']);
    $pass = trim($_POST['password']);
    

    if (empty($name) or empty($user) or empty($pass)) {
        
        
        if (isset($_SESSION['mensaje'])) {
            
            $_SESSION['mensaje'] = "Debes ingresar los datos para el registro";
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

            

            $sql = "INSERT INTO login_user VALUES('','$name', '$user', '$pass')";
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
