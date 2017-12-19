<?php
include("../models/Datos.php");
include("../models/AsigModulo.php");


class controladorAsignarModulo{


private $model;


	public function crear(){
		$model = new AsigModulo($_REQUEST['idProgramacion'],$_REQUEST['idModulo'],$_REQUEST['capacitador']);
		var_dump($model); 
		$model->asignarModulo();
		header('Location: ../view/gestionCapacitacion.php');
	}
	public function modificar(){
		$model = new AsigModulo($_REQUEST['idAsigModulo'],$_REQUEST['idProgramacion'],$_REQUEST['idModulo'],$_REQUEST['idCapacitador']);
		$model->modificarAsigMod();
	}
	public function inhabilitar(){
		$model = new AsigModulo($_REQUEST['idAsigModulo']);
		var_dump($model);
		$model->eliminarAsigModulo();
	}
	public function calificarCapacitador(){
		$model=new AsigModulo($_REQUEST['idAsigModulo'],$_REQUEST['resultCapacitador']);
		$model->calificarCapacitador();

	}
	
}	
	$controlador = new controladorAsignarModulo;

	

	if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'crear';

	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'actualizar';
	}
	elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
	$funcion = 'inhabilitar';
	}
	if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
	}



?>