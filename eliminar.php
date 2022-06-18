<?php



include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
        $IDENTIFICACION = $_GET['numero_identificacion'];
        $consulta = "DELETE  FROM tblempleados WHERE numero_identificacion='$IDENTIFICACION'";




        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Eliminacion completa!</Strong>Se ha eliminado un empleado correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el empleado!</Strong><br>---------No se ha borrado el empleado..';
            echo '</div>';
        }

        mysqli_close($conexion);
    



?>