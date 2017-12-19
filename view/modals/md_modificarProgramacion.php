<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarProgramacion" name="modificarProgramacion" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">

     <h4 align="center" class="modal-title" id="myModalLabel">Modificar programación</h4>
     <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
   </div>
   <div class="modal-body">
     <div id="datos_ajax_register">
      <?php
      $mysql=conectar();
      $i=0;
      $contar=$mysql->query("select count(*) as cuenta from Programacion where visibilidad = '1'") or die($mysql->error);
      $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
      $registro=$mysql->query("select idProgramacion from Programacion") or die($mysql->error);
      while($vector=$registro->fetch_array()){
       $documento[$i]=$vector['idProgramacion'];
       $i++;
     }
     $mysql->close();
     ?>
     <form id="modificarProgramacion" action="../controller/controladorProgramacion.php" method="post" name="modificarProgramacion">

<div class="form-group">
                <label>Titulo de la capacitación:</label>
                <div class="form-group">
                  <input class="form-control" id="title" name="title" required="" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">     
                </div>
              </div>
      <input type="hidden" id="idProg" name="idProgramacion">
      <div class="form-group">
       <label>Fecha inicio:</label>
       <div class="form-group">
        <input class="form-control" id="fechaInicio" name="fechaInicio"  required="" type="date">

      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-group"> 
      <input class="form-control" name="fechaFin" id="fechaInicio"  required=""  type="hidden">
      <span class="add-on"><i class="icon-remove"></i></span>
      <span class="add-on"><i class="icon-calendar"></i></span>


	  
      <label>Hora:</label>
      <div class="form-group"> 
        <input class="form-control" name="hora" id="hora"  required=""  type="time">
      </div>
    </div>

    <div class="form-group">
      <label>Tipo capacitación:</label> <select class="form-control" id="cap" name="tipoC" required>
       <option value="">Seleccione</option>
       <?php
       $tipoCap = array("INDUCTIVA","PREVENTIVA","CORRECTIVA","DESARROLLO DE LA CARRERA");
       $i = 0;
       while($i < count($tipoCap)){
         echo "<option value=\"".$tipoCap[$i]."\">".$tipoCap[$i]."</option>"; 
         $i++;
       }
       ?>
     </select>
   </div>
   <div class="form-group">
     <label>Modalidad:</label> <select class="form-control" id="modalidad" name="modalidad" required>
      <option value="">Seleccione</option>
      <?php
      $modalidad = array("FORMACION","ACTUALIZACION","ESPECIALIZACION","PERFECCIONAMIENTO");
      $i = 0;
      while($i < count($modalidad)){
        echo "<option value=\"".$modalidad[$i]."\">".$modalidad[$i]."</option>"; 
        $i++;
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Nivel:</label> <select class="form-control" id="nivel" name="nivel" required>
     <option value="">Seleccione</option>
     <?php
     $nivel= array("NIVEL BASICO","NIVEL GENERAL");
     $i = 0;
     while($i < count($modalidad)){
       echo "<option value=\"".$nivel[$i]."\">".$nivel[$i]."</option>"; 
       $i++;
     }
     ?>
   </select>
 </div>
 <div class="modal-footer">
   <button class="btn btn-primary" name="funcion" id="funcion" value="1" type="submit"> Guardar</button> 
   <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--<script type="text/javascript">
   $(".form_datetime").datetimepicker({
     format: "yyy MM dd",
     autoclose: true,
     todayBtn: true,
     startDate: "2013-02-14",

  });
</script>-->

<script type="text/javascript">
  $('.datepicker').pickadate();
</script>