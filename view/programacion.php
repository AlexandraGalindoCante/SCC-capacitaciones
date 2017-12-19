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
  <link href="https://fonts.googleapis.com/css?family=Arimo|Lato" rel="stylesheet"></link>
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
  <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>&nbsp; Gestión empleado</a>
  <ul id="empleados" class="collapse list-unstyled">
    <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
    </li>

  </ul>
</li>
<li>
  <a class="active" href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-list-alt" aria-hidden="true" ></i> &nbsp;Gestión capacitación&nbsp;</a>
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
<li> <a href="informeCapEmpleado.php"> <i class="fa fa-file-text-o"></i>Informes</a>
</li>
<li>
  <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
</li>

</ul>
</nav>
<div class="content-inner" style="height:90%; padding-bottom:10px;">
 <!-- Page Header-->
 <div class="page-header">
  
  <?php 
  $con = conectar();
  if(!$con){
    die("imposible conectarse: ".mysqli_error($con));
  }
  if (@mysqli_connect_errno()) {
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  }

  $mysql=mysqli_query($con,"set names 'utf8'");
  $count_query= mysqli_query($con," SELECT count(*) AS numrows FROM ver_Programacion  where idProgramacion='$_SESSION[idP]'");
  if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
  $consulta = mysqli_query($con,"SELECT idProgramacion,tipoCapacitacion,modalidad,fechaInicio,fechaFin,nivel,modulo FROM  ver_Programacion where idProgramacion= $_SESSION[idP]") or die(mysqli_error($mysql));        
  ?>

  <div class="col-lg-12"> 
   <div class="articles card"> 
     
    <div class="card-header d-flex ">
      <p>
        <h4  style="color:gray"><img src="../imagenes/program.png" style="height: 50px; width: 50px;"> Detalles de la programación</h4></p>
      </div>  
      
      <div style="padding: 40px;">  
        <?php
        while( $array = mysqli_fetch_array($consulta)){
          ?>
          <div class="card" style="background: ghostwhite;border:1px solid rgba(192, 192, 192, 0.24);">
            <div class="card-header" style="background:#4CB0D0;color: white;font-weight: bolder;"></div>
            <div style="padding-left: 15px;">
              <br>
              <div class="title"><h4  style="color: gray;font-weight:bold";>Capacitación:</h4>
                <?php echo $array['tipoCapacitacion']?>
              </div>
              <div class="subtitle">
                <h5  style="color: gray;font-weight:bold;"">Modalidad:</h5><?php echo $array['modalidad']?>
                DE <?php echo  $_SESSION['idP'];$array['nivel'];?>
                <h5  style="color: gray;font-weight:bold;"">Programada para la fecha :</h5><?php echo $array['fechaInicio']?>
                <br><br>
                <h5  style="color: gray;font-weight:bold;">Módulos:</h5>
                <?php
                while( $row = mysqli_fetch_array($consulta)){
                  ?>
                  <h6 style="color:dark-blue; font-weight:normal;">&#8226; <?php echo $row['modulo'];?></h6>
                  <br>
                  <?php
                }
                ?>

              </div>
              
              <?php
            }
            ?>

            
            
            <h4 style="color: gray;font-weight:bold; padding-top: 20px;">Empleados programados</h4>    
          </div>
          
          
          <?php
          


          
          $mysql=mysqli_query($con,"set names 'utf8'");
          $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM verEmpProgramados where idProgramacion=20");
          if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
          
          $query = mysqli_query($con,"SELECT * FROM  verEmpProgramados where idProgramacion=20");

          if ($numrows>0){
           ?>
           <br>
           
           <table class="table" id="tabla">
             <thead>
              <tr>
               <th>Documento</th>
               <th>Nombre</th>
               <th>Nivel escolar</th>
               <th>Area</th>
               <th>Empresa</th>
               
               
             </tr>
           </thead>
           <tbody>
             <?php
             while($row = mysqli_fetch_array($query)){
              ?>
              <tr>
               <td><?php echo $row['documento'];?></td>
               <td><?php echo $row['nombreCompleto'];?></td>
               <td><?php echo $row['nivelEscolar'];?></td>
               <td><?php echo $row['area'];?></td>
               <td><?php echo $row['empresa'];?></td>
               <td>
                
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
    

    <br>
    
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