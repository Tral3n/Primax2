<?php
session_start();


$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}
//posted
$fullurl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullurl,"mode=code_incorrect")== true){
 echo "
 <div class=\"alert alert-danger\">
 <H4><center>CODIGO INVALIDO!</H4> </center>
 </div>
 <div class=\"container\">
 <div class=\"row\">
     <div class=\"col\">



     </div>
     <div class=\"col-4\">
 

 
 <form action=\"includes/reset-password.php\" method=\"post\" align=\"center\">
                    <h2>Recuperar contrasena</h2>
                    <br><br>
                    <h3>Ingrese el codigo que recibio en el correo</h3>
                    <br><br>
                    <div class=\"form-group\">
                        <label for=\"formGroupExampleInput\" class=\"form-label\"><b>Codigo</b></label>
                        <br>
                        <input type=\"number\" class=\"form-control\" id=\"code\" name=\"code\" placeholder=\"Ingrese su codigo\" required>
                        <br>
                        <br><br>
                                          
                        <button type=\"submit\" class=\"btn btn-primary\" id=\"code-submit\" name=\"code-submit\">Aceptar</button>
                        <br><br>
                        <a href=\"recoverPass.php\"><b>Atras</b></a>
                    </div>
                </form>
                </div>
                <div class=\"col\">
                </div>
    
            </div>
    
        </div>
 ";
 
}elseif(strpos($fullurl,"mode=enter_password_passnotsame")== true){
    echo "<div class=\"alert alert-danger\">
    <H4><center>Contraseñas no coinciden!</H4> </center>
    </div>
    <div class=\"container\">
    <div class=\"row\">
        <div class=\"col\">



        </div>
        <div class=\"col-4\">
    <form action=\"includes/reset-login.php\" method=\"post\" align=\"center\">
                        <h2>Recuperar contrasena</h2>
                        <br><br>
                        <h3>Ingrese su nueva contrasena</h3>
                        <br><br>
                        <div class=\"form-group\">
                            <label for=\"formGroupExampleInput\" class=\"form-label\"><b>Nueva contrasena</b></label>
                            <br>
                           
                            <input type=\"password\" class=\"form-control\" name=\"pass1\" placeholder=\"Ingrese su contrasena nueva\" required>
                            <input type=\"password\" class=\"form-control\" name=\"pass2\" placeholder=\"Ingrese su contrasena nueva , nuevamente\" required>
                            <br>
                            <br><br>
                                                    
                            <button type=\"submit\" class=\"btn btn-primary\" name=\"reset-submit\">Aceptar</button>
                            <br><br>
                            <a href=\"index.php\"><b>Atras</b></a>
                        </div>
                    </form>
    
                    </div>
                    <div class=\"col\">
                    </div>
        
                </div>
        
            </div>
    
    
    
    ";
}

if (count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            
            header("Location: includes/reset-request.php");
            die;
            break;
        case 'enter_code':
            header("Location: recoverPass.php?mode=enter_code");
           
            die;
            break;
        case 'enter_password':
            header("Location: recoverPass.php?mode=enter_password");
            die;
            break;
            

        default:
            # code...
            break;
    }


}

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
                <?php
                switch ($mode) {
                    case 'enter_email':
                        ?>
                       
                        <form action="includes/reset-request.php" method="post" align="center">
                    <h2>Recuperar contrasena</h2>
                    <br><br>
                    <h3>Ingrese su correo porfavor</h3>
                    <br><br>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label"><b>Correo</b></label>
                        <br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo" required>
                        <br>
                        <br><br>
                        <input type="hidden" name="formulario" class="btn btn-primary" value="index">
                        <input type="reset" class="btn btn-primary" value="Limpiar">
                        <button type="submit" class="btn btn-primary" name="recuperar-submit">Recibir nueva contrasena</button>
                        <br><br>
                        <a href="index.php"><b>Atras</b></a>
                    </div>
                </form>
                <?php
                        break;
                        case 'enter_code':
                            ?>
                            <form action="includes/reset-password.php" method="post" align="center">
                        <h2>Recuperar contrasena</h2>
                        <br><br>
                        <h3>Ingrese el codigo que recibio en el correo</h3>
                        <br><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Codigo</b></label>
                            <br>
                            <input type="number" class="form-control" id="code" name="code" placeholder="Ingrese su codigo" required>
                            <br>
                            <br><br>
                                              
                            <button type="submit" class="btn btn-primary" id="code-submit" name="code-submit">Aceptar</button>
                            <br><br>
                            <a href="index.php"><b>Atras</b></a>
                        </div>
                    </form>
                    <?php
                            break;
                        
                        case 'enter_password':
                            ?>
                            <form action="includes/reset-login.php" method="post" align="center">
                        <h2>Recuperar contrasena</h2>
                        <br><br>
                        <h3>Ingrese su nueva contrasena</h3>
                        <br><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label"><b>Nueva contrasena</b></label>
                            <br>
                           
                            <input type="password" class="form-control" name="pass1" placeholder="Ingrese su contrasena nueva" required>
                            <input type="password" class="form-control" name="pass2" placeholder="Ingrese su contrasena nueva , nuevamente" required>
                            <br>
                            <br><br>
                                                    
                            <button type="submit" class="btn btn-primary" name="reset-submit">Aceptar</button>
                            <br><br>
                            <a href="index.php"><b>Atras</b></a>
                        </div>
                    </form>
                    <?php
                            break;
                                         
             
                      
                    default:
                        # code...
                        break;
                }
   
                   


                 

                ?>
          
            </div>
            <div class="col">
            </div>

        </div>

    </div>
</body>

</html>