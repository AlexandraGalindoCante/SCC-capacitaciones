<?php
include ('libreriaSCC.php');
# conectare la base de datos
    $con = conectar();
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
		$mysql=mysqli_query($con,"set names 'utf8'");
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM Empleado where visibilidad ='1'");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		
		$query = mysqli_query($con,"SELECT * FROM  cargarEmpleado asc LIMIT $offset,$per_page");

		if ($numrows>0){
			?>
		<table class="table table-bordered" id="tabla">
			  <thead>
			  	<tr>
			    <th>Documento</th>
			    <th>Nombre</th>
			    <th>Telefono</th>
			    <th>Correo</th>
			    <th>Nivel Escolaridad</th>
			    <th>Tipo contrato</th>
			    <th>Fecha Inicio laboral</th>
			    <th>Fecha Fin laboral</th>
			    <th>Área</th>
			    <th>Empresa</th>
			    <th>Número contrato</th>
			    <th>Acciones</th>
			    
			  </tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $row['documento'];?></td>
					<td><?php echo $row['nombreCompleto'];?></td>
					<td><?php echo $row['telefono'];?></td>
					<td><?php echo $row['correoElectronico'];?></td>
					<td><?php echo $row['nivelEscolar'];?></td>
					<td><?php echo $row['TipoContrato'];?></td>
					<td><?php echo $row['fechaInicioLaboral'];?></td>
					<td><?php echo $row['fechaTerminacionContrato'];?></td>
					<td><?php echo $row['area'];?></td>
					<td><?php echo $row['empresa'];?></td>
					<td><?php echo $row['numContrato'];?></td>
					<td>
						<button type="button" class="btn btn-tema" data-toggle="modal" data-target="#modificarEmpleado" data-documento="<?php echo $row['documento']?>" data-nombre="<?php echo $row['nombreCompleto']?>" data-telefono="<?php echo $row['telefono']?>"  data-correo="<?php echo $row['correoElectronico']?>" data-departamento="<?php echo $row['area']?>"  data-nivelEscolar="<?php echo $row['nivelEscolar']?>" data-tipoContrato="<?php echo $row['TipoContrato']?>" data-inicio="<?php echo $row['fechaInicioLaboral']?>" data-fin="<?php echo $row['fechaTerminacionContrato']?>" data-area="<?php echo $row['area']?>" data-empresa="<?php echo $row['empresa']?>"><i class='icon-pencil-case'></i> </button>
						<button type="button" class="btn btn-tema" data-toggle="modal" data-target="#eliminarEmpleado" data-id="<?php echo $row['documento']?>"  ><i class='glyphicon glyphicon-trash'></i> </button>
					</td>
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
	?>

	
		

