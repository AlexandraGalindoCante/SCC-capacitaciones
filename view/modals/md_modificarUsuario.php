<div class="modal fade" aria-labelledby="myModalLabel"  id="modificarUsuario" name="modificarUsuario" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
          <h4 align="center" class="modal-title" id="myModalLabel">Modificar usuario</h4>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("SELECT count(*) as numrows from Usuario ") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("SELECT * from Usuario order by  numeroDocumento") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $modulo[$i]=$vector['numeroDocumento'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="modificarMUsuario" action="../controller/controladorUsuario.php" method="post" name="modificarUsuario">
           <div class="form-group">
              <label>* Número de documento:</label>
              <div class="input-group">
                <input class="form-control" id="documento" name="documento"  required="" type="text" > 
              
              </div>
            </div>
            <div class="form-group">
              <label>Nombre usuario:</label>
              <div class="input-group">
                <input class="form-control"   id="nombre" name="nombre"  type="text">
              </div>
            </div>
             <div class="form-group">
              <label>Contraseña:</label>
              <div class="input-group">
                <input class="form-control"   id="contrasena" name="contrasena"  type="password" > 
              </div>
            </div>
              <div class="form-group">
              <label>Rol:</label> 
                <select class="form-control" name="rol" id="rol">
                <option value="">Seleccione rol</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idRol, rol from Rol") or die($mysql->error);
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idRol']."\">".$reg['rol']."</option>";
                  }
                  $mysql->close();
                ?>
                </select>
            </div>
          <div class="modal-footer">
            <button class="btn btn-primary" name="funcion" id="funcion" value="3" type="submit"> Guardar</button> 
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
   
  

