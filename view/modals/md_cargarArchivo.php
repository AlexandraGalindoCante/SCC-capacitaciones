 <div class="modal fade lg" id="registro"  name="registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="padding-top: 45px; padding-bottom: 100px;">
        <div class="modal-content">

          <div class="modal-header">
         
          <h2 class="modal-title" id="myModalLabel" align="center" style="font-weight: bold; color: #fff;">Cargar formato de asistencia</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
          <div id="datos_ajax_register"></div>

          <form action="../controller/controladorArchivo.php" name="myForm" method="post" enctype="multipart/form-data">

            <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
         <input type="hidden" id="idProg" name="idProg">


            <div class="form-group">
              <label>Seleccione el archivo:</label>
              <input type="file" name="archivo" id="archivo">
             </div>
        
           </div>
          
          <div class="modal-footer">
               <button class="btn btn-primary" name="archivo" value="archivo" onclick="validarRegArchivo();" >Enviar </button>
               <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

  

        </div> 
      </div> 
    </div>
</form>

<script type="text/javascript">
    function validarRegArchivo(){
if ((/.(pdf)$/i.test(document.getElementById("archivo").value))=="")
{
alert('Comprueba las extensiones del archivo solo pueden ser pdf');
document.getElementById("archivo").focus();
return (false);
}

    }
</script>