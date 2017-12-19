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
              $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM tema INNER JOIN asigTema ON Tema.idTema= asigTema.idTema INNER JOIN MODULO ON asigTema.idModulo=Modulo.idModulo WHERE Modulo.idModulo= '$_REQUEST[idModulo]' AND  visibilidad ='1'");
              if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

              $dni=$_REQUEST['idModulo'];
              $query=mysqli_query($con,"SELECT Tema.nombre  FROM tema INNER JOIN asigTema ON Tema.idTema= asigTema.idTema INNER JOIN MODULO ON asigTema.idModulo=Modulo.idModulo WHERE Modulo.idModulo= '$dni' AND  visibilidad ='1' ORDER BY Tema.nombre asc") 
              or die(mysql_error());
            
              if ($numrows>0){
              ?>


              <div id="tabla"> 
              <table class="table table-hover" id="tabla">
              <thead>
                <tr>
                <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $row['nombre'];?></td>
               
              
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




