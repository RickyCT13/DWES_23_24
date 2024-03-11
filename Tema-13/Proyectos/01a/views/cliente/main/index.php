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
		<?php require_once("views/cliente/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Clientes
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/cliente/partials/menu.php") ?>
				<!-- Modal -->
				<?php require_once("views/cliente/partials/modal.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Ciudad</th>
							<th>DNI</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php foreach ($this->clientes as $cliente) : ?>
							<tr>
								<!-- Mostrar datos de clientes -->
								<td><?= $cliente->id ?></td>
								<td><?= $cliente->nombre ?></td>
								<td><?= $cliente->apellidos ?></td>
								<td><?= $cliente->email ?></td>
								<td><?= $cliente->telefono ?></td>
								<td><?= $cliente->ciudad ?></td>
                                <td><?= $cliente->dni ?></td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>cliente/delete/<?= $cliente->id ?>" title="Eliminar" onclick="return confirm('Confimar elimación del cliente')" Class="btn btn-danger
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cliente']['delete'])) ?
												'disabled' : null ?>">
										<i class="bi bi-trash"></i>
									</a>

									<!-- botón  editar -->
									<a href="<?= URL ?>cliente/edit/<?= $cliente->id ?>" title="Editar" class="btn btn-primary
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cliente']['edit'])) ?
												'disabled' : null ?>">
										<i class="bi bi-pencil"></i>
									</a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>cliente/show/<?= $cliente->id ?> ?>" title="Mostrar" class="btn btn-warning
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['cliente']['show'])) ?
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
					<td colspan="9">Nº Clientes: <?= $this->clientes->rowCount() ?></td>
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