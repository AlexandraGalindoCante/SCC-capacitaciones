<?php
	
	if(isset($_REQUEST['funcion'])){
			session_start();
		switch ($_REQUEST['funcion']) {
			case 1:
			echo $_SESSION['idProgramacion'];
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				$_SESSION['tpCap'] = $_REQUEST['tpCap'];
				$_SESSION['fechaIn'] = $_REQUEST['fechaIn'];
				$_SESSION['hora'] = $_REQUEST['hora'];
				header('Location: ../view/consultarEmpleados.php');
				break;
			case 2:
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				header('Location: ../view/asignarEmpleados.php');
				break;
			case 3:
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				header('Location: ../view/consultarEmpleados.php');
				break;
			case 4:
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				header('Location: ../view/gestionEvaluacion.php');

				break;
				
			default:
				
				break;
		}
	}
	else {
		$_SESSION['idProgramacion'] = $_REQUEST['idProg'];
	}




	
?>