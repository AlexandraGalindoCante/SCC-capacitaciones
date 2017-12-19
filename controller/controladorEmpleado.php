<?php
include("../models/Datos.php");
include("../models/Empleado.php");






class controladorEmpleado{

	

	private $model;

	public function registrar(){
		$model = new Empleado($_REQUEST['documento'],
			$_REQUEST['nombreCompleto'],
			$_REQUEST['telefono'],
			$_REQUEST['correoElectronico'],
			$_REQUEST['idTipoNivelEscolar'],
			$_REQUEST['idTipoContrato'],
			$_REQUEST['fechaInicioLaboral'],
			$_REQUEST['fechaTerminacionContrato'],
			$_REQUEST['idDepartamento'],
			$_REQUEST['empresa'],
			$_REQUEST['numContrato']);
			var_dump($model);
			$model->registrarEmpleado();


	
	}

	public function actualizar(){

		$model=new Empleado($_REQUEST['documento'],
			$_REQUEST['nombre'],
			$_REQUEST['tel'],
			$_REQUEST['correo'],
			$_REQUEST['nivelEscolar'],
			$_REQUEST['tipocontrato'],
			$_REQUEST['fechaInicio'],
			$_REQUEST['fechaTerminacion'],
			$_REQUEST['dep'],
			$_REQUEST['empresa'],
			$_REQUEST['numContrato']);
			var_dump($model); 
			$model->actualizarEmpleado();
	}


	public function inhabilitar(){

		$empleado=new Empleado($_REQUEST['documento']);
			var_dump($empleado); 
		$empleado->inhabilitarEmpleado();
	}

	
}

$controlador = new controladorEmpleado;




if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'registrar';
	header('Location: ../view/gestionEmpleado.php');

}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'actualizar';
	header('Location: ../view/gestionEmpleado.php');
}
elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
	$funcion = 'inhabilitar';
    header('Location: ../view/gestionEmpleado.php');
	
}
if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
}










?>