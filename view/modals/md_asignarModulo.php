
<div class="modal fade" aria-labelledby="myModalLabel"  id="asignarModulo" name="asignarModulo" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Asignar Modulo</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">
   

        <form id="AsignacionModulo" action="../controller/controladorAsigModulo.php" method="post" name="AsignacionModulo">


            <input type="hidden" id="idProgramacion" name="idProgramacion">
            <div class="form-group">
                <label>Módulo:</label> 
                <select class="form-control" name="idModulo" id="idModulo" required="">
                  <option value="">Seleccione</option>
                  <?php
                    $mysql=conectar();
                    $registro=$mysql->query("SELECT  idModulo, nombreModulo from Modulo WHERE visibilidad=1 order by idModulo; ") or die($mysql->error);
                    while($reg=$registro->fetch_array()){
                      echo "<option value=\"".$reg['idModulo']."\">".$reg['nombreModulo']."</option>";  
                  }
                  $mysql->close();
                ?>

              </select>
             </div>
             
          <div class="form-group">
                <label>Capacitador:</label> 
                <select class="form-control" name="capacitador" id="capacitador" required="">
                  <option value="">Seleccione</option>
                  <?php
                    $mysql=conectar();

                    $charset=mysqli_query($mysql,"set names 'utf8'");
                    $registro=$mysql->query("select documento,nombreCapacitador from Capacitador where visibilidad=1 order by nombreCapacitador ") or die($mysql->error);
                    while($reg=$registro->fetch_array()){
                      echo "<option value=\"".$reg['documento']."\">".$reg['nombreCapacitador']."</option>";  
                  }
                  $mysql->close();
                ?>

              </select>
            </div> 
      
            
        <div class="modal-footer">
        <button class="btn btn-success" name="funcion" value="1" type="submit"> Guardar</button> <button class="btn btn-success" data-dismiss="modal">Cerrar</button>
         </form>
      </div>
      </div>
      </div>
    </div>
    </div> 
    </div>
  </div>

<script type="text/javascript">
  function cargarIdModulo() {
    var idModulo = document.getElementById("Idmodulo").value;
    load(idModulo);
}
</script>

<script type="text/javascript">
  function load(idModulo){
    var parametros = {"action":"ajax","idModulo":idModulo};
    $("#loadTemas").fadeIn('slow');
    $.ajax({
      url:'consulta/cargarTemas.php',
      data: parametros,
      success:function(data){
        $(".outer_div").html(data).fadeIn('slow');
        $("#loadTemas").html("");
      }
    })
  }
</script>
