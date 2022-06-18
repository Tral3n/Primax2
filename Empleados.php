<?php

include "ProcedMod.php";
session_start();
if(isset($_SESSION['id_session']) and 
isset($_SESSION['nombre_usuario'])) 
{
   echo '<h1>Bienvenida o Bienvenido</h1>';


    $session= $_SESSION["id_session"];

    $usuario= $_SESSION["nombre_usuario"];

   

    echo 'Session conectada:'.$session;

    echo '<br/>Usuario: '.$usuario.'<br/>';

    }
    else{

        header("Location:pirata.php");
    
    
        }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Presentacion/css/estiloTabla.css">
    <link rel="stylesheet" type="text/css" href="Presentacion/css/fondo2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primax </title>
</head>

<body>


    <div class="container">

        <div class="form-area">
            <form role="form" method="POST">
                <br>

                <h2 style="margin-bottom: 25px; text-align: center;"><b> Gestor de Empleados</b></h2>
                <br>
                <label for="formGroupExampleInput" class="form-label"><b>Los campos con "*" son obligatorios</b></label>
                <br>
                <div class="row">
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Tipo Identificación *</b></label>
                            <select class="form-select" name='t' aria-label="Default select example" <?php echo isset($_REQUEST['btnConsultar']) ? 'disabled' : '' ?>>
                                <option selected>Seleccionar</option>
                                <option value="CC">CC</option>
                                <option value="TI">TI</option>
                                <option value="CE">CE</option>
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Numero Identificación *</b></label>
                            <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion" placeholder=" # Identificación" value="<?php echo isset($_REQUEST['btnConsultar']) ? $_POST['numero_identificacion'] : '' ?>">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Nombre *</b></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" <?php echo isset($_REQUEST['btnConsultar']) ? 'disabled' : '' ?>>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Apellidos * </b></label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" <?php echo isset($_REQUEST['btnConsultar']) ? 'disabled' : '' ?>>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Sexo *</b></label>
                            <select class="form-select" name='se' aria-label="Default select example" <?php echo isset($_REQUEST['btnConsultar']) ? 'disabled' : '' ?>>
                                <option selected>Seleccionar</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>



                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Dirección *</b></label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo isset($_REQUEST['btnConsultar']) ? $Direccion : '' ?>">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Contacto Familiar * </b></label>
                            <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto Familiar" value="<?php echo isset($_REQUEST['btnConsultar']) ? $Contacto : '' ?>">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Parentesco *</b></label>
                            <input type="text" class="form-control" id="parentesco" name="parentesco" placeholder="Parentesco" value="<?php echo isset($_REQUEST['btnConsultar']) ? $Parentesco : '' ?>"">
                        </div>
                        <br>

                        <div class=" form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Telefono *</b></label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo isset($_REQUEST['btnConsultar']) ? $Telefono : '' ?>">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Cargo *</b></label>
                            <select class="form-select" name='ca' aria-label="Default select example">
                                <option>Seleccionar</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Cargo == "Gerente" ? 'selected' : '' : '' ?> value="Gerente">Gerente</option>
                                <option <?php echo isset($_REQUEST['btnConsultar'])  ? $Cargo == "Administrador" ? 'selected' : '' : '' ?> value="Administrador">Administrador</option>
                                <option <?php echo isset($_REQUEST['btnConsultar'])  ? $Cargo == "Lider de servicio" ? 'selected' : '' : '' ?> value="Lider de servicio">Lider de servicio</option>
                                <option <?php echo isset($_REQUEST['btnConsultar'])  ? $Cargo == "Jefe de patio" ? 'selected' : '' : '' ?> value="Jefe de patio">Jefe de patio</option>
                                <option <?php echo isset($_REQUEST['btnConsultar'])  ? $Cargo == "Auxiliar Admon" ? 'selected' : '' : '' ?> value="Auxiliar Admon">Auxiliar Admon</option>
                                <option <?php echo isset($_REQUEST['btnConsultar'])  ? $Cargo == "Asistente Admin" ? 'selected' : '' : '' ?> value="Asistente Admin">Asistente Admin</option>
                            </select>
                        </div>
                        <br>



                    </div>
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Tipo Contrato * </b></label>
                            <select class="form-select" name='ti' value="<?php echo isset($_REQUEST['btnConsultar']) ? $Tipo : '' ?>">
                                <option>Seleccionar</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Tipo == "Termino fijo inferior" ? 'selected' : '' : '' ?> value="Termino fijo inferior">Termino fijo inferior</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Tipo == "A un año" ? 'selected' : '' : '' ?> value="A un año">A un año</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Tipo == "Indefinido" ? 'selected' : '' : '' ?> value="Indefinido">Indefinido</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Tipo == "Gerente" ? 'selected' : '' : '' ?> value="Servicios">Servicios</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Tipo == "Servicios" ? 'selected' : '' : '' ?> value="Obra labor">Obra Labor</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Estado *</b></label>
                            <select class="form-select" name='es' aria-label="Default select example" value="<?php echo isset($_REQUEST['btnConsultar']) ? $Estado : '' ?>">
                                <option selected>Seleccionar</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Estado == "Activo" ? 'selected' : '' : '' ?> value="Activo">Activo</option>
                                <option <?php echo isset($_REQUEST['btnConsultar']) ? $Estado == "Innactivo" ? 'selected' : '' : '' ?> value="Innactivo">Innactivo</option>

                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Fecha Ingreso *</b></label>
                            <input type="date" class="form-control" id="fechai" name="fechai" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Fecha Terminacion</b></label>
                            <input type="date" class="form-control" id="fechat" name="fechat" <?php echo isset($_REQUEST['btnConsultar']) ? '' : 'disabled' ?>>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Motivo Terminacion</b></label>
                            <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo Terminación" <?php echo isset($_REQUEST['btnConsultar']) ? '' : 'disabled' ?>>
                        </div>
                        <br>







                    </div>




                </div>

                <br>
                <br>

                <center>
                    <input type="submit" name="btnGuardar" class="btn btn-primary" value="Guardar">
                    <input type="submit" name="btnConsultar" class="btn btn-primary" value="Consultar">
                    <input type="submit" name="btnModificar" class="btn btn-primary" value="Modificar">
                    <input type="submit" name="btnLimpiar" class="btn btn-primary" value="Limpiar">
                    <input type="submit" name="btnEliminar" class="btn btn-danger" value="Borrar">
                    <input type="submit" name="btnGenerar" class="btn btn-info" value="Generar Certificado">
                    <a href="Menu.php"><input type="button" name="btnVolver" class="btn btn-primary" value="Volver"></a>
                    


                </center>

               
