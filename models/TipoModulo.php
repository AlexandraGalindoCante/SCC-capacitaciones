<?php


class TipoModulo{

private $idTipoModulo;
private $nombre;


	public function Lista(){
		$mysql=conectar();
		$registro=$mysql->query("SELECT idTipoModulo,nombre FROM TipoModulo") or die($mysql->error);
		$mysql->close();
	return $registro->fetch_array();

	}


	public function getId(){
		return $this->idTipoModulo;
	}

}
?>