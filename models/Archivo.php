<?php 

include('Programacion.php');

class Archivo{
	
	private $idArchivo;
	private $tipoArchivo;
	private $tamano;
	private $ruta;
	private $idProgramacion;

	
	public function Archivo(){
		$parametros = func_get_args();//toma todos los parametros que ele envian y los guarda en un vector
		$cantidad = func_num_args();//cuenta cant de parametrs enviados
		$funcionConstructor = '_constructor'.$cantidad;//crea un string que va a tener el nombre del metodo + cantidad de parametros
		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}

	public function _constructor1($id){
		$this->idArchivo=$id;
	}

	public function _constructor4($tipoArchivo, $tamano, $ruta, $idProgramacion){	
		$this->tipoArchivo = $tipoArchivo;
		$this->tamano = $tamano;
		$this->ruta = $ruta;
		$this->idProgramacion =new Programacion($idProgramacion);
	}

	public function registrarArchivo(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$id =$this->idProgramacion->getId();
		$mysql->query("CALL registrarArchivo('$this->tipoArchivo','$this->tamano','$this->ruta','$id')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

	public function inhabilitar(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL inhabilitarArchivo('$this->idArchivo')");
		$mysql = $datos->Desconectar($mysql);
	}

}

?>