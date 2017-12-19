
<?php


class Contrato(){
	


private $idContrato;
private $numContrato;
private $fechaInicioLaboral;
private $fechaTerminacionContrato;
private $tipoContrato;
private $empresa;



	public function Contrato(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}


	public function _constructor5($numContrato,$fechaInicioLaboral,$fechaTerminacionContrato,$tipoContrato,$empresa){
		$this->numContrato=$numContrato;
		$this->fechaInicioLaboral=$fechaInicioLaboral;
		$this->fechaTerminacionContrato=$fechaTerminacionContrato;
		$this->tipoContrato= new TipoContrato($idContrato);
		$this->empresa=$empresa;

	}


	public function _constructor6($idContrato,$numContrato,$fechaInicioLaboral,$fechaTerminacionContrato,$tipoContrato,$empresa){
		$this->idContrato=$idContrato;
		$this->numContrato=$numContrato;
		$this->fechaInicioLaboral=$fechaInicioLaboral;
		$this->fechaTerminacionContrato=$fechaTerminacionContrato;
		$this->tipoContrato= new TipoContrato($idContrato);
		$this->empresa=$empresa;

	}

	public function getId(){
		return $this->idContrato;
	}





/*FALTA LOS PROCEDIMIENTOS PARA CRUD*/







}