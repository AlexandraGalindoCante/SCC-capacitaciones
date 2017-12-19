 <?php
  include_once ('libreriaSCC.php');
              $con = conectar();
              if(!$con){
              die("imposible conectarse: ".mysqli_error($con));
              } 
              if (@mysqli_connect_errno()) {
              die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
              $mysql=mysqli_query($con,"set names 'utf8'");
			  $dni=$_REQUEST['doc'];
              $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM consultarCapEmpleado where documento= $dni");
              if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

             
              $query=mysqli_query($con,"SELECT nombreCompleto,documento,
              estado, observaciones, calificacion,nombreModulo,fechaFin,modalidad,tipoCapacitacion,nivel,fechaFin,observaciones FROM consultarCapEmpleado where documento=$dni") 
              or die(mysql_error());
            
              if ($numrows>0){
              ?>


              <div> 

              <table class="table table-hover" id="tabla">
              <thead>
                <tr>
                <th>Nombre</th>
                 <th>Módulo</th>
                <th>Tipo capacitación</th>
                  <th>Calificación</th>
                  <th>Nivel</th>
                 <th>Modalidad</th>
                  <th>Observaciones</th>
                  <th>Fecha vista</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($query)){
                ?>
               

                <td>  <?php echo $row['nombreCompleto'];?></td>
                <td><?php echo $row['nombreModulo'];?></td>
                <td><?php echo $row['tipoCapacitacion'];?></td>
                 <td><?php echo $row['calificacion'];?></td>
                   <td><?php echo $row['nivel'];?></td>
                   <td><?php echo $row['modalidad'];?></td>
                     <td><?php echo $row['observaciones'];?></td>
                     <td><?php echo $row['fechaFin'];?></td>
                     
              
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
              <h4>¡Aviso!</h4> No hay temas para mostrar.
            </div>
            </div>
      <?php
    }
  ?>  


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


