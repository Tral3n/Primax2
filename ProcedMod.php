<?php

if (isset($_REQUEST['btnConsultar'])) {

    include "Conexion/Conexion.php";
    $conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);
    $IDENTIFICACION = $_POST['numero_identificacion'];
    $consulta ="SELECT * FROM tblempleados WHERE numero_identificacion='$IDENTIFICACION'" ;
    
    
    $resultado=mysqli_query($conexion,$consulta);


    $Direccion  ='';             
    $Contacto   ='';
    $Parentesco ='';
    $Telefono   ='';
    $Cargo      ='';
    $Tipo       ='';
    $Estado     ='';





    

    while($row=mysqli_fetch_array($resultado)){


        $Direccion=$row['Direccion'];
        $Contacto=$row['Contacto_Familiar'];
        $Parentesco=$row['Parentesco'];
        $Telefono=$row['Telefono'];
        $Cargo=$row['Cargo'];
        $Tipo=$row['Tipo_Contrato'];
        $Estado=$row['Estado'];




    }

    

}
?>