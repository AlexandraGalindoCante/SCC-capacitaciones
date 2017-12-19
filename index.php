<?php
  if($_SESSION['sesion']=1){
    $_SESSION['sesion']=0;
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCC</title>
    <link   rel="stylesheet" type="text/css" href="css/estilosS.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <link rel="shortcut icon" href="imagenes/favicon.ico">
 
  </head>

  <body>
  <header>
<?php
include('view/modals/md_recuperacionContrasena.php');
?>
  </header>
    <div class="page login-page" id="panel2">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-md-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1 style="color: silver"><span style="color:#125697">S</span>CC</h1>
                  </div>
                  <p>SISTEMA CONTROL DE CAPACITACIONES</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white" style="padding-top: 45px;"><center><h4>INGRESO AL SISTEMA</h4></center>
              <div class="form d-flex align-items-center"> 
                <div class="content" style="padding-bottom:95px;">
                  <form id="login-form" method="post"  action="controller/controladorUsuario.php"  >
                    <div class="form-group">
                    <label for="login-username" class="label-material">Número de documento</label>
                     <div id="mensaje0" class="errores">Ingrese número de documento registrado. </div>
                      <div id="mensaje3" class="errores"> Documento no válido</div>
                      <input id="documento" type="text" name="documento" required="" class="input-material" required="Ingrese número de documento registrado" autofocus>
                      
                    </div>
                    <div class="form-group">
                      <label for="login-password" class="label-material">Contraseña</label>
                      <div id="mensaje2" class="errores"> Ingrese su contraseña </div>
                      <input id="contrasena" type="password" name="contrasena" required="" class="input-material" autofocus>
                    </div><button type="submit" name="funcion" id="funcion" value="2" class="btn btn-primary">Iniciar sesion</button>
                  
                  </form><a href="#" class="forgot-pass" data-toggle="modal" data-target="#recuperarContrasena" >Olvidaste tu contraseña?</a><br><a href="" class="signup" id="recPass" ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>SISTEMA CONTROL DE CAPACITACIONES GF-CyCP | Todos Los Derechos Reservados  &copy; 2017</a></p>
     
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/front.js"></script>
   
  
  </body>
</html>