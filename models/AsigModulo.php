<?php

include_once('Modulo.php');
include_once('Capacitador.php');
include_once('Programacion.php');


class AsigModulo{

	private $idAsigModulo;
	private $idProgramacion;
	private $idModulo;
	private $idCapacitador;
	private $resultCapacitador;

	public function AsigModulo(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}

	public function _constructor1($idAsigModulo){
		$this->idAsigModulo = $idAsigModulo;
	}	

	public function _constructor3($idProgramacion,$idModulo,$idCapacitador){
		$this->idCapacitador= new Capacitador($idCapacitador);
		$this->idProgramacion=new Programacion($idProgramacion);
		$this->idModulo= new Modulo($idModulo);
	
	}	

	public function _constructor5($idAsigModulo,$idProgramacion,$idModulo,$idCapacitador){
	$this->idAsigModulo=$idAsigModulo;	
	$this->idCapacitador= new Capacitador($idCapacitador);
	$this->idProgramacion=new Programacion($idProgramacion);
	$this->idModulo=new  Modulo($idModulo);
	
	}	
	public function _constructor2($idAsigModulo,$resultCapacitador){
	$this->idAsigModulo=$idAsigModulo;
	$this->resultCapacitador=$resultCapacitador;
	}

	public function getId(){

		return $this->idAsigModulo;
	}

	public function asignarModulo(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idModulo=$this->idModulo->getId()+0;
		$idProgramacion=$this->idProgramacion->getId()+0;
		$idCapacitador=$this->idCapacitador->getId()+0;
		$mysql->query("CALL crearasignacionModulo('$idCapacitador','$idProgramacion','$idModulo')")
		or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}
		public function modificarAsigMod(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idModulo=$this->Modulo->getId()+0;
		$idProgramacion=$this->Programacion->getId()+0;
		$idCapacitador=$this->Capacitador->getId()+0;
		$mysql->query("CALL modificarAsigModulo('$idModulo','$idAsigModulo',$idCapacitador','$idProgramacion)")
		or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}
	public function eliminarAsigModulo(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL eliminarAsigModulo('$idAsigModulo')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}


	public function calificarCapacitador(){
		$datos=new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL califCapacitador($idAsigModulo,'$resultCapacitador')")
		or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}


}




?>