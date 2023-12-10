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

		<legend>Tabla corredores</legend>
		<table class="table">
			<!-- Encabezado tabla -->
			<thead>
				<tr>
					<th>Id</th>
					<th>Apellidos, Nombre</th>
					<th>Ciudad</th>
					<th>Email</th>
					<th>Edad</th>
					<th>Categoría</th>
					<th>Club</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<!-- Cuerpo tabla -->
			<tbody>
				<?php foreach ($corredores as $corredor) : ?>
					<!-- Se aplicará el mismo formato a cada campo de la tabla -->
					<tr>
						<!-- Campos por separado uds y precio alineados dcha, precio con moneda -->
						<td><?= $corredor->id ?></td>
						<td><?= $corredor->nombreCorredor ?></td>
						<td><?= $corredor->ciudad ?></td>
						<td><?= $corredor->email ?></td>
						<td><?= $corredor->edad ?></td>
						<td><?= $corredor->categoria ?></td>
						<td><?= $corredor->club ?></td>
						<td class="text-center">
							<a href="eliminar.php?id=<?= $corredor->id ?>" title="Eliminar"><i class="bi-trash-fill"></i></a>
							<a href="editar.php?id=<?= $corredor->id ?>" title="Editar"><i class="bi-pencil-fill"></i></a>
							<a href="mostrar.php?id=<?= $corredor->id ?>" title="Mostrar"><i class="bi-eye-fill"></i></a>
						</td>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<!-- Pie de la tabla -->
			<tfoot>
				<!-- La celda ocupará tantas columnas (colspan)
            como campos de cada registro haya (count($articulo)) -->
				<td colspan="<?=$corredores->columnCount() + 1?>">Nº corredores:
					<?= $corredores->rowCount() ?>
				</td>
			</tfoot>
		</table>

		<?php $corredores = null; 
        	$db->cerrarConexion();
        ?>


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