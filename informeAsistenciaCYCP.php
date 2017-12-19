<?php 
require_once('view/libreriaSCC.php');
session_start();
$con = conectar();
if(!$con){
  die("imposible conectarse: ".mysqli_error($con));
} 
if (@mysqli_connect_errno()) {
  die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
$mysql=mysqli_query($con,"set names 'utf8'");

$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM asigEmpleado as asEmp
 inner join cargarempleado as emp on documento=idEmpleado
 inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
 where asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' and empresa='CYCP';");
if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}


$usuarios=mysqli_query($con,"SELECT DISTINCT emp.nombreCompleto,emp.documento,asEmp.idAsigEmpleado,emp.empresa, emp.cargo from asigEmpleado as asEmp
 inner join cargarempleado as emp on documento=idEmpleado
 inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
 WHERE asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' and empresa='CYCP' order by nombreCompleto asc;") 
or die(mysql_error());


if(isset($_POST['create_pdf'])){
  require_once('tcpdf/tcpdf.php');

  $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// set default header data

  
// set header and footer fonts
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  $pdf->addPage();

  $content = '';

  $content .= '
  <body border="1">
  <div class="row">
  
  <table border="1" cellpadding="4" >
  <thead>
  <tr style="text-align:center;">
  <th style="text-align:left;">Codigo: CYCPFO-01<br>Fecha: 16/12/2016<br>Version:01</th>
  <th><span style="text-align:center;"><h4>CAPACITACIONES FORMATO ASISTENCIA </h4></span></th> 
  <center><th><img src="imagenes/cycp.png"  style="height:70px; width:110px;  border="0" "></th></center>
  </tr>
  <br>
   <tr style="text-align:left;">  
  <th colspan="2">FECHA: '.$_SESSION['fechaIn'].'</th>
  <th>HORA: '.$_SESSION['hora'].'</th> 
  </tr>
   <tr style="text-align:left;">
  <th colspan="3">Nombre responsable o capacitador: <u>'.$_SESSION['capacitador'].'</u><br></th> 
   </tr>
  <tr style="text-align:left;">
  <th colspan="3">Tema:_________________________ <br></th> 
   </tr>
  <tr style="text-align:center;">
  <th width="40">#</th>
  <th  width="180">NOMBRE COMPLETO</th>
  <th  width="150">DOCUMENTO</th> 
  <th  width="150">CARGO</th>
  <th  width="110">FIRMA</th>  
  </tr>
  </thead>
 ';
  $con=1;
  while ($user=$usuarios->fetch_assoc()) { 
    $content .= '
    <tr style="text-align:center;" bgcolor="'.$color.'" >
    <td width="40">'.$con++.'</td>
    <td width="180">'.$user['nombreCompleto'].'</td>
    <td width="150">'.$user['documento'].'</td>
    <td width="150">'.$user['cargo'].'</td>
    <td  width="110"></td>
    
    </tr>
    ';
  }

  $content .= '</table>';

  $content .= '
  <div class="row padding" style="";>
  <div class="col-md-12" style="text-align:center;">
  
  
  
  </div>
  </div>
  </body>

  ';

  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->lastPage();
  $pdf->output('Reporte.pdf', 'I');
}

?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>ASISTENCIA CAPACITACIONES</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
<!-- Meta Mobil
  ================================================== -->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/informe.css" rel="stylesheet">
</head>

<body>
  <div id="loadCap" class="container-fluid" style=" border-style: ridge; width: 21cm;">
    <div>
      <div style="padding: 30px;" align="right">

      </div>



      <div class="row" style="padding: 10px;">
        <table class="table table-bordered" >
          <thead>
           <tr class="success">
            <th width="200">Codigo: CYCPFO-01<br><br> Fecha: 16/12/2016 <br><br>  Version:01 </br></th>
            <th><h5><center>ASISTENCIA <br><br><?PHP echo $_SESSION['fechaIn'];?></br></br><?PHP echo $_SESSION['hora'];?></h5></center></th>
            <th colspan="2"><img src="imagenes/cycp.png"  style="height: 120px; width: 160px;"></th>
          



            <tr class="success">
              <th>#</th>
              <th>Documento</th>
              <th>Nombre</th>
              <th>Firma</th>

            </tr>
          </thead>

          <tbody>
            <?php 
            $contador=1;
            while ($user=mysqli_fetch_array($usuarios)){ ?>
            <tr class="">
              <td><?php echo $contador++;?></td>
              <td><?php echo $user['documento']; ?></td>
              <td><?php echo $user['nombreCompleto']; ?></td>       
              <td></td>

            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="col-md-12">
          <form method="post">
            <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
            <input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>