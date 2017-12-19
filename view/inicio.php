<?php
session_start();
include ('libreriaSCC.php'); 
include ('../view/modals/md_cambiarContrasena.php');
include_once("../models/Datos.php");

if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
  header('Location: ../index.php' );
}
$db = new Datos();
$mysql= $db->conectar();
$contar=$mysql->query("select count(*) as cuenta from programacion where visibilidad = '1'") or die($mysql->error);
$conteoDoc = $contar->fetch_array(MYSQLI_NUM);
$cantRegistros = $conteoDoc[0];
$registro=$mysql->query("select idProgramacion,fechaInicio, fechaFin, tipoCapacitacion,color,titulo, hora From programacion WHERE visibilidad='1'") or die($mysql->error);
$i = 0;
while($vector=$registro->fetch_array()){
  $id[$i]= $vector['idProgramacion'];
  $titulo[$i]= $vector['titulo'];
  $hora[$i]= $vector['hora'];
  $inicio[$i]=$vector['fechaInicio'];
  $fin[$i]= $vector ['fechaFin'];
  $color[$i]= $vector ['color'];
  $nivel[$i]= $vector ['titulo'];
  $i++;
}
$mysql->close();
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
  <link rel="stylesheet" href="../css/custom.css"></link>
  <link rel="stylesheet" href="../css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
  <link rel="stylesheet" href="../css/style.sea.css" id="theme-stylesheet"></link>
  <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
  <link rel="stylesheet" href="../css/font-awesome.min.css"> 
  <link href='../css/fullcalendar.css' rel='stylesheet' />
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <script src='../js/moment.min.js'></script>
  <script src='../js/jquery.min.js'></script>
  <script src='../js/fullcalendar.min.js'></script>
  <script src='../js/es.js'></script>
  <script type="text/javascript">
    function cargarId(idProg) {
      document.getElementById("id").value = idProg;
    }
  </script>
  <script type="text/javascript">
    function cargarId(idProg) {
      document.getElementById("id").value = idProg;
    }
  </script>
  <script>
    $(document).ready(function() {
      <?php
      $array_id = json_encode($id);
      $array_inicio = json_encode($inicio);
      $array_titulo = json_encode($titulo);
      $array_hora = json_encode($hora);
      $array_fin = json_encode($fin);
      $array_color = json_encode($color);
      $array_nivel = json_encode($nivel);

      echo "var id= ". $array_id . ";\n";

      echo "var id= ". $array_id . ";\n";
      echo "var inicio= ". $array_inicio . ";\n";
      echo "var titulo= ". $array_titulo . ";\n";
      echo "var fin= ". $array_fin . ";\n";
      echo "var color= ". $array_color . ";\n";
      echo "var nivel= ". $array_nivel . ";\n";

      ?>

     
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },

        eventClick: function(event, jsEvent, view) {
          $('#modal-title').html(event.title);
          $('#modal-body').html(event.title);
          $('#fecha').html(moment(event.color).format('MMM DD h:mm A'));
          $('#eventUrl').attr('href', event.url);
          $('#verProgramacion').modal();
        },

        editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    selectHelper: true,

                    select: function(start, end, allDay) {
                      endtime = $.fullCalendar.formatDate(start,'DD-MMMM-YYYY');
                      starttime = $.fullCalendar.formatDate(start,'YYYYMMDD');                     
                      $('#crearProgramacion  #fecha').val(endtime);
                      $('#crearProgramacion  #start').val(starttime);
                      $('#crearProgramacion  #end').val(starttime);
                      $('#crearProgramacion').modal('show');


                    },

                    eventRender: function(event, element) {
                      element.bind('dblclick', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit').modal('show');
                      });
                    },
                    eventDrop: function(event, delta, revertFunc) { // si changement de position

                      edit(event);

                    },
                    eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                      edit(event);

                    },
                    events: [

                    

                    <?php
                    for ($i = 0; $i < $cantRegistros; $i++){
                      echo "{ start: inicio[".$i."],  end: fin[".$i."], title: titulo[".$i."],color: color[".$i."]}";
                      if ($i+1 != $cantRegistros){
                        echo ",";
                      }
                    }
                    ?>

                    ]
                  });

    });

  </script>
</head>


