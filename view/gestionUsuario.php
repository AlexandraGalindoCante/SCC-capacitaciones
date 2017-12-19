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
  <title>SCC-Gestión Usuario</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="../css/custom.css"></link>
  <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
  <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
  <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css" >
  <script type="text/javascript">
   $(function(){
     $('a[title]').tooltip();
   });
   
 </script>
</head>
<body>
 <?php

 include('modals/md_modificarUsuario.php');
 include('modals/md_inhabilitarUsuario.php');
 include('modals/md_cambiarContrasena.php');
 ?>
 <div class="page form-page">
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
<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
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
<div class="content-inner" style="height: 800px;">
 <!-- Page Header-->
 <header class="page-header">
  <div class="container-fluid">
   <h2 class="no-margin-bottom"><i class="fa fa-cogs"></i> Usuarios</h2>
 </div>
</header>
<ul class="breadcrumb">
  <div class="container-fluid">
   <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="inicio.php"> Inicio</a></li>
   <li class="breadcrumb-item active">Gestión usuario</li>
 </div>
</ul>
<section >
  <div class="row" style="background-color: white">
   <div class="col-xs-9 col-sm-12 col-md-12">
     <div id="mtabs">
      <ul class="nav nav-tabs">
       <li class="active" style="text-align: center;"><a href="#tab2" rel="tab2"><i class="icon-list"></i>&nbsp;&nbsp;&nbsp;Lista usuarios  </a></li>
       <li><a href="#tab1" rel="tab1" style="text-align: center;"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Registro Usuario</a></li>
     </ul>
   </div>
   
   <div class="tab-content">
    
     <div class="tab-pane active" id="tab2">
      <div  id="containerT">
       <div class="col-xs-9 col-sm-12 col-md-12">
        <div  id="container">
         <div class="col-xs-9 col-sm-12 col-md-12">
          <div>
           <?php
           $con = conectar();
           if(!$con){
             die("imposible conectarse: ".mysqli_error($con));
           }
           if (@mysqli_connect_errno()) {
             die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
           }
           
           $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM  usuario where visibilidad='1'");
           if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
           
           $query = mysqli_query($con,"
            
            SELECT nombreUsuario,r.rol as rolU,r.idRol as idR ,numeroDocumento,contrasena FROM  usuario inner join rol as r on Usuario.rol=r.idRol where visibilidad='1'");
           
           if ($numrows>0){
            ?>
            <table class="table table-hover" id="tabla">
              <thead class="thead-inverse" title="Area">
               <tr>
                <th>Documento de identidad</th>
                <th>Nombre Usuario</th>
                <th>Rol</th>
                <th style="text-align: center;">Actualizar</th>
                <th style="text-align: center;">Deshabilitar</th>
                
              </tr>
            </thead>
            <tbody>
             <?php
             while($row = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td><?php echo $row['numeroDocumento'];?></td>
                <td><?php echo $row['nombreUsuario'];?></td>
                <td><?php echo $row['rolU'];?></td>
                <td>
                 <center><button type="button" class="btn btn-success"  class="close" data-dismiss="modal" aria-hidden="true"  data-toggle="modal"  data-target="#modificarUsuario" data-documento="<?php echo $row['numeroDocumento'] ?>" data-nombre="<?php echo $row['nombreUsuario'] ?>" data-contrasena="<?php echo $row['contrasena'] ?>" data-rol="<?php echo $row['idR'] ?>"> <i  class="fa fa-edit"></i></button>
                 </center>
               </td>
               <td>
                <center><button type="button" class="btn btn-danger"  data-documento="<?php echo $row['numeroDocumento'] ?>" class="close" data-dismiss="modal" aria-hidden="true"  data-toggle="modal"  data-target="#elimUsuario" > <i  class="fa fa-trash"></i></button>
                </center>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <?php
    }else {
      ?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Aviso!!!</h4>
        No hay datos para mostrar.
      </div>
      <?php
    }
    ?>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane " id="tab1">
  <div  id="containerT">
   <div class="col-xs-9 col-sm-12 col-md-12">
    <div class="card">
     <div class="card-header d-flex align-items-center">
      <h3 class="h4"> Registro usuario</h3>
    </div>
    <div class="card-body">
     <form class="form-horizontal"  action="../controller/controladorUsuario.php" action="post" name="crearUsuario">
       <div class="form-group row">
        <label class="col-sm-3 form-control-label">Número de documento: </label>
        <div class="col-sm-9">
         <input id="inputHorizontalSuccess" type="text" name="documento" placeholder="Ingrese su número de cédula" class="form-control form-control-success" required=""><small class="form-text"></small>
       </div>
     </div>
     <div class="form-group row">
      <label class="col-sm-3 form-control-label">Nombre de usuario: </label>
      <div class="col-sm-9">
       <input id="inputHorizontalSuccess" type="text" placeholder="Ingrese su nombre" name="nombreUsuario" class="form-control form-control-success" required=""><small class="form-text"></small>
     </div>
   </div>
   <div class="form-group row">
    <label class="col-sm-3 form-control-label">Contraseña: </label>
    <div class="col-sm-9">
     <input id="inputHorizontalWarning" type="password" placeholder="Ingrese una contraseña de minimo 8 caracteres " pattern=".{8,}" name="contrasena" class="form-control form-control-warning" required="este noo"><small class="form-text"></small>
   </div>
 </div>
 <div class="form-group row">
  <label class="col-sm-3 form-control-label">Rol: </label>
  <div class="col-sm-9">
   <select class="form-control" name="idRol" id="idRol" required="">
    <option value="" style="color: silver;">Seleccione el tipo de Usuario</option>
    <?php
    $mysql=conectar();
    $registro=$mysql->query("select idRol,rol from Rol") or die($mysql->error);
    while($reg=$registro->fetch_array()){
     echo "<option value=\"".$reg['idRol']."\">".$reg['rol']."</option>";
   }
   $mysql->close();
   ?>
 </select>
</div>
</div>
<div class="form-group row">
  <div class="col-sm-9 offset-sm-3">
   <button type="submit" value="1" name="funcion" id="funcion" class="btn btn-primary">Enviar</button>
 </div>
</div>
</form>
</div>
</div>
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
</footer>
</div>
<!-- Javascript files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/jquery.cookie.js"> </script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script> <!-- panel admin responsivo-->
<script type="text/javascript">
 $(document).ready(function(){
    //  When user clicks on tab, this code will be executed
    $("#mtabs li").click(function() {
               //  First remove class "active" from currently active tab
               $("#mtabs li").removeClass('active');

               //  Now add class "active" to the selected/clicked tab
               $(this).addClass("active");

               //  Hide all tab content
               $(".tab-pane").hide();

               //  Here we get the href value of the selected tab
               var selected_tab = $(this).find("a").attr("href");

               //  Show the selected tab content
               $(selected_tab).fadeIn();

               //  At the end, we add return false so that the click on the link is not executed
               return false;
             });
  });

</script>

<script src="../js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function() {
    $('#tabla').DataTable({
      "bSort": false,
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
<script>

  $('#modificarUsuario').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Botón que activó el modal
var doc = button.data('documento') // Extraer la información de atributos de datos
var nombre = button.data('nombre') // Extraer la información de atributos de datos
var pass = button.data('contrasena') // Extraer la información de atributos de datos
var rolUsuario = button.data('rol') // Extraer la información de atributos de datos



var modal = $(this)
modal.find('.modal-title').text('Modificar Usuario: '+nombre)
modal.find('.modal-body #documento').val(doc)
modal.find('.modal-body #nombre').val(nombre)
modal.find('.modal-body #contrasena').val(pass)
modal.find('.modal-body #rol').val(rolUsuario)


$('.alert').hide();//Oculto alert
})
</script>
<script type="text/javascript">
  $('#elimUsuario').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var id = button.data('documento') // Extraer la información de atributos de datos
    var modal = $(this)
    modal.find('#idUsuario').val(id)
  })
</script>







</body>
</html>