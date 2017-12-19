<?php

class Capacitador{

	
	private $nombre;
	private $documento;




	public function Capacitador(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}



	public function _constructor1($documento){
		$this->documento=$documento;
	}

	public function _constructor2($nombre,$documento){
		$this->documento=$documento;
		$this->nombre=$nombre;
	}


	
	public function getId(){

		return $this->documento;
	}

	public function registrarCapacitador(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL crearCapacitador('$this->documento','$this->nombre')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}
	
public function modificarCapacitador(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL modificarCapacitador('$this->nombre','$this->documento')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

	public function inhabilitarCapacitador(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL eliminarCapacitador('$this->documento')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

}


?>