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
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM cargarArea");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		
		$query = mysqli_query($con,"SELECT * FROM  cargarArea asc LIMIT $offset,$per_page");

		if ($numrows>0){
			?>
		<table class="table table-bordered" id="tabla">
			  <thead title="Area">
			  	<tr>
			    <th>Documento</th>
			    <th>Nombre</th>
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
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarEmpleado" data-documento="<?php echo $row['documento']?>" data-nombre="<?php echo $row['nombreCompleto']?>"><i class='icon-pencil-case'></i> </button>
					
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
		

