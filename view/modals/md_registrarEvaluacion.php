<div class="modal fade" aria-labelledby="myModalLabel"  id="crearEvaluacion" name="crearEv" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Registrar evaluación</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">

          <form id="crearEvaluacion" action="../controller/controladorEvaluacion.php" method="post" name="crearEv">
           <div class="form-group">
              <label>Calificación:</label>
              <div class="input-group">
                <input class="form-control" id="calificacion" name="calificacion"  value="0" min="0" max="5" step="any"  type="number" > 
              
              </div>
            </div>
            <div class="form-group">
              <label>Observaciones:</label>
              <div class="input-group">
                <textarea class="form-control" name="observaciones" id="observaciones"  type="text"></textarea>
                <input class="form-control" name="idAsigEmpleado" id="empleado"  type="hidden">
                <input class="form-control" name="idAsigModulo" id="modulo"  type="hidden">
                <input class="form-control" name="estado" id="estado"  type="hidden">
              
              </div>
            </div>

          <div class="modal-footer">
            <button class="btn btn-primary" name="funcion" id="funcion" value="1" type="submit"> Guardar</button> 
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
   
  

