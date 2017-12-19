

<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarEmpleado" name="modificarEmpleado" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 45px; padding-bottom: 100px;">
  <div class="modal-content">
    <div class="modal-header">

      <h4 align="center" class="modal-title" id="myModalLabel"> &nbsp;Nuevo empleado</h4><img src="../imagenes/add.png" style="width:35px;">
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
      <form id="modificarEmpleado" action="../controller/controladorEmpleado.php" method="post" name="modificarEmpleado">
        <div class="row" style="margin: 10px;">
          <div class="col-lg-9 col-md-9 col-sm-9" style="padding-bottom: 10px; padding-left: 10px; display:inline-block;">
			<label>Documento:</label>
            <input class="form-control" id="documento" placeholder="Documento" style="padding-left: 10px;"  name="documento"  type="text" readonly="" >
           
          </div>
        </div>
        <div class="row" style="margin: 10px;">
          <div class="col-lg-9 col-md-9 col-sm-9" style="padding-bottom: 10px;">

            <input class="form-control" name="nombreCompleto" id="nombreCompleto" placeholder="Nombre completo" type="text" required />
          </div>
        </div>
        <div class="row" style="margin: 10px;">

          <div class="col-lg-9 col-md-9 col-sm-9" style="padding-bottom: 10px;">
			<label>Correo electronico:</label>
            <input class="form-control" name="correoElectronico" id="correoElectronico" placeholder="Correo electronico:" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" type="email" required />
          </div>
        </div>
        <div class="row" style="margin: 10px;">
		
          <div class="col-lg-9 col-md-9 col-sm-9" style="padding-bottom: 10px;">
           <label>Nivel escolaridad:</label> <select class="form-control" name="idTipoNivelEscolar" id="idTipoNivelEscolar" required="">
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
			<label>Fecha inicio:</label>
            <div class='input-group date' id='datetimepicker1'>
			
              <input class="form-control" id="fechainicio" name="fechaInicio" type='date'>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;margin-bottom: 15px;">
		  <label>Fecha fin: (opcional)</label>
            <div class='input-group date' id='datetimepicker1'>
              <input class="form-control" id="fechaterminacion"  name="fechaTerminacion" type='date'>
            </div>
          </div>
        </div>
         <div class="row" style="margin: 10px;">
		
         <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
           <label>Area:</label>  <select class="form-control" name="idDepartamento" required="">
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
		   <label>Tipo de contrato:</label>
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
  <label>N° de contrato:</label>
            <input class="form-control" id="numContrato" placeholder="N° contrato" name="numContrato" pattern="[0-9]{7,25}" required="" type="num">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
		<label>Empresa:</label>
            <select class="form-control" id="empresa" name="empresa" required>
              <option value="" disabled="true" selected="true">Seleccione empresa</option>
              <option value="GF">GF Cobranzas</option>
              <option value="CYCP">CYCP Cobradores</option>
            </select>
          </div>
        </div>


        <div class="modal-footer">
          <button class="btn  btn-md btn-primary" name="funcion" id="funcion" value="2" type="submit"> Enviar</button> <button class="btn  btn-md btn-default" data-dismiss="modal">Cerrar</button>
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