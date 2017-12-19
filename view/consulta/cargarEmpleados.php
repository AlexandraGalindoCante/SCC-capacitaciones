
<?php
include_once ('libreriaSCC.php');
session_start();
$con = conectar();
if(!$con){
  die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
  die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
//$dni=$_REQUEST['area']; 
//$_SESSION['area']=$dni;


$query = mysqli_query($con,"SELECT documento,nombreCompleto,area from cargarEmpleado where area='Tic'"); 

$convertToJson = array();

while($row = mysqli_fetch_array($query, MYSQL_ASSOC))
{

  $rowArray=array($row['documento'], $row['nombreCompleto'], $row['area']);


  array_push($convertToJson, $rowArray);

}
json_encode($convertToJson);

$lista = "data.json";

$data = json_encode($convertToJson); 

if ($fp = fopen($lista, "w"))
{
 fwrite($fp, '{ "data":'.$data.'}');
}
fclose($fp);

mysqli_close($con) 
?>
<div class="container" style="margin:15px auto">

  <form id="myform" name="asignarHorario" method="post" action="pruebaHorario.php">   
   <!--<p><b>Registro seleccionados</b></p>
    <pre id="view-rows"></pre>
     <p><b>Form data as submitted to the server</b></p>
    <pre id="view-form"></pre>
    <p><button class="btn btn-danger">Ver seleccion</button></p>-->
    <div class="col-md-3 col-sm-3 col-xs-12">
      <input type="text" id ="cedula" name="cedula" />
      <label>SELECCIONE FECHA:</label>
      <input type="date" name="fecha" value="" id="fecha" class="form-control input" tabindex="1">
    </div>  
    <label  for="horario">SELECCIONE HORARIO DE ENTRADA:</label><br>                         
    <div class="col-md-3 col-sm-3 col-xs-12">
      <select id="horario" name="horario" class="form-control has-feedback-left" required>
        <option value="" disabled="true" selected="true" >Seleccione </option>
        <option value="1">7:00 AM</option>
        <option value="2">8:00 AM</option>
        <option value="3">9:00 AM</option>
        <option value="4">10:00 AM</option>
        <option value="5">11:00 AM</option>
        <option value="6">SIN HORARIO ESTABLECIDO</option>
      </select>
      <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span><br>   
    </div>
      <button   class="btn btn-success btn-md  btn-right"><i class="fa fa-save" aria-hidden="true"> GUARDAR HORARIO</i></button>
     <br><br>
    
    <table id="mytable" class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>    
         <th></th>  
         <th>Nombre</th>  
         <th>Cargo</th> 
       </tr>
     </thead>
     <tfoot>
      <tr>    
        <th></th>  
        <th>Nombre</th>  
        <th>Cargo</th> 
      </tr>
    </tfoot>
  </table>
</form>


</div>
<script>
  $(document).ready(function(){
    var mytable = $("#mytable").DataTable({
      ajax: 'data.json',
      columnDefs: [
      {
        targets: 0,
        checkboxes: {
          seletRow: true
        }
      }
      ],
      select:{
        style: 'multi'
      },
      order: [[1, 'asc']]
    })
    $("#myform").on('submit', function(e){
      var form = this
      var rowsel = mytable.column(0).checkboxes.selected();
      $.each(rowsel, function(index, rowId){
        $(form).append(
          $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
          )
      })
      var stringCedulas = rowsel.join(",");
      $("#view-rows").text(rowsel.join(","));
      $("#view-form").text($(form).serialize());
      $('input[name="id\[\]"]', form).remove();
      document.getElementById("cedula").value = stringCedulas
      e.preventDefault()
      form.submit();
    })
  })
</script>
