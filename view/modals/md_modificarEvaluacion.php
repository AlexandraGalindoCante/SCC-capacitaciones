<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarEvaluacion" name="modEv" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Modificar evaluación</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">

          <form id="modificarEvaluacion" action="../controller/controladorEvaluacion.php" method="post" name="modiEv">
           <div class="form-group">
              <label>Calificación:</label>
              <div class="input-group">
                <input class="form-control" id="calificacion" name="calificacion"   min="0.0" max="5.0" step="any" type="number" > 
              
              </div>
            </div>
            <div class="form-group">
              <label>Observaciones:</label>
              <div class="input-group">
                <input class="form-control" name="observaciones" id="observaciones"  type="text">
                <input class="form-control" name="idAsigEmpleado" id="empleado"  type="hidden">
                <input class="form-control" name="idAsigModulo" id="modulo"  type="hidden">
                <input class="form-control" name="estado" id="estado"  type="hidden">
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
   
  

