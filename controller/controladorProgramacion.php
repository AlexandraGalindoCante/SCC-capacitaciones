<?php
include("../models/Datos.php");
include("../models/Programacion.php");


class controladorProgramacion{

	private $model;


	public function crear(){
		$model = new Programacion($_REQUEST['title'],$_REQUEST['start'],$_REQUEST['end'],$_REQUEST['hora'],$_REQUEST['tipoCap'],$_REQUEST['modalidad'],$_REQUEST['nivel'],$_REQUEST['color']);
		var_dump($model);		
		$model->crearProgramacion();
	}
	public function modificar(){
		$model = new Programacion($_REQUEST['idProgramacion'],$_REQUEST['title'],$_REQUEST['fechaInicio'],$_REQUEST['hora'],$_REQUEST['tipoC'],$_REQUEST['modalidad'],$_REQUEST['nivel']);
		var_dump($model);

		$model->modificarProgramacion();
	}
	public function inhabilitar(){
		$model = new Programacion($_REQUEST['idProg']);
		var_dump($model);
		$model->inhabilitarProgramacion();
	}


}
	$controlador = new controladorProgramacion;
	$funcion=null;


	if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==0){
		$funcion = 'crear';
		//header('Location:../view/gestionCapacitacion.php');

	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'modificar';
		//header('Location:../view/gestionCapacitacion.php');
	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'inhabilitar';
		header('Location:../view/gestionCapacitacion.php');
	}

	if(method_exists($controlador, $funcion)){


		call_user_func(array($controlador, $funcion));
	}

?>



