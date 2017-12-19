<?php
include_once("TipoNivelEscolar.php");
include_once("TipoContrato.php");
include_once("Departamento.php");



class Empleado {


	private $documento;
	private $nombreCompleto;
	private $telefono;
	private $correoElectronico;
	private $idTipoNivelEscolar;
	private $idTipoContrato;
	private $fechaInicioLaboral;
	private $fechaTerminacionContrato;
	private $idDepartamento;
	private $empresa;
	private $numContrato;




	public function Empleado(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}

	public function getId(){
		return $this->documento;
	}
	public function _constructor1($documento){
		$this->documento=$documento;
	}


	public function _constructor11($documento,$nombreCompleto,$telefono,$correoElectronico,$idTipoNivelEscolar,$idTipoContrato,$fechaInicioLaboral,$fechaTerminacionContrato,$idDepartamento,$empresa,
		$numContrato){
		$this->documento=$documento;
		$this->nombreCompleto=$nombreCompleto;
		$this->telefono=$telefono;
		$this->correoElectronico=$correoElectronico;
		$this->TipoNivelEscolar=new TipoNivelEscolar($idTipoNivelEscolar);
		$this->TipoContrato=new TipoContrato($idTipoContrato);
		$this->fechaInicioLaboral=$fechaInicioLaboral;
		$this->fechaTerminacionContrato=$fechaTerminacionContrato;
		$this->Departamento=new Departamento($idDepartamento);
		$this->empresa= $empresa;
		$this->numContrato=$numContrato;
		
	}


	public function registrarEmpleado(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$idTipoNivelEscolar = $this->TipoNivelEscolar->getId()+0;
		$idTipoContrato = $this->TipoContrato->getId() + 0;
		$idDepartamento = $this->Departamento->getId()+0;

		$mysql->query("CALL registrarEmpleado('$this->documento','$this->nombreCompleto','$this->telefono','$this->correoElectronico','$idTipoNivelEscolar','$idTipoContrato','$this->fechaInicioLaboral','$this->fechaTerminacionContrato','$idDepartamento','$this->empresa','$this->numContrato')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}

	public function actualizarEmpleado(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$idTipoNivelEscolar = $this->TipoNivelEscolar->getId()+0;
		$idTipoContrato = $this->TipoContrato->getId()+0;
		$idDepartamento = $this->Departamento->getId()+0;
		$mysql->query("CALL actualizarEmpleado('$this->documento','$this->nombreCompleto','$this->telefono','$this->correoElectronico','$idDepartamento','$idTipoNivelEscolar','$idTipoContrato','$this->fechaInicioLaboral','$this->fechaTerminacionContrato','$this->empresa','$this->numContrato')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}



	public function inhabilitarEmpleado(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL inhabilitarEmpleado('$this->documento')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	
	}
	


	





}

