<!doctype html>
<html lang="es">

<!-- Head -->

<head>
	<?php require_once("template/partials/head.php") ?>
	<title><?= $this->title ?></title>
</head>

<body>
	<!-- Menú Proyecto -->
	<?php require_once("template/partials/menuAut.php") ?>
	<br><br><br>
	<!-- Page Content -->
	<div class="container">

		<!-- Cabecera -->
		<?php require_once("views/movimiento/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Movimientos
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/movimiento/partials/menu.php") ?>
				<!-- Modal -->
				<!-- <?php //require_once("views/movimiento/partials/modal.php") 
						?> -->
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>Id</th>
							<th>Cuenta</th>
							<th>Fecha y Hora</th>
							<th>Concepto</th>
							<th>Tipo</th>
							<th class="text-end">Cantidad</th>
							<th class="text-end">Saldo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php foreach ($this->movimientos as $movimiento) : ?>
							<tr>
								<!-- Mostrar datos de movimientos -->
								<td><?= $movimiento->id ?></td>
								<td><?= $movimiento->cuenta ?></td>
								<td><?= $movimiento->fecha_hora ?></td>
								<td><?= $movimiento->concepto ?></td>
								<td><?= $movimiento->tipo ?></td>
								<td class="text-end"><?= number_format($movimiento->cantidad, 0, ',', '.') ?></td>
								<td class="text-end"><?= number_format($movimiento->saldo, 2, ',', '.') ?> €</td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>movimiento/delete/<?= $movimiento->id ?>" title="Eliminar" onclick="return confirm('Confimar elimación del movimiento')" Class="btn btn-danger
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['delete'])) ?
												'disabled' : null ?>">
										<i class="bi bi-trash"></i>
									</a>

									<!-- botón  editar -->
									<a href="<?= URL ?>movimiento/edit/<?= $movimiento->id ?>" title="Editar" class="btn btn-primary
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['edit'])) ?
												'disabled' : null ?>">
										<i class="bi bi-pencil"></i>
									</a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>movimiento/mostrar/<?= $movimiento->id ?>" title="Mostrar" class="btn btn-warning
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['show'])) ?
												'disabled' : null ?>">
										<i class="bi bi-card-text"></i>
									</a>
								</td>

							</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">
					<td colspan="9">Nº Movimientos: <?= $this->movimientos->rowCount() ?></td>
				</small>
			</div>
		</div>
	</div>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>