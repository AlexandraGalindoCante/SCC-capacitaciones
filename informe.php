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
 where asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' and empresa='GF' ;");
if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}


$usuarios=mysqli_query($con,"SELECT DISTINCT emp.nombreCompleto,emp.documento,asEmp.idAsigEmpleado,emp.empresa from asigEmpleado as asEmp
 inner join cargarempleado as emp on documento=idEmpleado
 inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
 WHERE asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1' and empresa='GF' order by nombreCompleto asc;") 
or die(mysql_error());


if(isset($_POST['create_pdf'])){
  require_once('tcpdf/tcpdf.php');

  $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// set default header data
  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0, 0, 0, 100), array(0, 0, 0, 100));
  $pdf->setFooterData(array(0,100,0), array(0,100,128));

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
  <h2 style="text-align:center;">ASISTENCIA</h2>
  <br>

  <h2 style="text-align:center;"> CAPACITACIÓN '.$_SESSION['tpCap'].'</h2>
  <h3 style="text-align:center;">Fecha de programación: '.$_SESSION['fechaIn'].'</h3>
  <br>
  <div class="col-md-12"  style="padding-top=15px;">


  <table border="1" cellpadding="5">
  <thead>
  <tr>
  <th>N° Documento</th>
  <th>Nombre</th>
  <th>Cargo</th>
  <th>Firma</th>
  
  </tr>
  </thead>
  ';

  while ($user=$usuarios->fetch_assoc()) { 
    if($user['cargo']>="aprendiz"){  $color= '#42b15b'; }else{ $color= '#fbb2b2'; }
    $content .= '
    <tr bgcolor="'.$color.'">
    <td>'.$user['documento'].'</td>
    <td>'.$user['nombreCompleto'].'</td>
    <td>'.$user['cargo'].'</td>
    <td></td>      
    </tr>
    ';
  }

  $content .= '</table>';

  $content .= '
  <div class="row padding" style="padding-top=100px";>
  <div class="col-md-12" style="text-align:center;">
  
  </div>
  </div>
  </body>

  ';

  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->lastPage();
  $pdf->output('Reporte.pdf', 'I');
}






?>

<!doctype html>
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
  <div id="loadCap" class="container-fluid">
    <img src="imagenes/gf.jpg"  style="height: 80px; width: 80px;">
    <h2 style="text-align:center;">ASISTENCIA</h2>
    <br>

    <?php $h1 = $_SESSION['tpCap'];
    $h2 = $_SESSION['fechaIn'];  
    echo '<h1> CAPACITACIÓN '.$h1.'<br>Fecha de programación: '.$h2.'</h1>'
    ?>
    <div class="">
      <div class="col-md-12" style="padding-top: 15%;">



      </div>
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr class="success">

            <th>N° Documento</th>
            <th>Nombre</th>
            <th>Cargo</th>
            
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($user=mysqli_fetch_array($usuarios)){ ?>
          <tr class="">
            <td><?php echo $user['documento']; ?></td>
            <td><?php echo $user['nombreCompleto']; ?></td>           
            <td><?php echo $user['cargo']; ?></td>
            
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
</body>
</html>