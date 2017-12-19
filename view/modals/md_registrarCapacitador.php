<div class="modal fade" aria-labelledby="myModalLabel"  id="registroCap" name="registroCap"" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Registro capacitador</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax_register">
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
          <form id="registroCap" action="../controller/controladorCapacitador.php" method="post" name="registroCap"">
            <div class="form-group">
              <label>Documento:</label>
              <div class="input-group">
                <input class="form-control" id="documento" name="documento" pattern="[0-9]{1,45}" required="" type="text"> <button class="btn btn-success" onclick="validar()"  type="button"><i aria-hidden="true"  class="fa fa-search"></i></span></button></span>
              </div>
            </div>
            <div class="form-group">
              <label>Nombre completo:</label> <input class="form-control" name="nombre" id="nombre" pattern="[a-zA-ZáćéįóúÿýżźñÉÓÚÑ- ]{1-20}" required="" title="Ingrese solo letras" type="text">
            </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="funcion" id="funcion" value="1" type="submit"> Enviar</button> <button class="btn btn-default primary" data-dismiss="modal">Cerrar</button>
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