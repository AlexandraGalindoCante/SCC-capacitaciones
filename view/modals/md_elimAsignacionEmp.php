
<div class="modal fade" id="elimAsignacion"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
      <div class="modal-body">
        <form id="elimAsignacion" action="../controller/controladorAsigEmpleado.php" method="post">
          <input type="hidden" id="idAsigEmpleado" name="idAsigEmpleado">
          
          <center><img src="../imagenes/advertencia.png" align="center"></center>
          <h2 class="text-center text-muted">¿Esta seguro?</h2>

          <p class="lead text-muted text-center" style="display: block;margin:10px">
          Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p> 
          <div class="modal-footer" style="padding-right: 18%;">
            <button type="button" class="btn btn-md btn btn-blue-grey" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="funcion" id="funcion" value="2" class="btn btn-md btn-primary">Continuar</button>            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
