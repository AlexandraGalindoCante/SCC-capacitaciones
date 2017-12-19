<?php

include_once('Empleado.php');
include_once('Programacion.php');


class AsigEmpleado{

	private $idAsigEmpleado;
	private $idProgramacion;
	private $idEmpleado;

	public function AsigEmpleado(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}

	public function _constructor2($idProgramacion,$idEmpleado){
		$this->idProgramacion= new Programacion($idProgramacion);
		$this->idEmpleado=new Empleado($idEmpleado);
	}

	public function _constructor1($idAsigEmpleado){
	$this->idAsigEmpleado=$idAsigEmpleado;	
	
	}	
	public function _constructor3($idProgramacion,$idEmpleado,$idAsigEmpleado){
	$this->idProgramacion= new Programacion($idProgramacion);
	$this->idEmpleado=new Empleado($idEmpleado);
	$this->idAsigEmpleado=$idAsigEmpleado;	
	}

	public function getId(){

		return $this->idAsigEmpleado;
	}

	public function asignarEmpleado(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idProgramacion=$this->idProgramacion->getId()+0;
		$idEmpleado=$this->idEmpleado->getId()+0;
		$mysql->query("CALL crearAsigEmpleado('$idProgramacion','$idEmpleado')")
		or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}

	public function eliminarAsigEmpleado(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL elimAsigEmpleado('$this->idAsigEmpleado')")
		or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}


}




?>