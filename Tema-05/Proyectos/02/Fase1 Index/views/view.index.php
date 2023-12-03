<!DOCTYPE html>
<html lang="es">

<head>
	<?php include 'layouts/head.php' ?>
</head>

<body>
	<!-- Capa Principal -->
	<div class="container" style="padding: 1em 1em;">
		<?php include 'partials/header.php' ?>

		<?php include 'partials/menu.php'; ?>

		<legend>Tabla Alumnos</legend>
		<table class="table">
			<!-- Encabezado tabla -->
			<thead>
				<tr>
					<th>id</th>
					<th>Nombre completo</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Población</th>
					<th>DNI</th>
					<th class="text-end">Edad</th>
					<th class="text-end">Curso</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<!-- Cuerpo tabla -->
			<tbody>
				<?php foreach ($alumnos as $alumno) : ?>
					<!-- Se aplicará el mismo formato a cada campo de la tabla -->
					<tr>
						<!-- Campos por separado uds y precio alineados dcha, precio con moneda -->
						<td><?= $alumno['id'] ?></td>
						<td><?= $alumno['nombreCompleto'] ?></td>
						<td><?= $alumno['email'] ?></td>
						<td><?= $alumno['telefono'] ?></td>
						<td><?= $alumno['poblacion'] ?></td>
						<td><?= $alumno['dni'] ?></td>
						<td class="text-end"><?= $alumno['edad'] ?></td>
						<td class="text-end"><?= $alumno['curso'] ?></td>
						<td class="text-center">
							<a href="eliminar.php?id=<?= $alumno['id'] ?>" title="Eliminar"><i class="bi-trash-fill"></i></a>
							<a href="editar.php?id=<?= $alumno['id'] ?>" title="Editar"><i class="bi-pencil-fill"></i></a>
							<a href="mostrar.php?id=<?= $alumno['id'] ?>" title="Mostrar"><i class="bi-eye-fill"></i></a>
						</td>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<!-- Pie de la tabla -->
			<tfoot>
				<!-- La celda ocupará tantas columnas (colspan)
            como campos de cada registro haya (count($articulo)) -->
				<td colspan="<?=$alumnos->columnCount() + 1?>">Nº alumnos:
					<?= $alumnos->rowCount() ?>
				</td>
			</tfoot>
		</table>
		<br>
		<br>
		<br>

	</div>

	<!-- Pie del documento -->
	<?php include 'partials/footer.php' ?>

	<!-- Bootstrap Javascript y popper -->
	<?php include 'layouts/javascript.php' ?>
</body>

</html>