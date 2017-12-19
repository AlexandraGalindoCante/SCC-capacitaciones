
<div class="modal" id="elimArchivo"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
      <div class="modal-body">
        <form id="elimArchivo" action="../controller/controladorArchivo.php" method="post">
          <input type="hidden" id="id" name="id">

          <h2 class="text-center text-muted">¿Esta seguro? </h2>
          <h4 class="text-center text-muted">Esta acción eliminará de forma permanente el archivo.</h4> 
          <center><img src="../imagenes/advertencia.png" align="center"></center>

          <p class="lead text-muted text-center" style="display: block;margin:10px">
          ¿Desea continuar?</p> 
          <div class="modal-footer" style="padding-right: 18%;">
            <button type="button" class="btn btn-md btn btn-blue-grey" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="funcion" id="funcion" value="Eliminar" class="btn btn-md btn-primary">Continuar</button>            
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
