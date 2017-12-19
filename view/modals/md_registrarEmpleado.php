 <?php
 $mysql=conectar();
 $i=0;
 $contar=$mysql->query("select count(*) as cuenta from Empleado where visibilidad = '1'") or die($mysql->error);
 $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
 $registro=$mysql->query("select documento from Empleado") or die($mysql->error);
 while($vector=$registro->fetch_array()){
  $documento[$i]=$vector['documento'];
  $i++;
}
$mysql->close();
?>


<div class="modal fade" aria-labelledby="myModalLabel"  id="registroEmpleado" name="registroEmpleado" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 45px; padding-bottom: 100px;">
  <div class="modal-content">
    <div class="modal-header">

      <h4 align="center" class="modal-title" id="myModalLabel"> <img src="../imagenes/add.png" style="width:35px;">&nbsp;Nuevo empleado</h4>
      <button aria-label="Close" class="close" data-dismiss="modal" type="button"">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <style type="text/css">
      h4{
        font-weight: bold;
        color: #fff;
      }
    </style>
    
    <div class="modal-body">
      <form id="registroEmpleado" action="../controller/controladorEmpleado.php" method="post" name="registrar">
        <div class="row" style="margin: 10px;">
          <div class="col-lg-12 col-md-12 col-sm-9" style="padding-bottom: 10px; padding-left: 10px; display:inline-block;">

            <input class="form-control" id="documento" placeholder="Documento" style="padding-left: 10px;"  name="documento" required="" type="text">
            <span class="input-group-addon" ><i class="glyphicon glyphicon-search"></i></span>

          </div>
        </div>
        <div class="row" style="margin: 10px;">
          <div class="col-lg-12 col-md-12 col-sm-9" style="padding-bottom: 10px;">

            <input class="form-control" name="nombreCompleto" id="nombreCompleto" placeholder="Nombre completo" type="text" required />
          </div>
        </div>
        <div class="row" style="margin: 10px;">

          <div class="col-lg-12 col-md-12 col-sm-9" style="padding-bottom: 10px;">

            <input class="form-control" name="correoElectronico" id="correoElectronico" placeholder="Correo electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" type="email" required />
          </div>
        </div>
        <div class="row" style="margin: 10px;">
          <div class="col-lg-12 col-md-12 col-sm-9" >
		  <select class="form-control" name="idTipoNivelEscolar" id="idTipoNivelEscolar" required="">
              <option value="">Seleccione escolaridad</option>
              <?php
              $mysql=conectar();
              $registro=$mysql->query("select idTipoNivelEscolar, nombre from tipoNivelEscolar") or die($mysql->error);                  
              while($reg=$registro->fetch_array()){
                echo "<option value=\"".$reg['idTipoNivelEscolar']."\">".$reg['nombre']."</option>";
              }
              $mysql->close();
              ?>
            </select>
			
          </div>
        </div>
        <div class="row" style="margin: 10px;">
          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;margin-bottom: 15px;">

            <div class='input-group date' id='datetimepicker1'>
              <input class="form-control" id="fechaInicioLaboral" name="fechaInicioLaboral" type='date'>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;margin-bottom: 15px;">
            <div class='input-group date' id='datetimepicker1'>
              <input class="form-control" id="fechaTerminacionContrato"  name="fechaTerminacionContrato" type='date'>
            </div>
          </div>
        </div>
         <div class="row" style="margin: 10px;">
         <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
            <select class="form-control" name="idDepartamento" required="">
              <option value="">Seleccione área</option>
              <?php
              $mysql=conectar();
              $registro=$mysql->query("select idDepartamento, area from Departamento") or die($mysql->error);
              while($reg=$registro->fetch_array()){
                echo "<option value=\"".$reg['idDepartamento']."\">".$reg['area']."</option>";
              }
              $mysql->close();
              ?>
            </select>
          </div>
           <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
            <select class="form-control" id="idTipoContrato" name="idTipoContrato" required="">
                <option value="">Seleccione tipo contrato</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idtipoContrato, nombre from TipoContrato") or die($mysql->error);
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idtipoContrato']."\">".$reg['nombre']."</option>";
                  }
                  $mysql->close();
                ?>
              </select>
          </div>
        </div>
        <div class="row" style="margin: 10px;">
          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">

            <input class="form-control" id="numContrato" placeholder="N° contrato" name="numContrato" pattern="[0-9]{7,25}" required="" type="num">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">

            <select class="form-control" id="empresa" name="empresa" required>
              <option value="" disabled="true" selected="true">Seleccione empresa</option>
              <option value="GF cobranzas">GF Cobranzas</option>
              <option value="CYCP cobradores">CYCP Cobradores</option>
            </select>
          </div>
        </div>


        <div class="modal-footer">
          <button class="btn  btn-md btn-primary" name="funcion" id="funcion" value="1" type="submit"> Enviar</button> <button class="btn  btn-md btn-default" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div> 
</div>
</div>

<script type='text/javascript'>
  <?php
  $js_array = json_encode($documento);
  echo "var vector= ". $js_array . ";\n";
  ?>

  function validar(){
    var doc = document.getElementById('documento').value;
    var control = 0;
    for (var i = 0; i < vector.length; i++) {
      if (vector[i]== doc) {
        control = 1;
      } 

    }
    if (control == 1) {
      alert("Documento invalido, ya fue registrado");
    }else{
      alert("Documento valido");
    }

  }


</script> 

<script type='text/javascript'>
  <?php
  $js_array = json_encode($numContrato);
  echo "var vector= ". $js_array . ";\n";
  ?>

  function validarContrato(){
    var doc = document.getElementById('numContrato').value;
    var control = 0;
    for (var i = 0; i < vector.length; i++) {
      if (vector[i]== doc) {
        control = 1;
      } 

    }
    if (control == 1) {
      alert("Este número de contrato ya fue registrado");
    }
  }


</script> 