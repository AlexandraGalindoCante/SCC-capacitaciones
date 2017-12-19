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
      <link rel="stylesheet" href="../css/custom.css">
      </link>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      </link>
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      </link>
      <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
        </link>
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="../css/style.sea.css" id="theme-stylesheet">
      </link>
      <!-- Favicon-->
      <link rel="shortcut icon" href="../imagenes/favicon.ico">
      </link>
      <script src="https://use.fontawesome.com/99347ac47f.js"></script>
      <!-- Font Icons CSS-->
      <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
      </link>
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
               <span class="heading">
                  <center> BIENVENIDO</center>
               </span>
			    <ul class="list-unstyled">
				 <li>
                     <a href="inicio.php"> <i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp;Inicio</a>
                  </li>
                 <li>
				  <li> <a href="../calendar/prueba/selectable.php"> <i class="icon-bill"></i>Calendario</a>
                    </li>
               <ul class="list-unstyled">
                  <li>
                     <a href="#cronograma" aria-expanded="false" data-toggle="collapse"  class="active"> <i class="icon-clock"></i>Cronograma</a>
                     <ul id="cronograma" class="collapse list-unstyled">
                        <li>
                           <a href="cronograma1.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Cronograma empleados</a>
                        </li>
                        <li>
                           <a href="cronograma.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Cronograma capacitaciones</a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation" aria-hidden="true" ></i> &nbsp;Gestión capacitación&nbsp;</a>
                     <ul id="capacitaciones" class="collapse list-unstyled">
                        <li>
                           <a href="gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Administrar capacitación</a>
                        </li>
                        <li>
                           <a href="gestionModulo.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Administrar módulos</a>
                        </li>
                        <li>
                           <a href="gestionTemas.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Administrar temas</a>
                        </li>
                        <li>
                           <a href="gestionCapacitador.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Capacitadores</a>
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
               </ul>
			        <span class="heading"></span>
               <ul class="list-unstyled">
                  <li> <a href="empleadosReprobados.php"> <i class="icon-page"></i>Evaluacion</a>
                  </li>
                  <li> <a href="#"> <i class="icon-page"></i>Informes</a>
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
              <h2 class="no-margin-bottom"><i class="fa fa-dashboard"></i> </h2>
            </div>
          </header>
        
          <section>

          <div class="container-fluid">
          <div class="row">
          <?php 
          $con = conectar();
          if(!$con){
          die("imposible conectarse: ".mysqli_error($con));
          }
          if (@mysqli_connect_errno()) {
          die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
          }
          $mysql=mysqli_query($con,"set names 'utf8'");
            $count_query= mysqli_query($con," SELECT count(*) AS numrows FROM view_reprogramacionEmp");
         if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
          $consulta = mysqli_query($con,"SELECT  nombre,nombreModulo, fecha, area, documento,diferencia ,frecuencia FROM view_reprogramacionEmp") or die(mysqli_error($mysql));        
         ?>

        <div class="col-lg-6"> 
         <div class="articles card"> 
            
            <div class="card-header d-flex ">
                <h4  style="color: silver;">Personal próximo a ver módulos:</h4>
              <div class="badge badge-rou bg-green" style="margin-left:45%;"><h5><?php echo $numrows?> Pendientes</h5></div>
            </div>    
            <?php
            while( $array = mysqli_fetch_array($consulta)){
            ?>
                    
           <div class="card-body no-padding">
             <div class="item d-flex align-items-center">
                <div class="image" style="margin-top: -50px;"><img src="../imagenes/avatar-1.png" alt="..." class="img-fluid rounded-circle"></div>
                  <div class="text">
                   <h5 class="h5"><?php echo $array['nombre']?></h5>
                   <h5>CC <?php echo $array['documento']?></h5>
            
                    <h5 style="font-weight: none;color:gray;"><?php echo $array['nombreModulo']?></h5><small><?php echo $array['area']?></small>
                 </div>
            </div>
          </div>
                 
            <?php
                }
                ?>

        </div>
       </div>
           

                <div class="col-lg-6">

                <div id="container" style="width: 100%;">                   

                  <table id="datatable" style="display: none;">
                   
                  
                          <?php
                        $con = conectar();
                        if(!$con){
                        die("imposible conectarse: ".mysqli_error($con));
                        }
                        if (@mysqli_connect_errno()) {
                        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                        }
                        $mysql=mysqli_query($con,"set names 'utf8'");
                        $consulta = mysqli_query($con,"SELECT * FROM consultarModCYCP");
                      
                        ?>
                        <thead>
                        <tr>
                         <th></th>
                        <th>CYCP</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          
                          while ($array = mysqli_fetch_array($consulta)) {
                              ?>
                              <tr> 
                                <td><?php echo $array['nombreModulo']; ?> </td>
                                <td><?php echo $array['CyCP']; ?> </td>  
                               
                                                             
                              </tr>
                              <?php
                          }
                          ?>
                      </tbody>
                  </table>
                </div> 
                

                <div id="container1" style="width: 100%; margin-top: 15px;"  >                   

                  <table id="datatable1" style="display: none;">
                   
                  
                          <?php
                        $con = conectar();
                        if(!$con){
                        die("imposible conectarse: ".mysqli_error($con));
                        }
                        if (@mysqli_connect_errno()) {
                        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                        }
                        $mysql=mysqli_query($con,"set names 'utf8'");
                        $consulta = mysqli_query($con,"SELECT * FROM consultarModGFC");
                      
                        ?>
                        <thead>
                        <tr>
                         <th></th>
                        <th>GF</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          
                          while ($array = mysqli_fetch_array($consulta)) {
                              ?>
                              <tr> 
                                <td><?php echo $array['nombreModulo']; ?> </td>
                                <td><?php echo $array['GFC']; ?> </td>  
                               
                                                             
                              </tr>
                              <?php
                          }
                          ?>
                      </tbody>
                  </table>
                </div> 
                </div>
                   </div> 
                </div>
               
            
          </section>
		    <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>New<br>Clients</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>25</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Work<br>Orders</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>70</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>New<br>Invoices</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong>44</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Open<br>Cases</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong>35</strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
           
      <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                    <div class="text"><strong>234</strong><br><small>Applications</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                    <div class="text"><strong>152</strong><br><small>Interviews</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                    <div class="text"><strong>147</strong><br><small>Forwards</small></div>
                  </div>
                </div>
                <!-- Line Chart            -->
                <div class="chart col-lg-6 col-12">
                  <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <canvas id="lineCahrt"></canvas>
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

<script src="../js/jquery.min.js"></script>     
<script src="../js/tether.min.js"></script>

<script src="../js/jquery.cookie.js">
</script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../js/charts-home.js"></script>
<script src="../js/front.js"></script>
<script src="../js/tableExport.js"></script>
<script src="../js/dark-blue.js"></script>
<script src="../js/highcharts.js"></script>
<script src="../js/data.js"></script>
<script src="../js/exporting.js"></script>
<script>    
          Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'CYCP COBRANZAS Y COBRADORES PROFESIONALES'
    },
    yAxis: {
        allowDecimals: true,
        title: {
            text: 'Promedio calificación'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
</script>
<script>    
          Highcharts.chart('container1', {
    data: {
        table: 'datatable1'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'GF COBRANZAS JURIDICAS'
    },
    yAxis: {
        allowDecimals: true,
        title: {
            text: 'Promedio calificación'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
</script>
   </body>
</html>