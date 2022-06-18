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

                    <h4>Registro de turnos</h4>
                    <hr>
                    <div class="session-box">
                        <div class="media-body">


                            <div class="media align-items-center sm-avatar">

                            <br>
                <h5 style="margin-bottom: 25px; text-align: center;">Los campos marcados con (*) son obligatorios</h5>

                <div class="form-group">
                                    <br>
                                    <label for="formGroupExampleInput" class="form-label"><b>ID Turno</b></label>
                                    <select name="identif" id="identif" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php
                                        include "Conexion/Conexion.php";
                                        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
                                        $query = "SELECT  * FROM tblturnos";
                                        $result = mysqli_query($conexion, $query) or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $row['Id_turno'] . '">' . $row['Id_turno'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Empleado(*)</b></label>
                                    <select name="empleado" id="empleado" class="form-control">
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

                                <div class="form-group">
                                <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Fecha Inicio(*)</b></label>
                                    <input type="date" class="form-control" id="fechai" name="fechai" value="<?php echo date("Y-m-d"); ?>">
                                </div>

                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Fecha Fin(*)</b></label>
                                    <input type="date" class="form-control" id="fechaf" name="fechaf" value="<?php echo date("Y-m-d"); ?>">
                                </div>



                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Hora Inicio(*)</b></label>
                                    <input type="time" class="form-control" id="horai" name="horai" placeholder="Hora Inicio"></textarea>
                                </div>

                                <div class="form-group">
                                    <br><br>
                                    <label for="formGroupExampleInput" class="form-label"><b>Hora Fin(*)</b></label>
                                    <input type="time" class="form-control" id="horaf" name="horaf" placeholder="Hora Fin"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br><br>
            <center><b><input type="submit" name="btnGuardar" class="btn btn-primary" value="Guardar"></b>

                <b><input type="submit" name="btnModificar" class="btn btn-primary" value="Modificar"></b>

                <b><input type="submit" name="btnEliminar" class="btn btn-danger" value="Eliminar"></b>

                <b><input type="submit" name="btnRefrescar" class="btn btn-primary" value="Refrescar"></b>

                <a href="Menu.php"><input type="button" name="btnVolver" class="btn btn-primary" value="Volver"></a>
            </center>

        </form>



        <?php
        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $consultar = "SELECT * FROM tblturnos";
        $query = mysqli_query($conexion, $consultar);
        $array = mysqli_fetch_array($query)

        ?>
        <div class="form-group">
            <br><br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id turno</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                    </tr>
                </thead>
                <tbody id="datos">
                    <?php foreach ($query as $row) { ?>
                        <tr>
                            <td><?php echo $row['Id_turno'] ?></td>
                            <td><?php echo $row['Nombre_empleado'] ?></td>
                            <td><?php echo $row['Fecha_inicio'] ?></td>
                            <td><?php echo $row['Fecha_fin'] ?></td>
                            <td><?php echo $row['Hora_inicio'] ?></td>
                            <td><?php echo $row['Hora_fin'] ?></td>
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

    $NOMBRE_EMPLEADO = $_POST['empleado'];
    $FECHA_INICIO = $_POST['fechai'];
    $FECHA_FIN = $_POST['fechaf'];
    $HORA_INICIO = $_POST['horai'];
    $HORA_FIN = $_POST['horaf'];


    if(empty($NOMBRE_EMPLEADO= $_POST['empleado'])){
        echo '<div class="alert alert-danger">';
            echo '<Strong>Seleccione un empleado para asignar el turno</Strong>';
            echo '</div>';
    }elseif(empty($HORA_INICIO= $_POST['horai'])){
        echo '<div class="alert alert-danger">';
            echo '<Strong>Ingrese la hora de inicio del turno</Strong>';
            echo '</div>';
    }elseif(empty($HORA_FIN= $_POST['horaf'])){
        echo '<div class="alert alert-danger">';
            echo '<Strong>Ingrese la hora de terminacion del turno</Strong>';
            echo '</div>';
    }else{




    $consulta = "INSERT INTO tblturnos VALUES('','$NOMBRE_EMPLEADO','$FECHA_INICIO','$FECHA_FIN',
'$HORA_INICIO','$HORA_FIN')";



    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {

        echo '<div class="alert alert-success">';
        echo '<Strong>---------Registro completo!</Strong>Se ha registrado un turno correctamente.';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">';
        echo '<Strong> No se ha registrado el turno..</Strong>';
        echo '</div>';
    }
    }
    mysqli_close($conexion);
}

?>

<?php
if (isset($_REQUEST['btnModificar'])) {

    include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $ID_TURNO=$_POST['identif'];
        $FECHA_INICIO = $_POST['fechai'];
        $FECHA_FIN = $_POST['fechaf'];
        $HORA_INICIO = $_POST['horai'];
        $HORA_FIN = $_POST['horaf'];

        if(empty($ID_TURNO=$_POST['identif'])){
            echo '<div class="alert alert-danger">';
            echo '<Strong>Seleccione el ID del turno a modificar</Strong>';
            echo '</div>';
        }else{

            $consulta = "UPDATE tblturnos SET Fecha_inicio='$FECHA_INICIO',Fecha_fin='$FECHA_FIN',Hora_inicio='$HORA_INICIO',
    Hora_fin='$HORA_FIN'WHERE Id_turno='$ID_TURNO'";



        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Modificacion completa!</Strong>Se ha modificado un turno correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el turno!</Strong><br>---------No se ha modificado el turno.. Recuerde usar un id valido';
            echo '</div>';
        }
      

        mysqli_close($conexion);
        

        }


}

?>


<?php
if (isset($_REQUEST['btnEliminar'])) {
    include "Conexion/Conexion.php";
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
    $ID_TURNO=$_POST['identif'];

    if(empty($ID_TURNO=$_POST['identif'])){
        echo '<div class="alert alert-danger">';
        echo '<Strong>Seleccione el ID del turno a eliminar</Strong>';
        echo '</div>';
    }else{
        $consulta = "DELETE  FROM tblturnos WHERE Id_turno='$ID_TURNO'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Eliminacion completa!</Strong>Se ha eliminado el turno correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el turno!</Strong><br>---------No se ha borrado el turno..';
            echo '</div>';
        }


        mysqli_close($conexion);
    }



}


?>

</body>

</html>