<?php

session_start();
if (
    isset($_SESSION['id_session']) and
    isset($_SESSION['nombre_usuario'])
) {
    echo '<h1>Bienvenida o Bienvenido</h1>';


    $session = $_SESSION["id_session"];

    $usuario = $_SESSION["nombre_usuario"];



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
        <form role="form" method="POST">
            <div class="row">
                <div class="col-12">

                    <h4>Registro de incidentes</h4>
                    <hr>
                    <div class="session-box">
                        <div class="media-body">


                            <div class="media align-items-center sm-avatar">

                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="form-label"><b>Numero incidente</b></label>
                                    <input type="text" class="form-control" id="numeroi" name="numeroi">
                                </div>

                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Fecha incidente</b></label>
                                    <input type="date" class="form-control" id="fechai" name="fechai" value="<?php echo date("Y-m-d"); ?>">
                                </div>



                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Descripcion</b></label>
                                    <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                                </div>

                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Responsable</b></label>
                                    <select name="responsable" id="vehiculo" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php
                                        include "Conexion/Conexion.php";
                                        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
                                        $query = "SELECT  * FROM tblempleados";
                                        $result = mysqli_query($conexion, $query) or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $row['Nombre'] . ' ' . $row['Apellidos'] . '">' . $row['Nombre'] . '  ' . $row['Apellidos'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br><br>
            <center><b><input type="submit" name="btnGuardar" class="btn btn-primary" value="Guardar"></b>

                <b><input type="submit" name="btnModificar" class="btn btn-primary" value="Modificar"></b>

                <b><input type="submit" name="btnRefrescar" class="btn btn-primary" value="Refrescar"></b>

                <a href="Menu.php"><input type="button" name="btnVolver" class="btn btn-primary" value="Volver"></a>
            </center>

        </form>



        <?php
        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $consultar = "SELECT * FROM tblincidentes";
        $query = mysqli_query($conexion, $consultar);
        $array = mysqli_fetch_array($query)

        ?>
        <div class="form-group">
            <br><br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Numero incidente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Responsable</th>
                    </tr>
                </thead>
                <tbody id="datos">
                    <?php foreach ($query as $row) { ?>
                        <tr>
                            <td><?php echo $row['Numero_incidente'] ?></td>
                            <td><?php echo $row['Fecha_incidente'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td><?php echo $row['Responsable'] ?></td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>

    <?php




    if (isset($_REQUEST['btnGuardar'])) {
        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $NUMERO_INCIDENTE = $_POST['numeroi'];
        $FECHA_INCIDENTE = $_POST['fechai'];
        $DESCRIPCION = $_POST['descripcion'];
        $RESPONSABLE = $_POST['responsable'];




        $consulta = "INSERT INTO tblincidentes VALUES('','$NUMERO_INCIDENTE','$FECHA_INCIDENTE','$DESCRIPCION',
    '$RESPONSABLE')";



        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Registro completo!</Strong>Se ha registrado un incidente correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------Ya existe el empleado!</Strong> No se ha registrado el incidente..';
            echo '</div>';
        }

        mysqli_close($conexion);
    }

    ?>

    <?php
    if (isset($_REQUEST['btnModificar'])) {

        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $NUMERO_INCIDENTE = $_POST['numeroi'];
        $FECHA_INCIDENTE = $_POST['fechai'];
        $DESCRIPCION = $_POST['descripcion'];
        $RESPONSABLE = $_POST['responsable'];


        $consulta = "UPDATE tblincidentes SET Fecha_incidente='$FECHA_INCIDENTE',Descripcion='$DESCRIPCION',Responsable='$RESPONSABLE'
         WHERE Numero_incidente='$NUMERO_INCIDENTE'";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Modificacion completa!</Strong>Se ha modificado un incidente correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el incidente o no se ha modificado!</Strong>';
            echo '</div>';
        }
    }


    ?>


</body>

</html>