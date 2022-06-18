<?php

session_start();
if(isset($_SESSION['id_session']) and 
isset($_SESSION['nombre_usuario'])) 
{
   echo '<h1>Bienvenida o Bienvenido</h1>';


    $session= $_SESSION["id_session"];

    $usuario= $_SESSION["nombre_usuario"];

   

    echo 'Session conectada:'.$session;

    echo '<br/>Hola: '.$usuario.'<br/>';

    
    echo '<br/>Hacer click aqui para cerrar sesion <a href="logout.php">Salir</a>';
    }
    else{

        header("Location:pirata.php");
    
    
        }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Presentacion/css/fondo2.css">
</head>

<body>


    <br />
    <br />
    <center>
        <h2><b>MENU</b></h2>
    </center>
    <div class="container">


        <div class="row">
            
        <div class="col-2"></div>


        
            <div class="col-4">

                <br />
                <br />
                <br />
                <div class="d-grid gap-2">

                   
                    <a href="Empleados.php" type="button" class="btn btn-primary btn-lg">Gestor Empleados</a>
                    <br />
                    <br />
                    <br />
                    <a href="Soporte.php" type="button" class="btn btn-primary btn-lg">Soporte</a>
                </div>


            </div>
            
            <div class="col-4">
                <br />
                <br />
                <br />
                <div class="d-grid gap-2">
                    <a href="Turnos.php" type="button" class="btn btn-primary btn-lg">Asignación de turnos</a>
                    <br />
                    <br />
                    <br />
                    <a href="Reportes.php" type="button" class="btn btn-primary btn-lg">Generador de reportes</a>
                </div>

            </div>
            <div class="col-2"></div>

        </div>

    </div>


</body>

</html>