<body>
  <?php include('modals/md_cambiarContrasena.php');?>
  <div class="page ">
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
              <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a>
              </li>
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
                    <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            
                    </strong></a>
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
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom"><i class="fa fa-dashboard"></i></h2>
    </div>
  </header>  

 

  <div class="row">
    <div class="col-md-9" >
      <div class="panel">
        <div class="panel-body" >
          <div class="text-center" style="background:#fff;-webkit-box-shadow: 14px 8px 18px -11px rgba(0,0,0,0.27);
          -moz-box-shadow: 14px 8px 18px -11px rgba(0,0,0,0.27);
          box-shadow: 14px 8px 18px -11px rgba(0,0,0,0.27); padding: 1%;">
          <h1><i class="fa fa-calendar"> Calendario de Programaciones</i> </h1>

          <p class="lead">Capacitaciones para este periodo</p>       

          <div id="calendar" class="col-centered" style="padding: 2%;"> </div>

        </div>
        <br>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-white" style="background-color:#fff; padding: 2%; margin-top:4%;margin-left:-8%;">
      <div class="panel-heading">
        <h3 class="panel-title">Modulos a Programar 2018</h3>
      </div>
      <div class="panel-body">

        <a style="color:black; text-decoration:none" id="897" class="view-notice" href="#">
        </a><a style="color:black; text-decoration:none" id="808" class="view-notice" href="#">
        </a><a style="color:black; text-decoration:none" id="29" class="view-notice" href="#">
        </a><table class="table">
          <tbody><tr>
            <th>Mes</th>
            <th>Módulo</th>
          </tr> 

          <tr>
            <td>Enero</td>
            <td>Modulo</td>
          </tr>
          <tr>
            <td>Febrero</td>
            <td> </td>
          </tr>
          <tr>
            <td>Marzo</td>
            <td> </td>
          </tr>

        </tbody></table>
      </div>
    </div>
  </div>

</div>


