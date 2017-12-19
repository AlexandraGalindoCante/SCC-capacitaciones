 <div class="hidden">
              <label>Resultado capacitador:</label> 
              <select class="form-control" id="resultCapacitador" name="resultCapacitador" required >
                <option value="">Seleccione</option>
                <?php
                  $calificacionC = array("APROBADO","POR EVALUAR");
                  $i = 0;
                  while($i < count($calificacionC)){
                   echo "<option value=\"".$calificacionC[$i]."\">".$calificacionC[$i]."</option>"; 
                  $i++;
                  }
                  ?>
              </select>
            </div>