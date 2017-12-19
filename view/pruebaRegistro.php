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


$capacitador=$_REQUEST['capacitador'];
$modulo=$_REQUEST['idModulo'];
$idP=$_SESSION['idProgramacion'];//$_SESSION['idProgramacion'];
$stringCedulas = $_REQUEST['cedula'];
//if(isset($stringCedula)){
	//header('Location:../view/gestionCapacitacion.php');

//}
$arrayCedulas = explode(',', $stringCedulas);


$msg="";
$sql ="";
foreach ($arrayCedulas as $key => $valor){
	$sql= "call crearAsignacionProgramacion($capacitador,$idP,$modulo,$valor)";
	if (mysqli_multi_query($con, $sql)){
		 $msg= "Hey sos una genio!";
		header('Location: ../view/gestionCapacitacion.php');
	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
}
	//header('Location:gestionCapacitacion.php');
?>

