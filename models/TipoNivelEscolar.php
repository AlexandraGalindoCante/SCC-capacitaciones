<?php

class TipoNivelEscolar{

	private $idTipoNivelEscolar;
	private $nombre;


	public function TipoNivelEscolar(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}


	public function getId(){

		return $this->idTipoNivelEscolar;
	}


	public function _constructor1($idTipoNivelEscolar)
	{
		
	$this->idTipoNivelEscolar=$idTipoNivelEscolar;

	}

}

?>