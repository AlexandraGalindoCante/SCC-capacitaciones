 <div class="modal in" id="modContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 65px; padding-bottom: 100px;">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Cambiar contraseña </h4>
      </div>

      <div class="modal-body">
        <div id="datos_ajax_register"></div>
        <form id="modContrasena" action="../controller/controladorUsuario.php" method="post" >
          

          <input type="hidden" class="form-control"  name="documento" id="documento" autofocus required>
          <div class="form-group">
            <label >Contraseña anterior: </label>
            <input id="nombreUsuario" type="text" name="passAnterior" class="form-control form-control"><small class="form-text"></small>
          </div>
          <div class="form-group">
            <label >Digite de nuevo su contraseña: </label>
            <input id="nombreUsuario" type="text" name="passNueva" class="form-control form-control"><small class="form-text"></small>
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
