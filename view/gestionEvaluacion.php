<?php
session_start();
include ('libreriaSCC.php'); 

if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
   header('Location: ../index.php' );

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../css/custom.css"></link>
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
    <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
    <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <script src="../js/app.js"></script>
    <script type="text/javascript">
        function cargarId(idA) {
            document.getElementById("idAsignacionEmpleado").value = idA;
        }
    </script>
    <script>
        $(document).ready(function() {
            <?php

            if (isset($_SESSION['moduloEvaluacion'])){
                echo 'cargar('.$_SESSION['moduloEvaluacion'].');';
                echo 'console.log('.$_SESSION['moduloEvaluacion'].');';
            }
            ?>

        });
    </script>
</head>

<body>
    <?php

    include_once('modals/md_registrarEvaluacion.php');
    include_once('modals/md_modificarEvaluacion.php');
    include('modals/md_cambiarContrasena.php');

    ?>
    <div class="page form-page">
        <header class="header">
            <nav class="navbar">
                <div class="search-box">
                    <button class="dismiss"><i class="icon-close"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="text" placeholder="Buscar..." class="form-control">
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header">
                            <a href="gestionCapacitacion.php" class="navbar-brand">
                                <div class="brand-text brand-big hidden-lg-down"><span> SCC </span><strong> Sistema control de capacitaciones</strong></div>
                                <div class="brand-text brand-small"><strong>SCC</strong></div>
                            </a>
                            <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                        </div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown">
                                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                    <i class="fa fa-bell-o"></i><span class="badge bg-red">12</span>
                                </a>
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
                                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"><strong>view all notifications </strong>   </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Logout    -->
                            <li class="nav-item">
                                <a href="consulta/cerrarSesion.php" class="nav-link logout">Cerrar sesion<i class="fa fa-sign-out"></i></a>
                            </li>
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
                        <p>
                            <?php echo $_SESSION['rol'];?>
                        </p>
                        <h6 style="width: 100%; text-decoration-style:underline;">   
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
                    <li>
                        <a href="../calendar/agenda.php"> <i class="fa fa-calendar-o"></i>Calendario</a>
                    </li>
                </li>
                <li>
                    <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>&nbsp; Gestión empleado</a>
                    <ul id="empleados" class="collapse list-unstyled">
                        <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="active" href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Gestión capacitación&nbsp;</a>
                    <ul id="capacitaciones" class="collapse list-unstyled">

                        <li>
                            <a href="gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="list-unstyled">
                <li>
                    <a href="gestionModulo.php"><i class="fa fa-object-group" aria-hidden="true" ></i>Módulos</a>
                </li>
                <li>
                    <a href="gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
                </li>

            </ul>

            <span class="heading"></span>
            <ul class="list-unstyled">

            </li>
            <li>
                <a href="informeCapEmpleado.php"> <i class="fa fa-file-text-o"></i>Informes</a>
            </li>
            <li>
                <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
            </li>

        </ul>
    </nav>

    <div class="content-inner" style="background-color: white; height: 1200px;">
        <header class="page-header" style="padding:10px;">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Evaluación capacitación</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><i class="fa fa-arrow-circle-left "></i> <a href="gestionCapacitacion.php">Volver</a></li>
                <li class="breadcrumb-item active">Evaluación modulo</li>
            </div>
        </ul>

        <section>
            <div id="container-fluid" style="height: 80%;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <?php
                    $con = conectar();
                    if(!$con){
                        die("imposible conectarse: ".mysqli_error($con));
                    }
                    if (@mysqli_connect_errno()) {
                        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                    }

                    $count_query= mysqli_query($con,"
                        SELECT count(*) as numrows from modulosProgramacion where idProgramacion = '$_SESSION[idProgramacion]'; ");
                    if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

                    $query =      mysqli_query($con,"SELECT DISTINCT idModulo,CURDATE() as fecha, nombreModulo FROM modulosProgramacion WHERE idProgramacion = '$_SESSION[idProgramacion]' ORDER BY nombreModulo");

                    if ($numrows>0){
                        ?>
                        <div class="r" style="background-color: white">

                            <div class="btn-roup">
                                <?php
                                while ($row = mysqli_fetch_array($query)){
                                  ?>

                                  <button class="btn btn-info btn-md " onclick="cargarTablaEvaluacion(<?php echo $row['idModulo']; ?>)">
                                    <?php echo $row['nombreModulo'];
                                    $_SESSION['nombreMod']=$row['nombreModulo'];
									$_SESSION['fecha']=$row['fecha']; ?>
                                </button>
                                <?php
                            }
                        }
                        ?>
                    </div>                
                    <div class="row" style="margin-top:50px;">
                        <div class="col-lg-12">
                            <div id="loadEvaluacion" class="text-center"> </div>
                            <div class="datos_ajax_delete"></div>

                            <div class="outer_div"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

<footer class="main-footer">
    <div class="container-fluid">
        <div class="text-center" style="text-align: center;">
            <p>SISTEMA CONTROL DE CAPACITACIONES | GF Cobranzas juridicas-CyCP &copy; 2017</p>
        </div>

    </div>
</div>
</footer>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Javascript files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/jquery.cookie.js">
</script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<!-- panel admin responsivo-->


<script type="text/javascript">
    function cargar(modulo) {
        $("#tabla").remove();
        var parametros = {
            "action": "ajax",
            "modulo": modulo
        };
        $("#loadEvaluacion").fadeIn('slow');
        $.ajax({
            url: 'consulta/cargarEvaluacion.php',
            data: parametros,
            beforeSend: function(objeto) {
                $("#loadEmpleado").html("<img src='../imagenes/loader.gif'>");
            },
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $("#loadEvaluacion").html("");
                cargarTabla();
            }
        })
    }
