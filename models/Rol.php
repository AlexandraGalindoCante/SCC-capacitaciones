<?php


class Rol{

	private $idRol;
	private $rol;



	public function Rol(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}


	public function _constructor1($idRol){
		$this->idRol=$idRol;
	}
	public function setRol ($rol){
		$this->rol = $rol;
	}
	public function getId(){
		return $this->idRol;
	}
	
	
	public function consultarId($rol){
		$this->setRol($rol);
		$datos = new Datos();
		$mysql = $datos->conectar();		
		$consulta=$mysql->query("CALL consultarRol('$this->rol')");
		$mysql = $datos->Desconectar($mysql);
		$vector=mysqli_fetch_array($consulta);
		$this->idRol = $vector['idRol'];
		return $this->idRol;
	}


}


?>