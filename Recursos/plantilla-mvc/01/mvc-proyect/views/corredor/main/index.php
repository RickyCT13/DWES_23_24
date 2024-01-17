<!doctype html>
<html lang="es">

<!-- head -->
<head>
	<?php require_once("template/partials/head.php")?>
	<title><?=$this->title?></title>
<head>


<body>
	<!-- Menú Principal -->
	<?php require_once("template/partials/menu.php")?>
	<br><br><br>

	<!-- Page Content -->
	<div class="container">
		<!-- cabecera  -->
		<?php require_once("views/corredor/partials/header.php")?>

		<!-- notificacion -->
		<?php require_once("template/partials/notify.php")?>

		<!-- errores -->
		<?php require_once("template/partials/error.php")?>



		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de corredores
			</div>
			<div class="card-header">
				<!-- menu corredores -->
				<?php require_once("views/corredor/partials/menu.php")?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<!-- personalizado -->
							<th>Id</th>
							<th>corredor</th>
							<th class="text-end">Edad</th>
							<th>DNI</th>
							<th>Población</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>

						<!-- Objeto clase pdostatement en foreach -->
						<?php foreach ($this->corredores as $corredor):?>
							<tr>
								<!-- Formatos distintos para cada  columna -->

								<!-- Detalles de corredores -->
								<td>
									<?=$corredor->id?>
								</td>
								<td>
									<?=$corredor->corredor?>
								</td>
								<td class="text-end">
									<?=$corredor->edad?>
								</td>
								<td>
									<?=$corredor->dni?>
								</td>
								<td>
									<?=$corredor->poblacion?>
								</td>
								<td>
									<?=$corredor->email?>
								</td>
								<td>
									<?=$corredor->telefono?>
								</td>
								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?=URL?>corredor/delete/<?=$corredor->id?>" title="Eliminar" onclick="return confirm('Confirmar eliminación del corredor')">
										<i class="bi bi-trash-fill"></i></a>

									<!-- botón  editar -->
									<a href="<?=URL?>corredor/edit/<?=$corredor->id?>" title="Editar">
										<i class="bi bi-pencil-square"></i></a>

									<!-- botón  mostrar -->
									<a href="<?=URL?>corredor/show/<?=$corredor->id?>?>" title="Mostrar">
										<i class="bi bi-card-text"></i></a>

								</td>
							</tr>

						<?php endforeach;?>


					</tbody>
					
				</table>

			</div>
			<div class="card-footer">
				<small class="text-muted"> Nº corredores: 
					<?=$this->corredores->rowCount();?>
				</small>
			</div>
		</div>
	</div>
	<br><br><br>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php")?>
	<?php require_once("template/partials/javascript.php")?>

</body>

</html>