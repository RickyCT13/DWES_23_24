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
		<?php require_once("views/cuenta/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Cuentas
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/cuenta/partials/menu.php") ?>
				<!-- Modal -->
				<?php require("views/cuenta/partials/modal.php")?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>Id</th>
							<th>Número Cuenta</th>
							<th>Nombre Cliente</th>
							<th>Apellidos Cliente</th>
							<th>Fecha Alta</th>
							<th>Fecha Últ Movimiento</th>
							<th>Número Movimientos</th>
							<th>Saldo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php foreach ($this->cuenta as $cuenta) : ?>
							<tr>
								<!-- Mostrar datos de cuentas -->
								<td><?= $cuenta->id ?></td>
								<td><?= $cuenta->num_cuenta ?></td>
								<td><?= $cuenta->nombreCuenta ?></td>
								<td><?= $cuenta->apellidosCuenta ?></td>
								<td><?= $cuenta->fecha_alta ?></td>
								<td><?= $cuenta->fecha_ul_mov ?></td>
								<td><?= $cuenta->num_movtos ?></td>
								<td><?= $cuenta->saldo ?></td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>cuenta/delete/<?= $cuenta->id ?>" title="Eliminar" onclick="return confirm('Confimar elimación del cuenta')" Class="btn btn-danger
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['delete'])) ?
												'disabled' : null ?>">
										<i class="bi bi-trash"></i>
									</a>

									<!-- botón  editar -->
									<a href="<?= URL ?>cuenta/edit/<?= $cuenta->id ?>" title="Editar" class="btn btn-primary
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['edit'])) ?
												'disabled' : null ?>">
										<i class="bi bi-pencil"></i>
									</a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>cuenta/show/<?= $cuenta->id ?> ?>" title="Mostrar" class="btn btn-warning
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['show'])) ?
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
					<td colspan="10">Nº Cuentas: <?= $this->cuenta->rowCount() ?></td>
				</small>
			</div>
		</div>
	</div>
	<br><br><br><br><br>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>