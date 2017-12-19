<div class="modal fade" aria-labelledby="myModalLabel"  id="crearMod" name="crearMod" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-md" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-content">
    <div class="modal-header">
      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
      <h4 align="center" class="modal-title" id="myModalLabel">Crear módulo</h4>
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
          $tema[$i]=$vector['idModulo'];
          $i++;
        }
        $mysql->close();
        ?>
        <form id="crearMod" action="../controller/controladorModulo.php" method="post" name="crearMod">
         
          <div class="form-group">
            <label>* Nombre Modulo:</label>
            <div class="input-group">
              <input class="form-control" id="nombreMod" name="nombreMod"  required="" type="text" > 

            </div>
          </div>
          <div class="form-group">
            <label>Formación:</label>
            <select id="tipo" name="tipo" class="form-control" required>
              <option value="" disabled="true" selected="true" >Seleccione el tipo de formación</option>
              <option value="1">INDUCCION</option>
              <option value="2">CARTERA</option>
            </select>
          </div>
          <div class="form-group">
            <label>Frecuencia:</label>
            <div class="input-group">
              <input class="form-control"  value="0" min="0" step="0" required id="frecuencia" name="frecuencia"  type="number" >Meses

            </div>
          </div>
          <div class="form-group">
            <label>Descripción (opcional):</label>
            <div class="input-group">
              <textarea class="form-control"  rows="10" cols="40"  id="descripcion" name="descripcion" > </textarea>

            </div>
          </div>
          <div class="modal-footer" style="padding-right: 18%;">
            <button type="button" class="btn btn-md btn btn-blue-grey" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="funcion" id="funcion" value="Eliminar" class="btn btn-md btn-primary">Continuar</button>            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>



