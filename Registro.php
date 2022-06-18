<?php

session_start();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Presentacion/css/fondo2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">



            </div>
            <div class="col-4">



                <form action="Controladores/controladorRegistro.php" method="post" align="center">
                   

                <div>
                        <?php

                        if (isset($_SESSION['mensaje'])) {
                            echo '<h3>' . $_SESSION['mensaje'] . '</h3>';
                        }



                        ?>
                </div>

                    <br />
                    <h2>Ingrese los datos del Usuario para el registro</h2>

                    <br><br>

                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label"><b>EMAIL</b></label>
                        <br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <br>
                        <label for="formGroupExampleInput" class="form-label"><b>USUARIO</b></label>
                        <br>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario">
                        <br>
                        <label for="formGroupExampleInput" class="form-label"><b>PASSWORD</b></label><br>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <br><br>


                        <input type="hidden" name="formulario" class="btn btn-primary" value="registro">
                        <input type="submit" name="enviar" class="btn btn-primary" value="Enviar">
                        <input type="reset" class="btn btn-primary" value="Limpiar">

                        <br><br>

                        <?php

                        session_destroy();
                        ?>

                        <a  href="index.php"><b>Iniciar sesión</b></a>


                        

                    </div>

                </form>

            </div>
            <div class="col">
            </div>

        </div>

    </div>
</body>

</html>