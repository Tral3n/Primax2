<?php

session_start();
$_SESSION['mensaje'] = " ";


if($_POST['formulario'] == 'index'){



    $user = trim($_POST['user_name']);
    $pass = trim($_POST['password']);
    

    if (empty($user) or empty($pass)) {
        
        if (isset($_SESSION['mensaje'])) {
            
            $_SESSION['mensaje']= "
           <div class='center'>
            <div class='alert-danger '>
           
            Debes ingresar el usuario y el password 
            </div>
            </div>
             "
            ;
            header('Location:../index.php');
            

        }




    } else{

        if (!empty($_POST["user_name"]) and !empty($_POST["password"])) {

            $con = mysqli_connect(
                "us-cdbr-east-04.cleardb.com",
                "be638dfe02bc87",
                "18c8a290",
                "heroku_f7036baf347b6a5"
            ) or die("No se conecto.");

            $resultado_sql = mysqli_query(
                $con,
                "SELECT id,email FROM login_user WHERE user_name='" . $user. "'
                 AND pass= '" . $pass . "'"
            );

            $registro = mysqli_fetch_array($resultado_sql);

            if (is_array($registro)) {


                $_SESSION['id_session'] = $registro['id']."1000";
                $_SESSION['nombre_usuario'] = $registro['email'];
                $_SESSION['mascota'] = "cocodrilo";

        
                header("Location:../Menu.php");
            } else {

                if (isset($_SESSION['mensaje'])) {
                      
                    $_SESSION['mensaje']= "
                    <div class='center'>
                    <div class='alert-danger '>
                    El usuario o password no son validos
                    </div>
                    </div>";
                    
                    header("Location:../index.php");
                    
                }
            }


    }


    }

}






?>