<?php


class Tema{

	private $idTema;
	private $nombre;
	private $descripcion;




	public function Tema(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}
		public function _constructor1($idTema){
		$this->idTema=$idTema;
		
	}

	public function _constructor2($nombre,$descripcion){
		$this->nombre=$nombre;
		$this->descripcion=$descripcion;
	}
	public function _constructor3($idTema,$nombre,$descripcion){
		$this->idTema=$idTema;
		$this->nombre=$nombre;
		$this->descripcion;
	}


	public function getId(){
		return $this->idTema;


	}
	public function nuevoTema(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL crearTema('$this->nombre','$this->descripcion')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}
	
public function modificarTema(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL modificarTema('$this->idTema','$this->nombre','$this->descripcion')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

	public function inhabilitarTema(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL eliminarTema('$this->idTema')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}









}
?>