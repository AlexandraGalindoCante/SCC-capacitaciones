<?php

include("../models/Datos.php");
include("../models/Capacitador.php");


class controladorCapacitador{

	private $model;




	public function registrar(){
		$model = new Capacitador($_REQUEST['nombre'],$_REQUEST['documento']);

		$model->registrarCapacitador();
	}
	public function modificar(){
		$model = new Capacitador($_REQUEST['documento'],$_REQUEST['nombre']);
		$model->modificarCapacitador();
	}
	public function inhabilitar(){
	$model = new Capacitador($_REQUEST['documento']);
	var_dump($model);
	$model->inhabilitarCapacitador();

    }
}




	$controlador = new controladorCapacitador;
	$funcion = null;

	if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
		$funcion = 'registrar';
		header('Location: ../view/gestionCapacitador.php');
	

	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
		$funcion = 'modificar';
			header('Location: ../view/gestionCapacitador.php');
	}
	elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
		$funcion = 'inhabilitar';
		
		header('Location: ../view/gestionCapacitador.php');
	}
	if(method_exists($controlador, $funcion)){


		call_user_func(array($controlador, $funcion));
	}
	

?>