<!DOCTYPE html>
<html lang="es">

<head>
  <?php include 'layouts/head.html'?>
</head>

<body>
  <!-- Capa Principal -->
  <div class="container">
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-pc-display"></i>
      <span class="fs-3">Proyecto 3.2: CRUD - Tabla Artículos</span>
    </header>

    <?php include 'partials/menu.php'; ?>

    <legend>Tabla Artículos</legend>
    <table class="table">
      <!-- Encabezado tabla -->
      <thead>
        <tr>
          <?php foreach(array_keys($articulos[0]) as $campo) : ?>
            <th><?= ucfirst($campo)?></th>
          <?php endforeach; ?>
          <th>Acciones</th>
        </tr>
      </thead>
      <!-- Cuerpo tabla -->
      <tbody>
        <?php foreach ($articulos as $articulo): ?>
          <!-- Se aplicará el mismo formato a cada campo de la tabla -->
          <tr>
            <?php foreach ($articulo as $campo): ?>
              <td>
                <?= $campo ?>
              </td>
            <?php endforeach; ?>
            <td>
              <a href="eliminar.php?id=<?= $articulo['id'] ?>"><i class="bi-trash-fill"></i></a>
              <a href="editar.php?id=<?= $articulo['id'] ?>"><i class="bi-pencil-fill"></i></a>
              <a href="mostrar.php?id=<?= $articulo['id'] ?>"><i class="bi-eye-fill"></i></a>
            </td>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <!-- Pie de la tabla -->
      <tfoot>
        <!-- La celda ocupará tantas columnas (colspan)
            como campos de cada registro haya (count($articulo)) -->
        <td colspan="<?= count($articulo) + 1?>">Nº articulos:
          <?= count($articulos) ?>
        </td>
      </tfoot>
    </table>

  </div>

  <!-- Pie del documento -->
  <?php include 'layouts/footer.html' ?>

  <!-- Bootstrap Javascript y popper -->
  <?php include 'layouts/javascript.html' ?>
</body>

</html>