<?php
session_start();
include ('libreriaSCC.php'); 

//if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
 //header('Location: ../index.php' );
//}

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCC-Control capacitación</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="../css/font-awesome.css" >
  <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="../css/custom.css"></link>
  <link rel="stylesheet" href="../css/mdb.min.css"></link>
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
  <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
  <link rel="shortcut icon" href="../imagenes/favicon.ico"></link> 


</head>
<body>
  <?php
  include('modals/md_asignarModulo.php');
  include('modals/md_verModulos.php');
  include('modals/md_inhabilitarProgramacion.php');
  include('modals/md_modificarProgramacion.php');
  include('modals/md_cambiarContrasena.php');
  include('modals/md_cargarArchivo.php');
  include('modals/md_eliminarArchivo.php');
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
<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"><strong>view all notifications                                            </strong>   </a>
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

  <li> <a href="informeCapEmpleado.php"> <i class="fa fa-file-text-o"></i>Informes</a>
  </li>
  <li>
    <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
  </li>

</ul>
</nav>
<div class="content-inner" style="height: 800px; background-color: white;">
  <br>
  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">

        <?php 
        $con = conectar();
        if(!$con){
          die("imposible conectarse: ".mysqli_error($con));
        }
        if (@mysqli_connect_errno()) {
          die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
        }
        $cant=mysqli_query($con,"SELECT count(*) as num FROM ver_programacionesProximas");
        if ($row= mysqli_fetch_array($cant)){$num = $row['num'];}
        ?>

        <div class="col-4">
          <div class="item d-flex align-items-center">
            <div class="icon bg-red"><i class="fa fa-calendar-plus-o"></i></div>
            <div class="title"><span>Proximas<br>Capacitaciones</span>
              <div class="progress">
                <div role="progressbar" style="width: <?php echo $num;?>%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
              </div>
            </div>
            <div class="number"><strong><?php echo $num;?></strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-4 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-green"><i class="fa fa-calendar-check-o"></i></div>
            <div class="title"><span>Programaciones<br>Calificadas</span>
              <div class="progress">
                <?php 
                $con = conectar();
                if(!$con){
                  die("imposible conectarse: ".mysqli_error($con));
                }
                if (@mysqli_connect_errno()) {
                  die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                }
                $cant=mysqli_query($con,"SELECT count(*) as num FROM programacion where estado=2 and visibilidad=1");
                if ($row= mysqli_fetch_array($cant)){$num = $row['num'];}
                ?>
                <div role="progressbar" style="width:<?php echo $num;?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
              </div>
            </div>
            <div class="number"><strong><?php echo $num;?></strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-4">
          <div class="item d-flex align-items-center">
            <div class="icon bg-orange"><i class="fa fa-calendar"></i></div>
            <div class="title"><span>Capacitaciones<br>por evaluar</span>
             <div class="progress">
              <?php 
              $con = conectar();
              if(!$con){
                die("imposible conectarse: ".mysqli_error($con));
              }
              if (@mysqli_connect_errno()) {
                die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
              $cant=mysqli_query($con,"SELECT count(*) as num FROM programacion where estado='1' and visibilidad=1");

              if ($row= mysqli_fetch_array($cant)){$num = $row['num'];}
              ?>

              <div role="progressbar" style="width:<?php echo $num;?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
            </div>
          </div>
          <div class="number"><strong><p style="width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;line-height: 1.42857; background: silver;" "><?php echo $num;?></p></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div  id="containerT">
   <div class="col-xs-9 col-sm-12 col-md-12">

    <?php

    $con = conectar();
    if(!$con){
     die("imposible conectarse: ".mysqli_error($con));
   }
   if (@mysqli_connect_errno()) {
     die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
   }
   $mysql=mysqli_query($con,"set names 'utf8'");
   $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM programacion where visibilidad=1");
   if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

   $query = mysqli_query($con,"SELECT  pr.idProgramacion,fechaInicio,fechaFin,hora,modalidad,titulo,tipoCapacitacion,nivel,pr.fechaReg,color,estado, cargado,ruta,idArchivo
     FROM programacion as pr left join archivo as ar on pr.idProgramacion=ar.idProgramacion where visibilidad=1  order by idProgramacion desc ");

   if ($numrows>0){
     ?>
     <style type="text/css">
     table{
      text-align: justify-all;
    }
  </style>
  <table class="table table-hover" id="tabla">
   <thead class="thead-inverse">
    <tr>
      <th></th>

      <th>Titulo</th>
      <th>Fecha</th>
      <th>Tipo capacitación</th>         
      <th>Asignaciones</th> 
      <th>Ver estado</th>  
      <th>Evaluación</th>             
      <th style="text-align: center;">ASISTENCIA</th>          
      <th style="text-align: center;">Acciones</th>  
      <th style="text-align: center;">Estado</th>
    </thead>
    <?php  
    $hoy=date("Y-m-d");
    ?>
    <tbody class="active">
      <?php
      while($row = mysqli_fetch_array($query)){
       $fecha=$row['fechaReg'];
       ?>
       <?php 
       if($fecha==$hoy){ 
        ?>
        <tr class="table.dataTable tbody td" style="background:#D9EDF7;">
         <?php 
       }

       else{ 
        ?> 
        <tr>
         <?php 

       }

       ?>
       <td><i class="fa fa-calendar" style="background-color:<?php echo $row['color'];?> "></i></td>
       <td><?php echo $row['titulo'];?></td>
       <td><?php echo $row['fechaInicio'];?></td>
       <td style="text-align: center;"><?php echo $row['tipoCapacitacion'];?></td>
      <td>
      <form action="../controller/controladorAsignarSesion.php" method="post">          
       <input type="hidden" name="idProgramacion" value="<?php echo $row['idProgramacion']?>">
       <center><button name="funcion" value="2" type="submit"  class="btn btn-success btn-md"> <i class='fa fa-search'></i> &nbsp;</button>
       </center>
      </form>
      </td>
        <form action="../controller/controladorAsignarSesion.php" method="post">
         <input type="hidden" name="idProgramacion" value="<?php echo $row['idProgramacion']?>">
         <input type="hidden" name="fechaIn" value="<?php echo $row['fechaInicio']?>">
         <input type="hidden" name="tpCap" value="<?php echo $row['tipoCapacitacion']?>">
         <input type="hidden" name="hora" value="<?php echo $row['hora']?>">
         <center><button name="funcion" value="3" type="submit" style=" width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;"  class="btn btn-success btn-md"> <i class='fa fa-search' style="padding-left: 7px;"></i> &nbsp;</button>
         </center>
       </form>
     </td>
     <td>
      <form action="../controller/controladorAsignarSesion.php" method="post">
       <input type="text" name="idProgramacion" value="<?php echo $row['idProgramacion']?>">
       <center>
        <button name="funcion" value="2" style=" width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;"  type="submit" class="btn btn-deep-orange btn-md"> <i style="padding-left: 7px;" class='fa fa-graduation-cap'></i> &nbsp;</button>
      </center>
    </form>
  </td>

  <td style="text-align: center;">
   <?php 

   if($row['cargado']==1 ){
    ?>
    <div class="row" style="display: inline-block;">
      <a target="_blank" href="<?php echo $row['ruta']; ?>"><img src="../imagenes/check.png" style="height: 60px; width: 60px;" ></a><br>   
      <button class="btn btn-sm btn-indigo btn-md-12" data-toggle="modal" data-idarchivo="<?php echo $row['idArchivo']; ?>"  data-dismiss="modal"  data-target="#elimArchivo"><i class="fa fa-trash"></i></button>
    </div>        
    <?php 
  }else{ ?>
  <button style="display:in-line;" class="btn btn-info btn-md" data-toggle="modal" data-idProgramacion="<?php echo $row['idProgramacion']; ?>"  data-dismiss="modal"  data-target="#registro">
    <?php echo "subir ";?>
    <i class="fa fa-upload mr-1"></i>
  </button>
  <?php 
}
?>
</td>     
<td>
  <?php if($row['estado']==2){?>
  <p style="font-size:1em; margin: 10%;" class="badge lighter green">
    <?php  echo "FINALIZADO"; ?></p>
    <?php   
  }elseif ($row['estado']==1) {?>
  <p style="font-size:1em; margin: 10%;" class="badge amber darken-2">
    <?PHP echo "EN PROCESO"; ?></p>

    <?php
  }elseif($row['estado']==0){ ?>
  <p style="font-size:1em; margin: 10%;" class="badge cyan"> 
    <?PHP  echo "PROGRAMADO";  ?></p>
    <?php
  }else{ ?>
  <p class="btn btn-danger btn-md">
    <?PHP  echo "CANCELADO";?></p>
    <?php
  }
  ?>
</td>

<td> 
  <button type="button"  class="btn btn-success btn-md" data-toggle="modal"  data-dismiss="modal"  data-target="#modificarProgramacion"
  data-idProgramacion="<?php echo $row['idProgramacion']?>" data-fechaInicio="<?php echo $row['fechaInicio']?>"   data-fin="<?php echo $row['fechaFin']?>"  
  data-tipo="<?php echo $row['tipoCapacitacion']?>"  data-titulo="<?php echo $row['titulo']?>"  data-modalidad="<?php echo $row['modalidad']?>"  data-hora="<?php echo $row['hora']?>"   data-nivel="<?php echo $row['nivel']?>" onclick="load(<?php echo $row['idProgramacion']; ?>);">  
  <i
  class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;</button>
  <button type="button" class="btn btn-danger btn-md" data-toggle="modal" id="eliminar" onclick="load(<?php echo$row['idProgramacion']; ?>);" data-target="#inhabilitarProg" data-idProgramacion="<?php echo $row['idProgramacion']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></button>
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
 <br>
 <div class="alert alert-warning alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <p>
     <h4>¡Aviso!</h4>
   No hay capacitaciones programadas.</p>
   <a href="inicio.php">Ir a programar capacitación</a>
 </div>
 <?php
}

?>         
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
<script src="../js/jquery.cookie.js"> </script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/tether.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- panel admin responsivo-->
<script src="../js/front.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 

<!-- funciones para filtro tabla-->
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
<!-- funciones para el paso  de datos a modals-->
<script type="text/javascript">
 function load(idProg){
  var parametros = {"action":"ajax","idProg":idProg};
  $("#loadArchivo").fadeIn('slow');
  $.ajax({
    url:'consulta/cargarAsistencia.php',
    data: parametros,
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $("#loadArchivo").html("");
    }
  })
}
</script>

<script type="text/javascript">
 function load(idProg){
  var parametros = {"action":"ajax","idProg":idProg};
  $("#loadModulo").fadeIn('slow');
  $.ajax({
    url:'consulta/cargarModuloModal.php',
    data: parametros,
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $("#loadModulo").html("");
    }
  })
}
</script>
<script type="text/javascript">
 $('#modificarProgramacion').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('idprogramacion') // Extraer la información de atributos de datos
          var inicio = button.data('fechainicio') // Extraer la información de atributos de datos
          var fin = button.data('hora') // Extraer la información de atributos de datos
          var tip = button.data('tipo') // Extraer la información de atributos de datos
          var mod = button.data('modalidad') // Extraer la información de atributos de datos
          var nivel = button.data('nivel') // Extraer la información de atributos de datos


          var modal = $(this)
          modal.find('.modal-title').text('Modificar capacitación: '+ tip)
          modal.find('#idProg').val(id)
          modal.find('.modal-body #fechaInicio').val(inicio)
          modal.find('.modal-body #hora').val(fin)
          modal.find('.modal-body #cap').val(tip)
          modal.find('.modal-body #modalidad').val(mod)
          modal.find('.modal-body #nivel').val(nivel)

          $('.alert').hide();//Oculto alert
        })

      </script>

      <script type="text/javascript">
        $('#inhabilitarProg').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var id = button.data('idprogramacion') // Extraer la información de atributos de datos
        var modal = $(this)
        modal.find('#idProg').val(id)
      })
    </script>
    <script type="text/javascript">
      $('#elimArchivo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var id = button.data('idarchivo') // Extraer la información de atributos de datos
        var modal = $(this)
        modal.find('#id').val(id)
      })
    </script>
    <script type="text/javascript">
      $('#registro').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var id = button.data('idprogramacion') // Extraer la información de atributos de datos
        var modal = $(this)
        modal.find('#idProg').val(id)
      })
    </script>
    <script type="text/javascript">
      function cargarId(idProg) {
        var parametros = {"action":"ajax","idProg":idProg};
        $.ajax({
          url:'../controller/controladorAsignarSesion.php',
          data: parametros,
          success:function(data){
          }
        })

        document.getElementById("idProgramacion").value=idProg;
      }
    </script>
    <script type="text/javascript">
     $('#modificarProgramacion').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('idprogramacion') // Extraer la información de atributos de datos
      var titulo = button.data('titulo') // Extraer la información de atributos de datos
          var inicio = button.data('fechainicio') // Extraer la información de atributos de datos
          var fin = button.data('hora') // Extraer la información de atributos de datos
          var tip = button.data('tipo') // Extraer la información de atributos de datos
          var mod = button.data('modalidad') // Extraer la información de atributos de datos
          var nivel = button.data('nivel') // Extraer la información de atributos de datos


          var modal = $(this)
          modal.find('.modal-title').text('Modificar capacitación: '+nivel)
          modal.find('#title').val(titulo)
          modal.find('#idProg').val(id)
          modal.find('.modal-body #fechaInicio').val(inicio)
          modal.find('.modal-body #hora').val(fin)
          modal.find('.modal-body #cap').val(tip)
          modal.find('.modal-body #modalidad').val(mod)
          modal.find('.modal-body #nivel').val(nivel)

          $('.alert').hide();//Oculto alert
        })

      </script>
      <script type="text/javascript">
        $('#myform').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var id = button.data('idprog') // Extraer la información de atributos de datos
    var modal = $(this)
    modal.find('#id').val(id)
  })
</script>



</body>
</html>