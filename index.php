<?php
session_start();
$fullurl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullurl,"mode=reset_success")== true){
 echo "<div class=\"alert alert-success\">
 <H4><center>SE HA CAMBIADO LA CONTRASEÑA</H4> </center>
 </div>";
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
    <link rel="stylesheet" type="text/css" href="Notificaciones/toast.css">

</head>

<body>
<div class = "toast"> ejemplo de toast </div>
    <div class="container">
        <div class="row">
<div class="col">



</div>
            <div class="col-4">



                <form action="Controladores/controladorLogin.php" method="post" align="center">
                    <div>
                        <?php

                        if (isset($_SESSION['mensaje'])) {
                            echo '<h3>' . $_SESSION['mensaje'] . '</h3>';
                        }



                        ?>


                    </div>

                    <br />

                    <h1>Gestor de Empleados Primax</h1>


                    <br><br>

                    <h3>Ingrese los datos del Usuario para el login</h3>

                    <br><br>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label"><b>USUARIO</b></label>
                        <br>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario">
                        <br>
                        <label for="formGroupExampleInput" class="form-label"><b>PASSWORD</b></label><br>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <br><br>
                        

                        <input type="hidden" name="formulario" class="btn btn-primary" value="index">
                        <input type="submit" name="enviar" class="btn btn-primary" value="Iniciar">
                        <input type="reset" class="btn btn-primary" value="Limpiar">
                        <a href="recoverPass.php" class="btn btn-primary"><b>Olvido contrasena?</b></a>
                     
                        <br><br>

                        <?php 
                        
                       // session_destroy();
                        
                        ?>
                        <a  href="Registro.php"><b>Registrarse</b></a>
                        


            
                    </div>


                    
                    
                </form>














            </div>
            <div class="col">



</div>

        </div>

    </div>                    

 <script scr="./Notificaciones/toast.js"> </script>
</body>

</html>