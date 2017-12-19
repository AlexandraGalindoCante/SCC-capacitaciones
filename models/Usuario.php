<?php
include_once('Rol.php');



class Usuario {
	private $documento;
	private $nombreUsuario;
	private $contrasena;
	private $rol;


	public function Usuario(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
		}
	}


	public function setDocumento($documento){
		$this->documento= $documento;
	}

	public function setNombreUsuario($nombre){
		$this->nombreUsuario = $nombre;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}


	public function getId(){
		return $this->documento;
	}

	public function getContrasena(){
		return $this->contrasena;
	}
	
	public function _constructor1($documento){
		$this->documento=$documento;
	}
	public function _constructor2($documento,$contrasena){
		$this->documento=$documento;
		$this->contrasena=$contrasena;

	}
	

	public function _constructor4($documento,$nombreUsuario,$contrasena,$idRol){
		$this->documento=$documento;
		$this->nombreUsuario=$nombreUsuario;
		$this->contrasena=$contrasena;
		$this->rol= new Rol($idRol);

	}
	public function logueo(){
			$datos = new Datos();
			$mysql = $datos->conectar();	
			$login=mysqli_query($mysql,"CALL login('$this->documento')");
			$mysql = $datos->Desconectar($mysql);
			while ($vectorLogin=mysqli_fetch_array($login)){
				if($this->contrasena == $vectorLogin['contrasena']){
					$_SESSION['sesion']=1;
					$_SESSION['documentoUser']=$vectorLogin['numeroDocumento'];
					$_SESSION['nombreUsuario'] = $vectorLogin['nombreUsuario'];
					$_SESSION['idRol'] = $vectorLogin['idRol'];
					$_SESSION['rol'] = $vectorLogin['rol'];

					return true;
				}
				else {
					
					return false;
				}
			}	
	}




	public function registrarUsuario(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$idRol = $this->rol->getId();
		$mysql->query("CALL registrarUsuario('$this->documento','$this->nombreUsuario','$this->contrasena','$idRol')") or die($mysql->error);;
		$mysql = $datos->Desconectar($mysql);
	}
		public function actualizarUsuario(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$idRol = $this->rol->getId();
		$mysql->query("CALL actualizarUsuario('$this->documento','$this->nombreUsuario','$this->contrasena','$idRol')") or die($mysql->error);;
		$mysql = $datos->Desconectar($mysql);
	}
	public function inhabilitarUsuario(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL  eliminarUsuario('$this->documento')") or die($mysql->error);;
		$mysql = $datos->Desconectar($mysql);
	}






	public function validarContrasena(){
		session_start();
		$datos = new Datos();
		$mysql = $datos->conectar();	
		$idEmpleado = $_SESSION['documentoUser'];	
		$consulta=$mysql->query("CALL buscarUsuario('$idEmpleado')");
		
		$mysql = $datos->Desconectar($mysql);
		if($vector=mysqli_fetch_array($consulta)) {
			if($this->contrasena==$vector['contrasena']){
				$this->setDocumento($vector['numeroDocumento']);
				return True;
			}
			else {
				return false;
			}
		}
		else{
			return False;
		}
	}



	public function cambiarContrasena(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$enc_contrasena = password_hash($this->contrasena, PASSWORD_DEFAULT);
		$mysql->query("CALL cambiarContrasena('$this->documento', '$enc_contrasena')");
		$mysql = $datos->Desconectar($mysql);
	}








}




?>