<div class="modal fade" id="crearProgramacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 45px; padding-bottom: 100px; padding:10px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Programar capacitacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div id="datos_ajax_register">
            <form method="POST" id="crearProgramacion" name="crearProgramacion" action="../controller/controladorProgramacion.php">              
              <div class="form-group">
                <label>Titulo de la capacitación:</label>
                <div class="form-group">
                  <input class="form-control" id="title" name="title" required="" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">     
                </div>
              </div>
              <div class="form-group">
                <label>Fecha inicio:</label>

                <input class="form-control" id="start" name="start"  type="hidden">
                <input class="form-control" id="fecha" name="fecha"  type="text" readonly="" >

              </div>

              <input class="form-control" name="end" id="end" required type="hidden">

              <div class="form-group">
                <label>Hora:</label>
                <span class="inpu-group-addon">
                  <span class="fa fa-clock"></span>
                </span>

                <input class="form-control" name="hora" id="hora" required type="time">
              </div>
              <div class="form-group">
                <label>Tipo capacitación:</label>
                <select class="form-control" id="tipoCap" name="tipoCap" required>
                  <option value="">Seleccione tipo de capacitación</option>
                  <?php
                  $tipoCap = array("INDUCTIVA","PREVENTIVA","CORRECTIVA","DESARROLLO DE LA CARRERA");
                  $i = 0;
                  while($i < count($tipoCap)){
                   echo "<option value=\"".$tipoCap[$i]."\">".$tipoCap[$i]."</option>"; 
                   $i++;
                 }
                 ?>
               </select>
             </div>
             <div class="form-group">
              <label>Modalidad:</label>
              <select class="form-control" id="modalidad" name="modalidad" required>
                <option value="">Seleccione modalidad</option>
                <?php
                $modalidad = array("FORMACION","ACTUALIZACION","ESPECIALIZACION","PERFECCIONAMIENTO");
                $i = 0;
                while($i < count($modalidad)){
                 echo "<option value=\"".$modalidad[$i]."\">".$modalidad[$i]."</option>"; 
                 $i++;
               }
               ?>
             </select>
           </div>
           <div class="form-group">
            <label>Nivel:</label>
            <select class="form-control" id="nivel" name="nivel" required>
              <option value="">Seleccione nivel </option>
              <?php
              $nivel= array("NIVEL BASICO","NIVEL INTERMEDIO","NIVEL AVANZADO","NIVEL GENERAL");
              $i = 0;
              while($i < count($modalidad)){
                echo "<option value=\"".$nivel[$i]."\">".$nivel[$i]."</option>"; 
                $i++;
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="color" class="col-sm-2 control-label">Color:</label>

            <select name="color" class="form-control" id="color">
              <option value="">Seleccione</option>
              <option style="color:#1D6CD4;" value="#1D6CD4">&#10687; Azul</option>
              <option style="color:#40E0D0;" value="#40E0D0"> &#10687; Turquesa</option>
              <option style="color:#12BA60;" value="#12BA60">&#10687; Verde</option>
              <option style="color:#5858FA;" value="#5858FA">&#10687; Morado</option>
              <option style="color:#B4045F;" value="#B4045F">&#10687; Fucsia</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#10687; Naranja</option>
              <option style="color:#FE2E2E;" value="#FE2E2E">&#10687; Rojo</option>

            </select>

          </div>
          <br>
          <br>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="funcion" id="funcion" value="0">Guardar cambios</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div id="verProgramacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 id="modalTitle" class="modal-title" id="modal-title"><i class="fa fa-calendar"></i> DETALLES DE LA PROGRAMACION</h5>

          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span> <i class="fa fa-times"></i><span class="sr-only"></span></button>
        </div>
        <div class="modal-body" id="modal-body"></div>

        <div class="modal-footer">
          <button class="btn btn-info btn-md"  onclick="window.location.href='gestionCapacitacion.php'" data-id="<?php $vector['idProgramacion']; ?>">
            <i class="fa fa-eye"></i> Ir a la programación
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

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

<script src="../js/jquery.cookie.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
  <script src='../js/tether.min.js'></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<!-- panel admin responsivo-->
<script src="../js/app.js"></script>
<script>
  $(document).ready(function() {

    $('.star').on('click', function() {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function() {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function() {
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
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: new Date(),
      editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        selectable: true,
                        selectHelper: true,
                        select: function(start, end) {

                          $('#crearProgramacion #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                          $('#crearProgramacion #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                          $('#crearProgramacion').modal('show');
                        },
                        eventRender: function(event, element) {
                          element.bind('dblclick', function() {
                            $('#ModalEdit #id').val(event.id);
                            $('#ModalEdit #title').val(event.nivel);
                            $('#ModalEdit #color').val(event.color);
                            $('#ModalEdit').modal('show');
                          });
                        },
                        eventDrop: function(event, delta, revertFunc) { // si changement de position

                          edit(event);

                        },
                        eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                          edit(event);

                        },
                        events: [
                        <?php foreach($events as $event): 

                        $start = explode(" ", $event['fechaInicio']);
                        $end = explode(" ", $event['fechaFin']);
                        if($start[1] == '00:00:00'){
                          $start = $start[0];
                        }else{
                          $start = $event['fechaInicio'];
                        }
                        if($end[1] == '00:00:00'){
                          $end = $end[0];
                        }else{
                          $end = $event['fechaFin'];
                        }
                        ?> {
                          id: '<?php echo $event['
                          idProgramacion ']; ?>',
                          capacitacion: '<?php echo $event['
                          tipoCapacitacion ']; ?>',
                          start: '<?php echo $start; ?>',
                          end: '<?php echo $end; ?>',
                          modalidad: '<?php echo $event['
                          modalidad ']; ?>',
                          nivel: '<?php echo $event['
                          nivel ']; ?>',
                          color: '<?php echo $event['
                          color ']; ?>',
                        },
                        <?php endforeach; ?>
                        ]
                      });

    function edit(event) {
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if (event.end) {
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      } else {
        end = start;
      }

      id = event.id;

      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;

      $.ajax({
        url: 'editEventDate.php',
        type: "POST",
        data: {
          Event: Event
        },
        success: function(rep) {
          if (rep == 'OK') {
            alert('Saved');
          } else {
            alert('Could not be saved. try again.');
          }
        }
      });
    }

  });
</script>
<script type="text/javascript">
  function load() {
    $("#loadProgramacion").fadeIn('slow');
    $.ajax({
      url: '../view/consulta/cargarProgramacion.php',
      data: parametros,
      success: function(data) {
        $(".outer_div").html(data).fadeIn('slow');
        $("#loadProgramacion").html("");
      }
    })
  }
</script>

</body>

</html>