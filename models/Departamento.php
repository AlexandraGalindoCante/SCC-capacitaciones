
<?php


class Departamento{

	private $idDepartamento;
	private $area;

	public function Departamento(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}

	public function getId(){
		return $this->idDepartamento;
	}


	public function _constructor1($idDepartamento)
	{
	$this->idDepartamento=$idDepartamento;

	}

	



}
?>