<?php
include("../models/Datos.php");
include("../models/Modulo.php");
include("../models/Programacion.php");
include("../models/Capacitador.php");


class controladorModulo{


private $model;


	public function registrar(){
		$model = new Modulo($_REQUEST['nombre'],$_REQUEST['frecuencia']);
		$model->nuevoModulo();
	}
	public function modificar(){
		$model = new Modulo($_REQUEST['idModulo'],$_REQUEST['nombre'],$_REQUEST['frecuencia']);
		$model->modificarModulo();
	}
}


	$controlador = new controladorModulo;
	$funcion = null;

	if(isset($_REQUEST['registrar']) && ($_REQUEST['registrar'])==0){
	$funcion = 'registrar';

	}elseif(isset($_REQUEST['registrar']) && ($_REQUEST['registrar'])==1){
	$funcion = 'actualizar';
	}
	elseif(isset($_REQUEST['registrar']) &&  ($_REQUEST['registrar'])==1){
	$funcion = 'inhabilitar';
	}
	if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
	}



?>