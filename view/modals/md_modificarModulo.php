<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarMod" name="modificarMod" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">

    <div class="modal-content">
      <div class="modal-header">
       
          <h4 align="center" class="modal-title" id="myModalLabel">Modificar módulo</h4>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("SELECT count(*) as numrows from Modulo ") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("SELECT * from Modulo order by  nombreModulo") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $modulo[$i]=$vector['idModulo'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="modificarMod" action="../controller/controladorModulo.php" method="post" name="modificarMod">
          <input type="hidden" name="idModulo" id="idModulo">
           <div class="form-group">
              <label>* Nombre Modulo:</label>
              <div class="input-group">
                <input class="form-control" id="nombreModulo" name="nombreModulo"  required="" type="text" > 
              
              </div>
            </div>
            <div class="form-group">
                <label>* Formación:</label>
              <select id="contrato" name="tipo" class="form-control" required>
                <option value="" disabled="true" selected="true" >Seleccione el tipo de formación</option>
                <option value="1">INDUCCION</option>
                <option value="2">CARTERA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Frecuencia:</label>
              <div class="input-group">
                <input class="form-control"  value="0" min="0" step="0" required id="frecuencia" name="frecuencia"  type="number"> &nbsp;Meses
              
              </div>
            </div>
             <div class="form-group">
              <label>Descripción (opcional):</label>
              <div class="input-group">
                <textarea class="form-control" rows="10" cols="40"  id="descripcion" name="descripcion" > </textarea>
              
              </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-primary" name="funcion" id="funcion" value="2" type="submit"> Guardar</button> 
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
   
  

