 <?php
              include_once ('libreriaSCC.php');
              session_start();
              $con = conectar();
              if(!$con){
              die("imposible conectarse: ".mysqli_error($con));
              }
              if (@mysqli_connect_errno()) {
              die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
			        $dni=$_REQUEST['idProg'];
              $mysql=mysqli_query($con,"set names 'utf8'");

              $count_query   = mysqli_query($con,"SELECT count(*) AS numrows  FROM asigModulo as asg INNER JOIN Modulo AS m ON m.idModulo= asg.idModulo  WHERE asg.idProgramacion='$dni'");

              if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
              
              $query=mysqli_query($con,"SELECT m.idModulo,m.nombreModulo,c.nombreCapacitador,asg.idAsigModulo FROM asigModulo as asg INNER JOIN Modulo AS m ON m.idModulo= asg.idModulo inner join capacitador as c on c.documento=asg.idCapacitador WHERE asg.idProgramacion='$dni' ORDER BY m.nombreModulo asc") or die(mysql_error());
            
              if ($numrows>0){
              ?>
        <script type="text/javascript">
         function cargarId(idA) {
         document.getElementById("idAsigModulo").value=idA;
         }
      </script>
              <div id="tabla"> 
              <table class="table table-bordered" id="tabla">
              <thead class="thead-inverse">
                <tr>
                 <th>MODULO</th>
                <th>CAPACITADOR</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $row['nombreModulo'];?></td>
                <td><?php echo $row['nombreCapacitador'];
                  $_SESSION['capacitador']=$row['nombreCapacitador'];?></td>
               
              </tr>
              <?php
              }
              ?>
              </tbody>
            </table>
            <?php
              
            } else {
              ?>
            <div class="col-xs-12m text-center" id="alerta">
              <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4>¡Aviso!</h4> Esta programación no tiene  módulos asignados.
              </div>
            </div>
          </div>
              <?php
            }
          ?> 