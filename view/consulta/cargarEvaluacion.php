<?php

include ("libreriaSCC.php");
session_start();

	# conectare la base de datos
$con = conectar();
if(!$con){
	die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){

		//$page = $_REQUEST['page'];
	$idProgramacion = $_SESSION['idProgramacion'];
	$idModulo = $_REQUEST['modulo'];
	$_SESSION['moduloEvaluacion'] = $idModulo;



	

	$count_query   = mysqli_query($con,"SELECT COUNT(*) AS numrows FROM
		empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
		INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
		INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
		LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
		WHERE pr.idProgramacion = $idProgramacion AND am.idModulo = $idModulo AND (ev.visibilidad IS NULL OR ev.visibilidad = 1);
		");


	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

	$reload = 'gestionEmpleados.php';
			//consulta principal para recuperar los datos
	$query = mysqli_query($con,"SELECT e.nombreCompleto,e.documento, ae.idAsigEmpleado, am.idAsigModulo,
		ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad FROM
		empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
		INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
		INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
		LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
		WHERE pr.idProgramacion = $idProgramacion AND am.idModulo = $idModulo AND (ev.visibilidad IS NULL OR ev.visibilidad = 1)
		ORDER BY idAsigEmpleado asc;");

	$estado=mysqli_query($con,"SELECT count(*) as num FROM
		empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
		INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
		INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
		LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
		WHERE pr.idProgramacion =$idProgramacion   AND (ev.visibilidad IS NULL OR ev.visibilidad = 1) and calificacion is null");

	if ($rows= mysqli_fetch_array($estado)){$num = $rows['num'];}
	
	if ($num>=1) {

		mysqli_query($con,"UPDATE programacion SET estado='1' where idProgramacion=$idProgramacion");

	}elseif($num==0){
		mysqli_query($con,"UPDATE programacion SET estado='2' where idProgramacion=$idProgramacion");
	}

	if ($numrows>0){
		?>
		<button onclick="window.location.href='../inforEvaluacionGF.php'" class="btn btn-primary btn-md btn-align-right"><i class="fa fa-file-text" aria-hidden="true"></i> Listado de Evaluación GF</button>
		
		<button onclick="window.location.href='../inforEvaluacionCYCP.php'" class="btn btn-danger btn-md btn-align-left"><i class="fa fa-file-text" aria-hidden="true"></i> Listado de Evaluación CYCP</button>
		<br>
		<table class="table table-hover" id="tabla">
			<thead class="thead-inverse">
				<tr><th>#</th>
					<th>Documento</th>
					<th>Empleado</th>
					<th>Estado</th>
					<th>Observaciones</th>
					<th>Calificacion</th>
					<th>Guardar</th>

					
				</tr>
			</thead>
			<tbody>
				<?php
				$contador=1;
				while($row = mysqli_fetch_array($query)){
					?>
					<tr>

						<td><?php 
								echo $contador++;
							?>
							
						</td>
						<td><?php echo $row['documento'];?></td>
						<td><?php echo $row['nombreCompleto'];?></td>
						<td><?php if(is_null($row['estado'])){
							echo "Por evaluar";
							$funcion = 1;
						}else{
							echo $row['estado'];
							$funcion = 2;
						} ?></td>
						<td><?php echo $row['observaciones'];?></td>
						<td><?php echo $row['calificacion'];?></td>
						<?php
						switch ($funcion) {
							case 1:
							?>
							<td><button type="button" name="funcion" value="1" class="btn btn-primary btn-md" data-toggle="modal" data-target="#crearEvaluacion" data-estado="<?php echo $row['estado']?>" data-empleado="<?php echo $row['idAsigEmpleado']?>" data-modulo="<?php echo $row['idAsigModulo']?>" data-calificacion="<?php echo $row['calificacion']?>"><i class='fa fa-pencil-square-o'></i> &nbsp;</button></td>
							<?php
							break;
							case 2:
							?>
							<td><button type="button" name="funcion" value="1" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modificarEvaluacion" data-estado="<?php echo $row['estado']?>" data-obs="<?php echo $row['observaciones']?>" data-empleado="<?php echo $row['idAsigEmpleado']?>" data-modulo="<?php echo $row['idAsigModulo']?>" data-calificacion="<?php echo $row['calificacion']?>"><i class='fa fa-pencil-square-o'></i> &nbsp;</button></td>
							<?php
							break;
						}
						?>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>


		<?php

	} else {
		?>
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Aviso!!!</h4> No hay datos para mostrar
		</div>
		<?php
	}
}
?>
<script type='text/javascript'>
	function cargarTabla(){
		$('#tabla').DataTable({

			"pagingType": "numbers",
			"lengthChange": false,
			"pageLength" : 10,
			"language" : {
				"info": "Mostrando pagina _PAGES_ de _PAGES_",
				"zeroRecords": "No se encontro ningun registro",
				"search" : "Buscar: ",
				"paginate": {
					"next":       "Siguiente",
					"previous":   "Anterior"
				},
				"infoFiltered":   "(Filtrado de MAX registros totales)"
			}

		});

	}
</script>