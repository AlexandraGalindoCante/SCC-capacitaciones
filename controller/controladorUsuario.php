<?php
include("../models/Datos.php");
include("../models/Usuario.php");



class controladorUsuario{
	


	private $model;


	public function login(){

		session_start();
		include_once("../models/Rol.php");
		echo $_REQUEST['documento']."-".$_REQUEST['contrasena']."<BR>";
		$this->model = new Usuario($_REQUEST['documento'],$_REQUEST['contrasena']);
		var_dump(model);
		$rol= new Rol;
		if ($this->model->logueo()){
			switch ($_SESSION['idRol']) {
				case $rol->consultarId('Usuario'):
					header('Location:../view/inicio.php');
					
					break;
				case $rol->consultarId('Administrador'):
					header('Location:../view/inicio.php');
					break;
			
				default:
				
					header('Location: ../index.php');
					break;
				}
			}

	else{
			
			header('Location: ../index.php');

		}
	}


	public function crear(){
		$model = new Usuario($_REQUEST['documento'],$_REQUEST['nombreUsuario'],$_REQUEST['contrasena'],$_REQUEST['idRol']);
		$model->registrarUsuario();
	
	}

	public function actualizar(){
		$model = new Usuario($_REQUEST['documento'],$_REQUEST['nombre'],$_REQUEST['contrasena'],$_REQUEST['rol']);
		var_dump($model);
		$model->actualizarUsuario();
	
	}

	public function inhabilitar(){
		$model = new Usuario($_REQUEST['idUsuario']);
		var_dump($model);
		$model->inhabilitarUsuario();
	}

	public function recuperarContrasena(){
		$model = new Usuario;
		$model->setUser($_REQUEST['documento']);
		$model->recuperarContrasena();
		header('Location: ../login.php');
	}
	public function cambiarContrasena(){
		$model = new Usuario;
		$model->setContrasena($_REQUEST['passAnterior']);
		

		if($model->validarContrasena()){
			$model->setContrasena($_REQUEST['passNueva']);
			var_dump($model);
			$model->cambiarContrasena();
		
			var_dump($model);
		}
	}

}



$controlador = new controladorUsuario;


if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
	$funcion = 'actualizar';
		header('Location:../view/gestionUsuario.php');
}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'login';
		

}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'crear';
	header('Location:../view/gestionUsuario.php');
}elseif(isset($_REQUEST['funcion']) &&  ($_REQUEST['funcion'])==4){
	$funcion = 'inhabilitar';
		header('Location:../view/gestionUsuario.php');
}
elseif(isset($_REQUEST['funcion']) &&  ($_REQUEST['funcion'])==5){
	$funcion = 'cambiarContrasena';
	
		header('Location:../view/gestionUsuario.php');
}



if(method_exists($controlador, $funcion)){
	call_user_func(array($controlador, $funcion));
}


?>