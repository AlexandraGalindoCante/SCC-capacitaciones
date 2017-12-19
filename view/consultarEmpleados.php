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
    <link rel="stylesheet" href="../css/mdb.css"></link>
    <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../css/custom.css"></link>
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>
    <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
    <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
    <link rel="stylesheet" href="../css/font-awesome.min.css"></link>
    <link href="../css/dataTables.checkboxes.css" rel="stylesheet"/>
    <script type="text/javascript">
        function cargarId(idA){
            document.getElementById("idAsignacionEmpleado").value = idA;
        }
    </script>
    <style type="text/css">
    .panel-programacion{
        background-color: #f8f8ff; padding: 2%;-webkit-box-shadow: 1px 1px 11px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 1px 1px 11px -1px rgba(0,0,0,0.75);
        box-shadow: 1px 1px 11px -1px rgba(0,0,0,0.75);
    }
</style>
</head>

<body>
    <?php
    include('modals/md_elimAsignacionEmp.php');
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
            <nav class="side-navbar">
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar"><img src="../imagenes/user1.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h1 class="h4"><?php echo $_SESSION['nombreUsuario'];?></h1>
                        <p><?php echo $_SESSION['rol'];?></p>
                        <h6 style="width: 100%; text-decoration-style:underline;">   
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modContrasena">Cambiar contraseña</button>
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
                        <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a></li>
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
                <li>
                    <a href="informeCapEmpleado.php"> <i class="fa fa-file-text-o"></i>Informes</a>
                </li>
                <li>
                    <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
                </li>

            </ul>
        </nav>
        <div class="content-inner">
           <header class="page-header" style="padding:10px;">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Evaluación capacitación</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><i class="fa fa-arrow-circle-left "></i> <a href="gestionCapacitacion.php">Volver</a></li>
                <li class="breadcrumb-item active">Empleados programados</li>
            </div>
        </ul>
        <section style="margin-top:1%;">               
            <div style="display:none;" id="alert" class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>¡Acción exitosa! </strong>El empleado ha sido asignado.</h4>
            </div>

            <?php
            if (isset($_GET['msg'])) {
                ?>
                <div class="alert alert-info" role="alert"><strong><?php echo $mensaje = $_GET['mensaje'] ?></strong></div>
                <?php }
                ?>
                <div id="container-fluid">

                    <div class="row">
                        <div class="col-xs-9 col-sm-12 col-md-12">

                            <div class="tab-pane" id="tab_b">
                                <div id="containerT">
                                    <div class="col-xs-9 col-sm-12 col-md-12">
                                        <div id="container">
                                            <div class="card">
                                                <div class="card-body">
                                                    <style type="text/css">
                                                    .card-body {
                                                        background-image: url(../imagenes/ca.png);
                                                    }
                                                </style>
                                                <h4 class="card-title">CAPACITACION <?php echo  $_SESSION['tpCap']?></h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="card-text">

                                                            <?php
                                                            $con = conectar();
                                                            if(!$con){
                                                               die("imposible conectarse: ".mysqli_error($con));
                                                           }
                                                           if (@mysqli_connect_errno()) {
                                                            die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                                                        }
                                                        $query = mysqli_query($con,"SELECT DISTINCT nombreCapacitador,nombreModulo from asigModulo as asg inner join capacitador on idCapacitador=documento  inner join modulo on modulo.idModulo= asg.idModulo where idProgramacion='$_SESSION[idProgramacion]'");?>
                                                        <i class="fa fa-calendar"></i> Modulo:
                                                        <?php
                                                        while($row = mysqli_fetch_array($query)){                                                      
                                                         ?>
                                                         
                                                            <?php echo $row['nombreModulo']?><br>
                                                               <?php 
                                                           }
                                                           ?>
                                                           <i class="fa fa-calendar"></i> Fecha:<?php echo $_SESSION['fechaIn']?><br>
                                                           <i class="fa fa-clock-o"></i> Hora:<?php echo $_SESSION['hora']?>
                                                       </p>
                                                   </div>
                                                   <div class="col-md-6 align-right" >
                                                    <button onclick="window.location.href='../informeAsistenciaGf.php'" name="create_pdf" class="btn btn-primary btn-md"><i class="fa fa-file-text" aria-hidden="true"></i> Listado de Asistencia GF</button>
                                                    <button onclick="window.location.href='../informeAsistenciaCYCP.php'" name="create_pdf" class="btn btn-danger btn-md"><i class="fa fa-file-text" aria-hidden="true"></i> Listado de Asistencia CYCP</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <?php
                                                $con = conectar();
                                                if(!$con){
                                                   die("imposible conectarse: ".mysqli_error($con));
                                               }
                                               if (@mysqli_connect_errno()) {
                                                die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                                            }
                                            $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM asigEmpleado as asEmp
                                              inner join empleado as emp on documento=idEmpleado
                                              inner join departamento as dep on  idDepartamento=Departamento_idDepartamento 
                                              inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
                                              where asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' order by idAsigEmpleado asc");
                                            if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

                                            $query = mysqli_query($con,"
                                              SELECT DISTINCT emp.nombreCompleto,emp.documento,dep.area,asEmp.idAsigEmpleado,p.fechaInicio,p.hora, emp.cargo from asigEmpleado as asEmp
                                              inner join empleado as emp on documento=idEmpleado
                                              inner join departamento as dep on  idDepartamento=Departamento_idDepartamento 
                                              inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
                                              WHERE asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' order by idAsigEmpleado asc");
                                            if ($numrows>0){
                                             ?>
                                             <div class="col-md-12" style="margin-bottom: 4%;">
                                                <table class="table table-hover" id="tabla">
                                                    <thead class="thead-inverse" title="Area">
                                                        <tr><th>#</th>
                                                            <th>Documento de identidad</th>
                                                            <th>Nombre</th>
                                                            <th>Area</th>
                                                            <th>Cargo</th>
                                                            <th style="text-align: center;">Eliminar asignación</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody><?php
                                                    $contador=1;
                                                    while($row = mysqli_fetch_array($query)){
                                                        ?>
                                                        <tr>

                                                            <td><?php 
                                                            echo $contador++;
                                                            ?>

                                                        </td>
                                                        <td><?php echo $row['documento'];?></td>
                                                        <td><?php echo $row['nombreCompleto'];?></td>
                                                        <td><?php echo $row['area'];?></td>
                                                        <td><?php echo $row['cargo'];?></td>
                                                        <td><button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#elimAsignacion" data-id="<?php echo $row['idAsigEmpleado'] ?>"> <i class="fa fa-trash"></i></button></td>
                                                    </tr>
                                                    <?php
                                                } 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4>Aviso!!!</h4> No hay datos para mostrar.
                                    </div>
                                    <br>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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
<script src="../js/jquery.min-1-11-0.js"></script>
<script src="../js/jquery.cookie.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/tether.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.checkboxes.min.js"></script>
<!---<script type="text/javascript">
  function cargarArea() {
   var area = document.getElementById("area").value;
   load(area);
}
</script>
<script type="text/javascript">
    function load(area) {
        var parametros = {
            "action": "ajax",
            "area": area
        };
        $("#loadEmpleados").fadeIn('slow');
        $.ajax({
            url: 'consulta/cargarEmpleados.php',
            data: parametros,
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $("#loadEmpleados").html("");
            }
        })
    }
</script>-->
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



<script>
  $(document).ready(function(){
    var mytable = $("#mytable").DataTable({
      ajax: 'consulta/data.json',
      columnDefs: [
      {
        targets: 0,
        checkboxes: {
          seletRow: true
      }
  }
  ],
  select:{
    style: 'multi'
},
order: [[1, 'asc']]
})
    $("#myform").on('submit', function(e){
      var form = this
      var rowsel = mytable.column(0).checkboxes.selected();
      $.each(rowsel, function(index, rowId){
        $(form).append(
          $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
          )
    })
      var stringCedulas = rowsel.join(",");
      $("#view-rows").text(rowsel.join(","));
      $("#view-form").text($(form).serialize());
      $('input[name="id\[\]"]', form).remove();
      document.getElementById("cedula").value = stringCedulas
      e.preventDefault()
      form.submit();
  })
})
</script>
<script type="text/javascript">
    $('#elimAsignacion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var id = button.data('id') // Extraer la información de atributos de datos
    var modal = $(this)
    modal.find('#idAsigEmpleado').val(id)
})
</script>


</body>

</html>