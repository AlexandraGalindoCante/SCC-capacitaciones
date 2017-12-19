<?php
include ('libreriaSCC.php');
# conectare la base de datos
    $con = conectar();
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
    $mysql=mysqli_query($con,"set names 'utf8'");
    $query = mysqli_query($con,"SELECT * FROM  Usuario");

    if ($numrows>0){
      ?>

<script type="text/javascript">
$('#modContrasena').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var documento = button.data('doc') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#documento').val(id)
    })
</script>

