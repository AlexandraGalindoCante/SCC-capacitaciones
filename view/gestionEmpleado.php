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
  <title>SCC-Gestión Empleado</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="../css/custom.css"></link>
  
  <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>        
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
  <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>        
  <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
  <link rel="stylesheet" href="../css/font-awesome.min.css" >


</head>

<body>
  <?php
  include('modals/md_registrarEmpleado.php');
  include_once('modals/md_modificarEmpleado.php');
  include_once('modals/md_inhabilitarEmpleado.php');
  include('modals/md_cambiarContrasena.php');
  include('modals/md_verEmpleado.php');
  ?>
  <div class="page form-page">
    <!-- Main Navbar-->
    <header class="header">
      <nav class="navbar fixed">
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

<div class="content-inner" style="height: 800px;">
  <!-- Page Header-->
  <header class="page-header">
    <ul class="breadcrumb">
      <div class="container-fluid">
        <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="inicio.php">Inicio</a></li>
        <li class="breadcrumb-item active">Listado empleados</li>
      </div>
    </ul>
  </header>

  <section>
   <div  id="containerT" style="background:white;">
    <div class="col-xs-9 col-sm-12 col-md-12">

      <div>
        <h3 class='text-right'>   
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#registroEmpleado" ><i class="fa fa-plus-circle" aria-hidden="true"></i>
            Nuevo Empleado
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
        $mysql=mysqli_query($con,"set names 'utf8'");

        $count_query  = mysqli_query($con,"SELECT count(*) AS numrows FROM Empleado where visibilidad ='1'");
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

        $query = mysqli_query($con,"SELECT * FROM  cargarEmpleado order by nombreCompleto asc");

        if ($numrows>0){
          ?>
          <table class="table table-hover" id="tabla">
            <thead class="thead-inverse">
              <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Escolaridad</th>
                <th>Área</th>
                <th>Ver más detalles</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td>
                    <?php echo $row['documento'];?>
                  </td>
                  <td>
                    <?php echo $row['nombreCompleto'];?>
                  </td>

                  <td>
                    <?php echo $row['correoElectronico'];?>
                  </td>
                  <td>
                    <?php echo $row['nivelEscolar'];?>
                  </td>
                  <td>
                    <?php echo $row['area'];?>
                  </td>



                  <td style="text-align:center;">
                    <button type="button" class="btn btn-info btn-md" data-doc="<?php  echo $row['documento']?>" data-toggle="modal" onclick="load(<?php echo $row['documento']; ?>)"   data-target="#verEmp" ><i class="fa fa-eye" aria-hidden="true"></i></button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modificarEmpleado" data-documento="<?php echo $row['documento']?>" data-nombre="<?php echo $row['nombreCompleto']?>" data-telefono="<?php echo $row['telefono']?>" data-correo="<?php echo $row['correoElectronico']?>" data-nivel="<?php echo $row['idTipoNiv']?>" data-tipo="<?php echo $row['idTipoCon']?>" data-fechaInicio="<?php echo $row['fechaInicioLaboral']?>"
                     data-fechafin="<?php echo $row['fechaFin']?>"  data-numcontrato="<?php echo $row['numContrato']?>" data-dep="<?php echo $row['idDep']?>" data-empresa="<?php echo $row['empresa']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</button>

                  </td>
                  <td>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-doc="<?php  echo $row['documento']?>" data-target="#inhabilitarEmpleado" ><i class="fa fa-trash" aria-hidden="true"></i></button>
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
<script src="../js/jquery.min.js"></script>
<script>

  $('#modificarEmpleado').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Botón que activó el modal
var doc = button.data('documento') // Extraer la información de atributos de datos
var nombre = button.data('nombre') // Extraer la información de atributos de datos
var correo = button.data('correo') // Extraer la información de atributos de datos
var nivelE = button.data('nivel') // Extraer la información de atributos de datos
var contrato = button.data('tipo') // Extraer la información de atributos de datos
var fechaIni = button.data('fechainicio')// Extraer la información de atributos de datos
var fechaTerm = button.data('fechafin')// Extraer la información de atributos de datos
var numCont= button.data('numcontrato')// Extraer la información de atributos de datos
var departamento= button.data('dep')// Extraer la información de atributos de datos
var empr = button.data('empresa')// Extraer la información de atributos de datos


var modal = $(this)
modal.find('.modal-title').text('Modificar empleado: ')
modal.find('.modal-body #documento').val(doc)
modal.find('.modal-body #nombreCompleto').val(nombre)
modal.find('.modal-body #correoElectronico').val(correo)
modal.find('.modal-body #idTipoNivelEscolar').val(nivelE)
modal.find('.modal-body #idTipoContrato').val(contrato)
modal.find('.modal-body #fechainicio').val(fechaIni)
modal.find('.modal-body #fechaterminacion').val(fechaTerm) 
modal.find('.modal-body #numContrato').val(numCont)
modal.find('.modal-body #idDepartamento').val(departamento)
modal.find('.modal-body #empresa').val(empr)

$('.alert').hide();//Oculto alert
})
</script>

<script src="../js/jquery.cookie.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/tether.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function() {
    $('#tabla').DataTable({
      "bSort": false,
      "pagingType": "numbers",
      "lengthChange": false,
      "pageLength": 8,
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
<script type="text/javascript">
  $('#inhabilitarEmpleado').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('doc') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#documento').val(id)
    })
  </script>
  <script type="text/javascript">
  $('#verEmp').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('doc') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#doc').val(id)
    })
  </script>

  <script type="text/javascript">
   function load(doc){
     var parametros = {"action":"ajax","doc":doc};
     $("#loadEmpleado").fadeIn('slow');
     $.ajax({
       url:'consulta/verEmpleado.php',
       data: parametros,
       success:function(data){
         $(".outer_div").html(data).fadeIn('slow');
         $("#loadEmpleado").html("");
       }
     })
   }
 </script>

</body>

</html>