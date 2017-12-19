<?php


class TipoContrato{

	private $idTipoContrato;
	private $nombre;


	public function TipoContrato(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}
	
	public function getId(){

		return $this->idTipoContrato;
	}

	public function _constructor1($idTipoContrato)
	{
	$this->idTipoContrato=$idTipoContrato;

	}

}

?>