</script>
<script>
    $( document ).ready(function() {
        <?php
        
        if (isset($_SESSION['moduloEvaluacion'])){
            echo 'cargarTablaEvaluacion('.$_SESSION['moduloEvaluacion'].');';
            echo 'console.log('.$_SESSION['moduloEvaluacion'].');';
        }
        ?>
        

    });
</script>


<script type="text/javascript">
    $('#crearEvaluacion').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Botón que activó el modal
                    var modulo = button.data('modulo') // Extraer la información de atributos de datos
                    var empleado = button.data('empleado') // Extraer la información de atributos de datos
                    var estado = button.data('estado') // Extraer la información de atributos de datos
                    var modal = $(this)
                    modal.find('.modal-body #modulo').val(modulo)
                    modal.find('.modal-body #estado').val(estado)
                    modal.find('.modal-body #empleado').val(empleado)
                    $('.alert').hide(); //Oculto alert
                })
            </script>

            <script type="text/javascript">
                $('#modificarEvaluacion').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Botón que activó el modal
                    var observaciones = button.data('obs') // Extraer la información de atributos de datos
                    var modulo = button.data('modulo') // Extraer la información de atributos de datos
                    var empleado = button.data('empleado') // Extraer la información de atributos de datos
                    var estado = button.data('estado') // Extraer la información de atributos de datos
                    var calificacion = button.data('calificacion') // Extraer la información de atributos de datos
                    var modal = $(this)
                    modal.find('.modal-body #modulo').val(modulo)
                    modal.find('.modal-body #empleado').val(empleado)
                    modal.find('.modal-body #calificacion').val(calificacion)
                    modal.find('.modal-body #estado').val(estado)
                    modal.find('.modal-body #observaciones').val(observaciones)
                    $('.alert').hide(); //Oculto alert
                })
            </script>

            <script type="text/javascript">
                function cargarTablaEvaluacion(modulo) {
                    cargar(modulo);
                    
                }
            </script>

        </body>

        </html>