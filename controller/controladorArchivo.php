<?php

include ("../models/Datos.php");
include ("../models/Archivo.php");


class controladorArchivo{

	private $model;

	public function registrar(){	
		session_start();
		$nombre = $_FILES['archivo']['name'];
		$nombre_tmp = $_FILES['archivo']['tmp_name'];
		$ruta = "../archivos/".$nombre;
		$tipo = $_FILES['archivo']['type'];
		$tamano = $_FILES['archivo']['size'];
		$limite = 500 * 1024;
		$id=$_REQUEST['idProg'];

	 
		if( $tipo =='application/pdf' && $tamano <= $limite ){
			$model = new Archivo($tipo,$tamano,$ruta,$id);
			$model->registrarArchivo();

			move_uploaded_file($nombre_tmp, "../archivos/".$nombre);
		}

		
	}

	public function inhabilitar(){

		$model = new Archivo($_REQUEST['id']);
		var_dump($model);
		$model->inhabilitar();
	}
}


$controlador = new controladorArchivo;
echo $_REQUEST['id'];

if(isset($_REQUEST['archivo'])){
	$funcion = 'registrar';
	header('Location: ../view/gestionCapacitacion.php');
}elseif(isset($_REQUEST['funcion']) && $_REQUEST['funcion']=="Eliminar"){
	$funcion = 'inhabilitar';
	header('Location: ../view/gestionCapacitacion.php');
}

if(method_exists($controlador, $funcion)){
	call_user_func(array($controlador, $funcion));
}


?>