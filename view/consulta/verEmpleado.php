 <?php
 include_once ('libreriaSCC.php');
 $con = conectar();
 if(!$con){
  die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
  die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
$dni=$_REQUEST['doc'];

$mysql=mysqli_query($con,"set names 'utf8'");

$count_query   = mysqli_query($con,"SELECT count(*) AS numrows  FROM cargarEmpleado where  documento='$dni'");

if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

$query=mysqli_query($con,"SELECT nombreCompleto,documento,telefono,correoElectronico,fechaInicioLaboral,fechaTerminacionContrato, empresa, numContrato, Tipocontrato,idTipoCon,idDep,area, nivelEscolar,idTipoNiv from cargarEmpleado where  documento='$dni' ") or die(mysql_error());

if ($numrows>0){
  ?>

  <div> 

    <?php
    while($row = mysqli_fetch_array($query)){
      ?>
      <div class="panel panel-success" id="pn">
        <div class="panel-title">
          <style type="text/css">
          #pn{
            margin-right:5px;
            padding: 5px;


          }
          #datos{
            color:rgba(34, 35, 45, 0.65);
          }
        </style>        
      </div>
      <div class="panel-body">
        <p style="color: gray;">
        <h4 id="datos"><?php echo $row['nombreCompleto'];?></h4>
        <label>NUMERO DE DOCUMENTO:</label>
        <h4 id="datos"><?php echo $row['documento'];?></h4>
        <?php
        if(isset($row['correoElectronico'])){

          ?>
          <label>EMAIL:</label>
         <h4 id="datos"><?php echo $row['correoElectronico'];?></h4>

          <?php

        }
        else{?>
       <h4 id="datos">No registra</h4>
        <?php
      }
      ?>
      <label>ESCOLARIDAD:</label>
     <h4 id="datos"><?php echo $row['nivelEscolar'];?></h4>
     <label>TIPO DE CONTRATO:</label>
     <h4 id="datos"><?php echo $row['Tipocontrato'];?></h4>
     <label>EMPRESA:</label>
      <h4 id="datos"><?php echo $row['empresa'];?></h4>
      <label>FECHA INICIO LABORAL:</label>
       <h4 id="datos"><?php echo $row['fechaInicioLaboral'];?></h4>
       <label>FECHA TERMINACION LABORAL:</label>
      <h4 id="datos"><?php echo $row['fechaTerminacionLaboral'];?></h4>
      <label>NÚMERO DE CONTRATO:</label>
    <h4 id="datos"><?php echo $row['numContrato'];?></h4>
    <label>AREA:</label>
    <h4 id="datos"><?php echo $row['area'];?></h4>
     </p>
    </div>
  </div>


  <?php
}
?>

<?php

} else {
  ?>

  <h4>¡Aviso!</h4> No hay datos para mostrar.

</div>
</div>
<?php
}
?> 