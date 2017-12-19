<?php

include('Tema.php');
include('Modulo.php');

class AsigTema(){

	private $idAsigTema;
	private $idModulo;
	private $idTema;





	public function AsigTema(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}

	public function _constructor2($idModulo,$idTema){
		$this->idModulo=new Modulo($idModulo);
		$this->idTema=new  Tema($idTema);
	}	

	public function getId(){

		return $this->idAsigTema;
	}



}




?>