<?php

session_start();
if(isset($_SESSION['id_session']) and 
isset($_SESSION['nombre_usuario'])) 
{
   echo '<h1>Bienvenida o Bienvenido</h1>';


    $session= $_SESSION["id_session"];

    $usuario= $_SESSION["nombre_usuario"];

   

    echo 'Session conectada:'.$session;

    echo '<br/>Sesion: '.$usuario.'<br/>';

    
    
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

<br/>
<br/>
<br/>
<center>
        <h2><b>ERROR</b></h2>
    </center>
<?php
    
    
    echo '<br/>
    <br/><br/><br/><br/><h1>Ofrecemos disculpas pagina en construccion<h1 />';
    echo '<br/><h1>Regresar al menu.<h1 />';
    echo '<br/><a href="Menu.php" type="button" class="btn btn-primary btn-lg">Menu</a>';
    ?>
</body>
</html>