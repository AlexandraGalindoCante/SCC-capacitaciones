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

$count_query   = mysqli_query($con,"SELECT  count(*) AS numrows FROM
    cargarempleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
    INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
    INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
    LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
    WHERE pr.idProgramacion='$_SESSION[idProgramacion]' AND am.idModulo ='$_SESSION[moduloEvaluacion]' AND (ev.visibilidad IS NULL OR ev.visibilidad = 1) AND empresa='GF'
    ORDER BY ae.idAsigEmpleado asc;");
if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}


$usuarios=mysqli_query($con,"SELECT e.nombreCompleto,e.documento,e.empresa, ae.idAsigEmpleado, am.idAsigModulo,
    ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad FROM
    cargarempleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
    INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
    INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
    LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
    WHERE pr.idProgramacion ='$_SESSION[idProgramacion]'  AND am.idModulo ='$_SESSION[moduloEvaluacion]' AND (ev.visibilidad IS NULL OR ev.visibilidad = 1) AND empresa='GF'
    ORDER BY ae.idAsigEmpleado asc") 
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
  <body border="0">
  <div class="row">
  
  <table border="1" cellpadding="5" >
  <thead>
  <tr style="text-align:center;">
  <th style="text-align:left;">CODIGO: GFFO-150 FECHA: 31/08/2017  VERSION: 0</th>
  <th><span style="text-align:center;">FORMATO DE ANALISIS DE RESULTADOS (EVALUACIONES)<h5>'.$_SESSION['nombreMod'].'</h5></span></th> 
  <center><th><img src="imagenes/gf.jpg"  style="height:120px; width:160px;  border="0" "></th></center>
  </tr>
  <tr style="text-align:center;">
  <th>NOMBRE</th>
  <th >CALIFICACION</th>
  <th >CALIFICACION FINAL</th>  
  </tr>
  </thead>
  ';

  while ($user=$usuarios->fetch_assoc()) { 
    if($user['calificacion']>=3){  $color= '#fff'; }else{ $color= '#fff'; }
    $content .= '
    <tr bgcolor="'.$color.'" >
    
    <td>'.$user['nombreCompleto'].'</td>
    <td style="text-align:center;">'.$user['calificacion'].'</td>
    <td ></td>
    
    </tr>
    ';
  }

  $content .= '</table>';

  $content .= '
  <div class="row padding" style="padding-top=50px";>
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
  <title>REPORTE CAPACITACIONES</title>
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
      <table class="table table-bordered">
        <thead>
      <tr class="success">
            <th>CODIGO: GFFO-150</br> <br>FECHA: 31/08/2017 </br> <br> VERSION:0 </br></th>
      <th><h5><center>FORMATO DE ANALISIS DE RESULTADOS <br><br>(EVALUACIONES)</br></br></h5></center></th>
      <center><th><img src="imagenes/gf.jpg"  style="height: 120px; width: 160px;"></th></center>
     
          
          <tr class="success">
            <th>#</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Calificacion</th>
            
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
            <td><?php echo $user['calificacion']; ?></td>
            
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