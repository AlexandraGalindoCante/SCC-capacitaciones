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

</head>
<body>
  <?php
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
  <li> <a href="../calendar/agenda.php"> <i class="fa fa-calendar-o"></i>Calendario</a>
  </li>
</li>
<li>
  <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>&nbsp; Gestion empleado</a>
  <ul id="empleados" class="collapse list-unstyled">
    <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
    </li>

  </ul>
</li>
<li>
  <a class="active" href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-list-alt" aria-hidden="true" ></i> &nbsp;Gestion capacitacion&nbsp;</a>
  <ul id="capacitaciones" class="collapse list-unstyled">
    
    <li>
      <a href="gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones</a>
    </li>
  </ul>
</li>


</ul>

<ul class="list-unstyled"> 
  <li>
   <a href="gestionModulo.php"><i class="fa fa-object-group" aria-hidden="true" ></i>Modulos</a>
 </li>
 <li>
   <a href="gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
 </li>

</ul>



<span class="heading"></span>
<ul class="list-unstyled"> 

</li>
<li> <a href="informeCapEmpleado.php"> <i class="fa fa-file-text-o"></i>Informes</a>
</li>
<li>
  <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
</li>

</ul>
</nav>
<div class="content-inner" style="height:1100px; padding-bottom:10px;">

 <div class="page" id="page">
   <img src="../imagenes/informe1.png" alt="image-responsive">  
   <center><h2>Reporte de Capacitaciones</h2></center>
   <div>
     <h5>Encontrara el reporte de Capacitaciones vistas por el empleado</h5>
   </div>

   <div class="col-md-9 col-sm-9" >
    <br>
    <div class="container">
     <form class="form-group">
       <div class="form-group">
        <label class="control-label col-sm-4" for="documento" style="color:#2A3F54;font-weight:bold;">Número de  documento:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="doc"  name="doc">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-info" id="" value="#doc"  onclick="cargarId()">Consultar </button> 
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<div class="container" style="padding-top: 30px; padding-left: 10px;">
 <!-- tabla  -->
 <div class="row">
  <div class="col-xs-12">
   <div id="loadCap" class="text-center"></div>
   <div class="datos_ajax_delete"></div>
   <!-- Datos ajax Final -->
   <div class="outer_div"></div>
   <!-- Datos ajax Final -->
 </div>
</div>
</div>

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
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.cookie.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 function cargarId() {
   var documento = document.getElementById("doc").value;
   load(documento);
 }
</script>
<script type="text/javascript">
 function load(doc){
   var parametros = {"action":"ajax","doc":doc};
   $("#loadCap").fadeIn('slow');
   $.ajax({
     url:'consulta/cargarCapcitacionEmpleado.php',
     data: parametros,
     success:function(data){
       $(".outer_div").html(data).fadeIn('slow');
       $("#loadCap").html("");
     }
   })
 }
</script>
<script>
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


