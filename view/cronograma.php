<?php
session_start();
include ('libreriaSCC.php'); 

if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
      header('Location: ../index.php' );
  }

include("../models/Datos.php");
    $datos = new Datos();
    $mysql = $datos->conectar();


    $count_query   = mysqli_query($mysql,"SELECT count(*) AS numrows FROM modulo INNER JOIN 
    (select idModulo, MAX(fechaFin) as fechaFin
    from programacion inner join asigModulo on  asigModulo.idProgramacion = programacion.idProgramacion GROUP BY asigModulo.idModulo) as grupo
    on grupo.idModulo = modulo.idModulo
    where (TIMESTAMPDIFF(MONTH, grupo.fechaFin, CURDATE()))>= modulo.frecuencia-1") or die(mysqli_error($mysql));
    $consulta = mysqli_query($mysql, "

       
    
    SELECT nombreModulo,fechaFin ,(TIMESTAMPDIFF(MONTH, grupo.fechaFin, CURDATE()) - modulo.frecuencia) as diferencia 
    FROM modulo INNER JOIN 
    (select idModulo, MAX(fechaFin) as fechaFin
    from programacion inner join asigModulo on  asigModulo.idProgramacion = programacion.idProgramacion GROUP BY asigModulo.idModulo) as grupo
    on grupo.idModulo = modulo.idModulo
    where (TIMESTAMPDIFF(MONTH, grupo.fechaFin, CURDATE())>= modulo.frecuencia-1)
") or die(mysqli_error($mysql));
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SCC</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
         <link rel="stylesheet" href="../css/custom.css"></link>
        <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
        <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
        <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
        <script src="https://use.fontawesome.com/99347ac47f.js"></script>
     
        <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css"></link>
      
    </head>

    <body>
    <?php
    include('modals/md_crearProgramacion.php');
    include('modals/md_cambiarContrasena.php');

    ?>
        <div class="page">
            <!-- Main Navbar-->
            <header class="header">
                <nav class="navbar">
                    <!-- Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="icon-close"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="text" placeholder="Buscar..." class="form-control">
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <!-- Navbar Header-->
                            <div class="navbar-header">
                                <!-- Navbar Brand -->
                                <a href="gestionCapacitacion.php" class="navbar-brand">
                                    <div class="brand-text brand-big hidden-lg-down"><span> SCC </span><strong> Sistema control de capacitaciones</strong></div>
                                    <div class="brand-text brand-small"><strong>SCC</strong></div>
                                </a>
                                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                            </div>
                            <!-- Navbar Menu -->
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                                <!-- Search-->
                                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                                <!-- Notifications-->
                                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red"></span></a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                                    <div class="notification-time"><small>10 minutes ago</small></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a>
                                        </li>
                                    </ul>
                                </li>
                                             <!-- Logout    -->
                                <li class="nav-item"><a href="../login.html" class="nav-link logout">Cerrar sesion<i class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="page-content d-flex align-items-stretch">
                <!-- Side Navbar -->
             <nav class="side-navbar">
               <!-- Sidebar Header-->
               <div class="sidebar-header d-flex align-items-center">
                  <div class="avatar"><img src="../imagenes/user1.png" alt="..." class="img-fluid rounded-circle"></div>
                  <div class="title">
                     <h1 class="h4"><?php echo $_SESSION['nombreUsuario'];?></h1>
                     <p><?php echo $_SESSION['rol'];?></p>
                     <h6  style="width: 100%; text-decoration-style:underline;">   
              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modContrasena" >
           Cambiar contraseña
          </button>
            </h6>
                  </div>
               </div>
                <span class="heading"><center> BIENVENIDO</center></span>
                <ul class="list-unstyled">
             <li>
                     <a href="inicio.php"> <i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp;Inicio</a>
                  </li>
                 <li>
             <li> <a href="../calendar/agenda.php"> <i class="icon-bill"></i>Calendario</a>
                    </li>
                  <a href="#cronograma" aria-expanded="false" data-toggle="collapse"> <i class="icon-clock"></i>Cronograma</a>
                    <ul id="cronograma" class="collapse list-unstyled">
                      <li>
                        <a href="cronograma1.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Cronograma empleados</a>
                      </li>
                      <li>
                        <a href="cronograma.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Cronograma módulos</a>
                      </li>
                     
                     </ul>
                      </li>
                        <li>
                        <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>&nbsp; Gestión empleado</a>
                        <ul id="empleados" class="collapse list-unstyled">
                          <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
                          </li>
                          
                        </ul>
                      </li>
                      <li>
                        <a href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation" aria-hidden="true" ></i> &nbsp;Gestión capacitación&nbsp;</a>
                          <ul id="capacitaciones" class="collapse list-unstyled">
                             <li>
                              <a href="verCapacitaciones.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones</a>
                            </li>
                               <li>
                              <a href="gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones proximas</a>
                            </li>
                          </ul>
                      </li>
                     
                   
                    </ul>
              
                  <ul class="list-unstyled"> 
                    <li>
                           <a href="gestionModulo.php"><i class="icon-interface-windows" aria-hidden="true" ></i>Módulos</a>
                        </li>
                        <li>
                           <a href="gestionTemas.php"><i class="fa fa-object-ungroup" aria-hidden="true" style="font-size: 18px;"></i>Temas</a>
                        </li>
                        <li class="active">
                           <a href="gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
                        </li>

                   </ul>



                          <span class="heading"></span>
                  <ul class="list-unstyled"> 
                    
                  <li> <a href="empleadosReprobados.php"> <i class="icon-page"></i>Evaluacion</a>
                    </li>
                    <li> <a href="informeCapEmpleado.php"> <i class="icon-page"></i>Informes</a>
                    </li>
                    <li>
                      <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
                    </li>
                     
                  </ul>
            </nav>
                  <div class="content-inner" style="height: 800px; background-color: white;">
                         <!-- Page Header-->
                   <header class="page-header">
                      <div class="container-fluid">
                         <h2 class="no-margin-bottom">Gestión capacitación</h2>
                      </div>
                   </header>
                    <ul class="breadcrumb">
                       <div class="container-fluid">
                           <li class="breadcrumb-item">&nbsp;<a href="inicio.php">Volver</a></li>
                            <li class="breadcrumb-item active">Proximas capacitaciones</li>
                        </div>
                     </ul>
      </nav>
       <section style="width: 100%; height: 100%;" >

       <div class="content-inner" style="width: 100%; height: 800px;" >
        <header class="page-header">
          <div class="container-fluid">
          <h2 class="no-margin-bottom">Control capacitaciones</h2>
          </div>
        </header>
                 
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="gestionCapacitacion.php">Volver</a></li>
                <li class="breadcrumb-item active">Módulos por programar</li>
            </div>
        </ul>
        <!-- Forms Section-->
   
           
            <div>

            <div class="text-right">
            <button class="btn btn-danger btn-md"   type="button"  data-toggle="modal" data-target="#crearProgramacion"  ><i class="icon icon-clock" aria-hidden="true"></i> Programar</button>
            </div>
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="pull">
                            <div class="btn-group">
                              
                             
                                <button type="button" class="btn btn-warning btn-filter" data-target="all">Proximas capacitaciones</button>
                            </div>
                        </div>
                        <div class="table-container" style="background-color: #FFF">

                            <table class="table table-condensed">
                                <tbody>
                                <?php
                                while($tabla = mysqli_fetch_array($consulta)){
                                        if($tabla['diferencia'] >= "0"){
                                            $estado = "proximo";
                                            $nombreEstado = " visto ultima vez";
                                        }else {
                                            $estado = " programada ";
                                            $nombreEstado = "Programado";
                                        }
                                         ?>
                                   
                                            <tr data-status="<?php echo $estado ?>">
                                        
                                                <td>
                                                    <div class="media">
                                                        <div class="media-body">
                                                        <h4>Módulo</h4>
                                                            <span class="media-meta pull-right"> <?php echo $tabla['fechaFin'] ?> </span>
                                                            <h4 class="title">
                                                                Módulo: <?php echo $tabla['nombreModulo'] ?> 
                                                                <span class="pull-right <?php echo $estado ?>">(<?php echo $nombreEstado?>)&nbsp&nbsp</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                             
                                            </tr>
                                        
                                    <?php
                                        } //fin while
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
          </div>
       </di+v>
     </div>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="text-center" style="text-align: center;">
            <p>SISTEMA CONTROL DE CAPACITACIONES | GF Cobranzas juridicas-CyCP &copy; 2017</p>
            </div>
          
        </div>
    </footer>
      </div>

        
        <!-- Javascript files-->
      <script src="../js/jquery.min.js"></script>  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <script src="../js/jquery.cookie.js">
        </script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/front.js"></script>
        <!-- panel admin responsivo-->
        <script src="../js/app.js"></script>
        <script>
        $(document).ready(function () {

        $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
        }
        });

        });
        </script>


        


       
    </body>

    </html>