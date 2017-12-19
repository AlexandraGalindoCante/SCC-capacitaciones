<?php




class Programacion{


	private $idProgramacion;
	private $fechaInicio;
	private $fechaFin;
	private $hora;
	private $tpCapacitacion;
	private $modalidad;
	private $nivel;
	private $visibilidad;
	private $color;
	private $titulo;



	public function Programacion(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}
	public function getId(){
		return $this->idProgramacion;
	}

	public function _constructor1($idProgramacion)
	{
		$this->idProgramacion=$idProgramacion;
			}


	public function _constructor7($idProgramacion,$titulo,$fechaInicio,$hora,$tpCapacitacion,$modalidad,$nivel){
		$this->idProgramacion=$idProgramacion;
		$this->titulo=$titulo;
		$this->fechaInicio=$fechaInicio;
		$this->hora=$hora;
		$this->tpCapacitacion=$tpCapacitacion;
		$this->modalidad=$modalidad;
		$this->nivel=$nivel;
	
		

	}
	public function _constructor8($titulo,$fechaInicio,$fechaFin,$hora,$tpCapacitacion,$modalidad,$nivel,$color){
		$this->titulo=$titulo;
		$this->fechaInicio=$fechaInicio;
		$this->fechaFin=$fechaFin;
		$this->hora=$hora;
		$this->tpCapacitacion=$tpCapacitacion;
		$this->modalidad=$modalidad;
		$this->nivel=$nivel;
		$this->color=$color;			

	}

	public function crearProgramacion(){
		$datos= new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL crearProgramacion('$this->titulo','$this->fechaInicio','$this->fechaInicio','$this->tpCapacitacion','$this->modalidad','$this->nivel','$this->color','$this->hora')")or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}
	
	public function modificarProgramacion(){

		$datos= new Datos();
			$mysql = $datos->conectar();
			$mysql->query("CALL actualizarProgramacion('$this->idProgramacion','$this->titulo','$this->fechaInicio','$this->fechaInicio','$this->tpCapacitacion','$this->modalidad','$this->nivel','$this->hora')")or die($mysql->error);
			$mysql = $datos->Desconectar($mysql);
	}


	public function inhabilitarProgramacion(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL inhabilitarProgramacion('$this->idProgramacion')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	
	}


}


?>