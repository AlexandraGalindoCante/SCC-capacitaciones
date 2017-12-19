<?php
include("../models/Datos.php");
include("../models/Tema.php");

class controladorTema{


private $model;


	public function registrar(){
		$model = new Tema($_REQUEST['nombre'],$_REQUEST['descripcion']);
		var_dump($model);
		$model->nuevoTema();
	}
	public function modificar(){
		$model = new Tema($_REQUEST['idTema'],$_REQUEST['nombre'],$_REQUEST['nombre']);
		$model->modificarTema();
	}
	public function inhabilitar(){
		$model = new Tema($_REQUEST['idTema']);
		var_dump($model);
		$model->inhabilitarTema();
	}
}


	$controlador = new controladorTema;
	$funcion = null;

	if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'registrar';
	header('Location: ../view/gestionTemas.php');

	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'actualizar';
		header('Location: ../view/gestionTemas.php');
	}
	elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
	$funcion = 'inhabilitar';
		//header('Location: ../view/gestionTemas.php');
	}
	if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
	}



?>