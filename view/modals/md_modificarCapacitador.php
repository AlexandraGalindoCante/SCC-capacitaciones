<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarCap" name="modificarCap"" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel"><b>Modificar: </b> datos capacitador</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax_register">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("select count(*) as cuenta from Capacitador where visibilidad = '1'") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("select documento from Capacitador") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $documento[$i]=$vector['documento'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="modificarCap" action="../controller/controladorCapacitador.php" method="post" name="modificarCap"">
            <div class="form-group">
              <label>Documento:</label>
              <div class="input-group">
                <input class="form-control" id="documento" name="documento" pattern="[0-9]{1,45}"   type="text" > </span>
              </div>
            </div>
            <div class="form-group">
              <label>Nombre completo:</label> <input class="form-control" name="nombre" id="nombre" pattern="[a-zA-ZáćéįóúÿýżźñÉÓÚÑ- ]{1-20}" required="" title="Ingrese solo letras" type="text">
            </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="funcion" id="funcion" value="2" type="submit"> Enviar</button> <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </form>
        </div>
      </div>
      </div>
    </div>
    </div> 
    </div>
  </div>

 