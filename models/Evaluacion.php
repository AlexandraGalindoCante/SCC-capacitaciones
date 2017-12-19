<?php

include_once('AsigEmpleado.php');
include_once('AsigModulo.php');

class Evaluacion{

	private $idEvaluacion;
	private $estado;
	private $calificacion;
	private $idEmpleado;
	private $idModulo;
	private $observaciones;




		public function Evaluacion(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

			if (method_exists($this, $funcionConstructor))
			{
				call_user_func_array(array($this,$funcionConstructor), $parametros);
			}
		}

		public function geId(){

			return $this->idEvaluacion;
		}

		public function _constructor5($estado,$calificacion,$observaciones,$idEmpleado,$idModulo){
		
		$this->estado= $estado;
		$this->calificacion=$calificacion;
		$this->observaciones = $observaciones;
		$this->idEmpleado=new AsigEmpleado($idEmpleado);
		$this->idModulo=new AsigModulo($idModulo);
	}

		public function _constructor6($idEvaluacion,$estado,$calificacion,$idEmpleado,$idModulo){
		$this->idEvaluacion = $idEvaluacion;
		$this->estado= $estado;
		$this->calificacion=$calificacion;
		$this->idEmpleado=new AsigEmpleado($idEmpleado);
		$this->idModulo=new AsigModulo($idModulo);
	}

	public function registrarEvaluacion(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idModulo=$this->idModulo->getId()+0;
		$idEmpleado=$this->idEmpleado->getId()+0;
		$mysql->query("CALL registrarEvaluacion(
		'$this->estado','$this->observaciones','$this->calificacion','$idEmpleado',
		'$idModulo')")or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}

	public function actualizarEvaluacion(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$idModulo=$this->idModulo->getId()+0;
		$idEmpleado=$this->idEmpleado->getId()+0;
		$mysql->query("CALL actualizarEvaluacion(
		'$this->estado','$this->observaciones','$this->calificacion','$idEmpleado',
		'$idModulo')")or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}
}
?>