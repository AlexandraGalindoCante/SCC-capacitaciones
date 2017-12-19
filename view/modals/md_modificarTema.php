<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarTema" name="modificarTema" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel"><b>Modificar:</b> tema</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("SELECT count(*) as numrows from Tema ") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("SELECT * from Tema order by  nombre") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $tema[$i]=$vector['idTema'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="modificarTema" action="../controller/controladorTema.php" method="post" name="modificarTema">
          <input type="hidden" name="idTema" id="idTema">
           <div class="form-group">
              <label>* Nombre tema:</label>
              <div class="input-group">
                <input class="form-control" id="nomTema" name="nomTema"  required="" type="text" > 
              
              </div>
            </div>
            <div class="form-group">
              <label>Descripción (Opcional):</label>
              <div class="input-group">
                   <textarea class="form-control" rows="4" cols="50" id="descripcion" name="descripcion" name="comment">
              </textarea>
              
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
   
  

