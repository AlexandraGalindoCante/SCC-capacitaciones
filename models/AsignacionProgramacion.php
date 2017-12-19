<?php

include_once('Empleado.php');
include_once('Programacion.php');
include_once('Modulo.php');


class AsignacionProgramacion{

	private $idAsigEmpleado;
	private $idAsigModulo;
	private $idModulo;
	private $idCapacitador;
	private $idProgramacion;
	private $idEmpleado;

	public function AsignacionProgramacion(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}

	public function _constructor5($idModulo,$idEmpleado,$idProgramacion,$idCapacitador){
		$this->idProgramacion= new Programacion($idProgramacion);
		$this->idEmpleado=new Empleado($idEmpleado);
		$this->idModulo=new Modulo($idModulo);
		

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

		public function asignarProgramacion(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idModulo=$this->idModulo->getId()+0;
		$idProgramacion=$this->idProgramacion->getId()+0;
		$idCapacitador=$this->idCapacitador->getId()+0;
		$idEmpleado=$this->idEmpleado->getId()+0;
		$mysql->query("CALL crearAsignacionProgramacion('$idCapacitador','$idProgramacion','$idModulo',$idEmpleado)")
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