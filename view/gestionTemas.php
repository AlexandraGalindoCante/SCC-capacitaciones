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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCC-Capacitación</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="../css/custom.css"></link>
  <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
  <!-- Favicon-->
  <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
  <link rel="stylesheet" href="../css/font-awesome.min.css" >
  <script src="https://use.fontawesome.com/99347ac47f.js"></script>
  

</head>

<body>
  <?php
  include('modals/md_crearTema.php');
  include('modals/md_modificarTema.php');
  include('modals/md_inhabilitarTema.php');
  include('modals/md_cambiarContrasena.php');
  
  
  
  ?>
  <div class="page ">
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
              <li class="nav-item dropdown">
                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
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
              <li class="nav-item"><a href="consulta/cerrarSesion.php" class="nav-link logout">Cerrar sesion<i class="fa fa-sign-out"></i></a></li>

              
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
 <li>
   <a href="gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
 </li>

</ul>



<span class="heading"></span>
<ul class="list-unstyled"> 
  
  <li> <a href="empleadosReprobados.php"> <i class="icon-page"></i>Evaluacion</a>
  </li>
  <li> <a href="informeCapEmpleado.php"> <i class="icon-page"></i>Informes</a>
  </li>
  <li class="active">
    <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
  </li>
  
</ul>
</nav>

<div class="content-inner" style="height: 800px;">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom"></h2>
    </div>
  </header>
  <ul class="breadcrumb">
    <div class="container-fluid">
      <li class="breadcrumb-item"><a href="gestionCapacitador.php">Gestión temas</a></li>
      <li class="breadcrumb-item active">Registros</li>
    </div>
  </ul>
  <section>
   <div  id="containerT">
    <div class="col-xs-9 col-sm-12 col-md-12">
      
      <div>
        <h3 class='text-right'>   
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearTema" ><i class="fa fa-plus-circle" aria-hidden="true"></i>
           Nuevo tema
         </button>
       </h3>
       <?php
       $con = conectar();
       if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
      }
      if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
      }

      $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM Tema where visibilidad ='1'");
      if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

      $query = mysqli_query($con,"SELECT * FROM Tema where visibilidad=1 order by nombre asc ");

      if ($numrows>0){
        ?>
        <table class="table table-hover" id="tabla">
          <thead class="thead-inverse">
            <tr>
              <th>Nombre tema</th>
              <th>Descripción</th>
              <th style="text-align: center;">Modificar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td>
                  <?php echo $row['nombre'];?>
                </td>
                <td>
                  <?php echo $row['descripcion'];?>
                </td>

                <td>
                  <center> <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modificarTema" data-id="<?php echo $row['idTema']?>"
                   data-nombretema="<?php echo $row['nombre']?>" data-des="<?php echo $row['descripcion']?>">
                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;</button></center>
                 </td>
                 <td>
                  
                  <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#inhabilitarTema"  data-id="<?php echo $row['idTema']?>"
                    ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</button>
                  </td>
                  
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <?php
        } else {
          ?>
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <h4>Aviso!!!</h4> No hay datos para mostrar
          </div>
          <?php
        }
        ?>
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
</footer>
</div>

<!-- Javascript files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.cookie.js">
</script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<!-- panel admin responsivo-->

<script src="../js/jquery.dataTables.min.js"></script>

<script>

  $('#modificarTema').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id= button.data('id') // Extraer la información de atributos de datos
          var tema= button.data('nombretema') // Extraer la información de atributos de datos
          var descrip = button.data('des') // Extraer la información de atributos de datos
          

          var modal = $(this)
          modal.find('.modal-title').text('Modificar Tema: '+id)
          modal.find('.modal-body #idTema').val(id)
          modal.find('.modal-body #nomTema').val(tema)
          modal.find('.modal-body #descripcion').val(descrip)
          
          $('.alert').hide();//Oculto alert
        })
      </script>

      <script>

        $('#inhabilitarTema').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id= button.data('id') // Extraer la información de atributos de datos
          var modal = $(this)
          modal.find('.modal-title').text('Eliminar Tema: '+id)
          modal.find('.modal-body #idTema').val(id)
          
          $('.alert').hide();//Oculto alert
        })
      </script>
      <script type='text/javascript'>
        $(document).ready(function() {
          $('#tabla').DataTable({
            "pagingType": "numbers",
            "lengthChange": false,
            "pageLength": 6,
            "language": {
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "zeroRecords": "No se encontro ningun registro",
              "search": "Buscar: ",
              "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
              },
              "infoFiltered": "(Filtrado de _MAX_ registros totales)"
            }

          });
        });
      </script>
    </body>

    </html>