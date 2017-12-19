<?php
include("../models/Datos.php");
include("../models/AsigEmpleado.php");


class controladorAsignarEmpleado{


	private $model;


	public function crear(){
		$model = new AsigEmpleado($_REQUEST['idProgramacion'],$_REQUEST['idEmpleado']);
		var_dump($model);
		$model->asignarEmpleado();

		$mensaje = "El empleado Ya Existe";

		header("Location: ../view/asignarEmpleados.php");
		
	}

	
	public function eliminar(){
		$model = new AsigEmpleado($_REQUEST['idAsigEmpleado']);
		var_dump($model);
		$model->eliminarAsigEmpleado();
		header('Location: ../view/consultarEmpleados.php');
	}

	
}


$controlador = new controladorAsignarEmpleado;
$funcion = null;
echo $_REQUEST['idAsigEmpleado'];
if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'crear';

}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'eliminar';

}
if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
}



?>