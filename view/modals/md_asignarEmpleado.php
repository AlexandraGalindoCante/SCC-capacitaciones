
<div class="modal" id="md_asigEmpleado" name="md_asigEmpleado"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
      <form id="md_asigEmpleado" name="md_asigEmpleado" action="../controller/controladorAsigEmpleado.php" method="post">
        <input type="hidden" id="idProgramacion" name="idProgramacion">

        <h2 class="text-center text-muted">Asignar empleado</h2>
        <div class="col-xs-6 ">
         <p class="lead text-muted text-center" style="display: block;margin:10px">
          <img src="../../imagenes/adv.png">. ¿Deseas continuar?</p>
          <div class="modal-footer" style="padding-right: 18%;">
            <button type="button" class="btn btn-md btn btn-blue-grey" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="funcion" id="funcion" value="Eliminar" class="btn btn-md btn-primary">Continuar</button>            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
