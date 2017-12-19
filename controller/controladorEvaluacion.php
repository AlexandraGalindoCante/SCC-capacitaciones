<?php
include_once("../models/Datos.php");
include_once("../models/Evaluacion.php");
	



class controladorEvaluacion{


private $model;


	public function crear(){
		if ($_REQUEST['estado']=="") {
			$estado = "Evaluado";
		}else{
			$estado = $_REQUEST['estado'];
		}
		$idAsigModulo = $_REQUEST['idAsigModulo'];
		$idAsigEmpleado = $_REQUEST['idAsigEmpleado'];
		$observaciones = $_REQUEST['observaciones'];
		$calificacion = $_REQUEST['calificacion'];
		$model = new Evaluacion($estado,$calificacion,$observaciones,$idAsigEmpleado,$idAsigModulo);
		var_dump($model);
		$model->registrarEvaluacion();
		header('Location: ../view/gestionEvaluacion.php');
	}
	public function actualizar(){
		if ($_REQUEST['estado']=="") {
			$estado = "Evaluado";
		}else{
			$estado = $_REQUEST['estado'];
		}
		$idAsigModulo = $_REQUEST['idAsigModulo'];
		$idAsigEmpleado = $_REQUEST['idAsigEmpleado'];
		$observaciones = $_REQUEST['observaciones'];
		$calificacion = $_REQUEST['calificacion'];
		$model = new Evaluacion($estado,$calificacion,$observaciones,$idAsigEmpleado,$idAsigModulo);
		$model->actualizarEvaluacion();
		header('Location: ../view/gestionEvaluacion.php');
	}
	
}


	$controlador = new controladorEvaluacion;
	$funcion = null;
	if(isset($_REQUEST['funcion'])){

		if($_REQUEST['funcion']==1){
			$funcion = 'crear';
		}elseif($_REQUEST['funcion']==2){
			$funcion = 'actualizar';
		}
		
		if(method_exists($controlador, $funcion)){
			call_user_func(array($controlador, $funcion));
		}
	}


?>