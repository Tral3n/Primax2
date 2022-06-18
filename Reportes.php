<?php

session_start();
if (
    isset($_SESSION['id_session']) and
    isset($_SESSION['nombre_usuario'])
) {
    echo '<h1>Bienvenida o Bienvenido</h1>';


    $session = $_SESSION["id_session"];

    $usuario = $_SESSION["nombre_usuario"];

    $fullurl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullurl,"mode=CC_incorrect")== true){
 echo "<div class=\"alert alert-danger\">
 <H4><center>El empleado ingresado no existe!</H4> </center>
 </div>";
}

    


   


    echo 'Session conectada:' . $session;

    echo '<br/>Sesion: ' . $usuario . '<br/>';
} else {

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
    <br />
    <div class="container">
    <form action="Certificado.php" method="post" align="center"
            <div class="row">
                <div class="col-12">
                    <h4>Reportes</h4>
                    <hr>
                    <div class="session-box">
                        <div class="media-body">
                            <div class="media align-items-center sm-avatar">
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="form-label"><b>Ingrese identificacion del empleado a generar certificado</b></label>
                                    <input type="text" class="form-control" id="CC" name="CC" placeholder="Ingrese la cedula" required>                                 
                                      
                                       
                                      
                                    </select>
                                    
                                    <?
                                   
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
           <center><button type="submit" name="generar" id="generar" class="btn btn-secondary btn-lg">Generar Certificado</button></center>
           <br>
           <center><a href="Menu.php" type="button" class="btn btn-primary btn-lg">Volver</a></center>
        </form>
    </div>


    <?php



    ?>
</body>

</html>