<br/>



            </form>
        </div>
    </div>


    <?php




    if (isset($_REQUEST['btnGuardar'])) {
        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);

        $TIPO_IDENTIFICACION = $_POST['t'];
        $IDENTIFICACION = $_POST['numero_identificacion'];
        $NOMBRE = $_POST['nombre'];
        $APELLIDOS = $_POST['apellidos'];
        $SEXO = $_POST['se'];
        $DIRECCION = $_POST['direccion'];
        $CONTACTO   = $_POST['contacto'];
        $PARENTESCO = $_POST['parentesco'];
        $TELEFONO = $_POST['telefono'];
        $CARGO = $_POST['ca'];
        $TIPO_CONTRATO = $_POST['ti'];
        $ESTADO = $_POST['es'];
        $FECHA_INGRESO = $_POST['fechai'];



        $consulta = "INSERT INTO tblempleados VALUES('$TIPO_IDENTIFICACION','$IDENTIFICACION',
        '$NOMBRE','$APELLIDOS','$SEXO','$DIRECCION','$CONTACTO','$PARENTESCO','$TELEFONO','$CARGO'
        ,'$TIPO_CONTRATO','$ESTADO','$FECHA_INGRESO','','')";



        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Registro completo!</Strong>Se ha registrado un empleado correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------Ya existe el empleado!</Strong> No se ha creado el empleado..';
            echo '</div>';
        }

        mysqli_close($conexion);
    }

    ?>


    <?php


    if (isset($_REQUEST['btnConsultar'])) {

        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
        $IDENTIFICACION = $_POST['numero_identificacion'];
        $consulta = "SELECT * FROM tblempleados WHERE numero_identificacion='$IDENTIFICACION'";


        $resultado = mysqli_query($conexion, $consulta);

        

        if (mysqli_num_rows($resultado) != 0) {

            echo '<table class="table table-bordered table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>TIPO IDENTIFICACION</th>';
            echo '<th>NUMERO IDENTIFICACION</th>';
            echo '<th>NOMBRE</th>';
            echo '<th>APELLIDOS</th>';
            echo '<th>SEXO</th>';
            echo '<th>DIRECCION</th>';
            echo '<th>CONTACTO FAMILIAR</th>';
            echo '<th>PARENTESCO</th>';
            echo '<th>TELEFONO</th>';
            echo '<th>CARGO</th>';
            echo '<th>TIPO CONTRATO</th>';
            echo '<th>ESTADO</th>';
            echo '<th>FECHA INGRESO</th>';
            echo '<th>FECHA TERMINACION</th>';
            echo '<th>MOTIVO TERMINACION</th>';
            echo '</tr>';
            echo '</thead';
    
            while ($row = mysqli_fetch_array($resultado)) {
    
    
    
    
    
    
                echo '<tbody id="myTable">';
                echo '<tr>';
                echo '<td>' . $row['Tipo_Identificacion'] . '</td>';
                echo '<td>' . $row['Numero_identificacion'] . '</td>';
                echo '<td>' . $row['Nombre'] . '</td>';
                echo '<td>' . $row['Apellidos'] . '</td>';
                echo '<td>' . $row['Sexo'] . '</td>';
                echo '<td>' . $row['Direccion'] . '</td>';
                echo '<td>' . $row['Contacto_Familiar'] . '</td>';
                echo '<td>' . $row['Parentesco'] . '</td>';
                echo '<td>' . $row['Telefono'] . '</td>';
                echo '<td>' . $row['Cargo'] . '</td>';
                echo '<td>' . $row['Tipo_Contrato'] . '</td>';
                echo '<td>' . $row['Estado'] . '</td>';
                echo '<td>' . $row['Fecha_Ingreso'] . '</td>';
                echo '<td>' . $row['Fecha_Terminacion'] . '</td>';
                echo '<td>' . $row['Motivo_Terminacion'] . '</td>';
    
                echo '</tr>';
                echo '</tbody>';
            }

            
        } else {


            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el empleado!</Strong> No se ha creado el empleado..';
            echo '</div>';
        }


       






        mysqli_close($conexion);
        echo '</table>';
        echo '<script src="Presentacion/js/filtracionTabla.js"></script>';
    }
    ?>



    <?php

    if (isset($_REQUEST['btnModificar'])) {

        include "Conexion/Conexion.php";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);




        $IDENTIFICACION = $_POST['numero_identificacion'];
        $DIRECCION = $_POST['direccion'];
        $CONTACTO   = $_POST['contacto'];
        $PARENTESCO = $_POST['parentesco'];
        $TELEFONO = $_POST['telefono'];
        $CARGO = $_POST['ca'];
        $TIPO_CONTRATO = $_POST['ti'];
        $ESTADO = $_POST['es'];
        $FECHA_TERMINACION = $_POST['fechat'];
        $MOTIVO = $_POST['motivo'];





        $consulta = "UPDATE tblempleados SET Direccion='$DIRECCION',Contacto_Familiar='$CONTACTO',Parentesco='$PARENTESCO',
    Telefono='$TELEFONO',Cargo='$CARGO',Tipo_Contrato='$TIPO_CONTRATO', Estado='$ESTADO', Fecha_Terminacion='$FECHA_TERMINACION'
    , Motivo_Terminacion='$MOTIVO' WHERE Numero_identificacion='$IDENTIFICACION'";



        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {

            echo '<div class="alert alert-success">';
            echo '<Strong>---------Modificacion completa!</Strong>Se ha modificado un empleado correctamente.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
            echo '<Strong>---------No existe el empleado!</Strong><br>---------No se ha modificado el empleado.. Recuerde usar un id valido';
            echo '</div>';
        }
        $consulta1 = "SELECT * FROM tblempleados WHERE numero_identificacion='$IDENTIFICACION'";



        $resultado1 = mysqli_query($conexion, $consulta1);


        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>TIPO IDENTIFICACION</th>';
        echo '<th>NUMERO IDENTIFICACION</th>';
        echo '<th>NOMBRE</th>';
        echo '<th>APELLIDOS</th>';
        echo '<th>SEXO</th>';
        echo '<th>DIRECCION</th>';
        echo '<th>CONTACTO FAMILIAR</th>';
        echo '<th>PARENTESCO</th>';
        echo '<th>TELEFONO</th>';
        echo '<th>CARGO</th>';
        echo '<th>TIPO CONTRATO</th>';
        echo '<th>ESTADO</th>';
        echo '<th>FECHA INGRESO</th>';
        echo '<th>FECHA TERMINACION</th>';
        echo '<th>MOTIVO TERMINACION</th>';
        echo '</tr>';
        echo '</thead';

        while ($row = mysqli_fetch_array($resultado1)) {

            echo '<tbody id="myTable">';
            echo '<tr>';
            echo '<td>' . $row['Tipo_Identificacion'] . '</td>';
            echo '<td>' . $row['Numero_identificacion'] . '</td>';
            echo '<td>' . $row['Nombre'] . '</td>';
            echo '<td>' . $row['Apellidos'] . '</td>';
            echo '<td>' . $row['Sexo'] . '</td>';
            echo '<td>' . $row['Direccion'] . '</td>';
            echo '<td>' . $row['Contacto_Familiar'] . '</td>';
            echo '<td>' . $row['Parentesco'] . '</td>';
            echo '<td>' . $row['Telefono'] . '</td>';
            echo '<td>' . $row['Cargo'] . '</td>';
            echo '<td>' . $row['Tipo_Contrato'] . '</td>';
            echo '<td>' . $row['Estado'] . '</td>';
            echo '<td>' . $row['Fecha_Ingreso'] . '</td>';
            echo '<td>' . $row['Fecha_Terminacion'] . '</td>';
            echo '<td>' . $row['Motivo_Terminacion'] . '</td>';

            echo '</tr>';
            echo '</tbody>';
        }
        mysqli_close($conexion);
        echo '</table>';
        echo '<script src="Presentacion/js/filtracionTabla.js"></script>';
    }


    ?>


<?php  
if (isset($_REQUEST['btnEliminar'])) {
    include "Conexion/Conexion.php";
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pw, $db_nombre);
    $IDENTIFICACION = $_POST['numero_identificacion'];
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
    

}

 ?>












</body>

</html>