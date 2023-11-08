<!DOCTYPE html>
<html lang="es">

<head>
  <?php include 'layouts/head.php'?>
</head>

<body>
  <!-- Capa Principal -->
  <div class="container">
    <?php include 'partials/header.php'?>

    <?php include 'partials/menu.php'; ?>

    <legend>Tabla Artículos</legend>
    <table class="table">
      <!-- Encabezado tabla -->
      <thead>
        <tr>
          <th>id</th>
          <th>Descripción</th>
          <th>Modelo</th>
          <th>Marca</th>
          <th>Categorías</th>
          <th class="text-end">Unidades</th>
          <th class="text-end">Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <!-- Cuerpo tabla -->
      <tbody>
        <?php foreach ($articulos as $articulo): ?>
          <!-- Se aplicará el mismo formato a cada campo de la tabla -->
          <tr>
            <!-- Campos por separado uds y precio alineados dcha, precio con moneda -->
            <td><?=$articulo->getId()?></td>
            <td><?=$articulo->getDescripcion()?></td>
            <td><?=$articulo->getModelo()?></td>
            <td><?=mostrarMarcas($marcas, $articulo->getMarca())?></td>
            <td><?=implode(', ', mostrarCategorias($categorias, $articulo->getCategorias()))?></td>
            <td class="text-end"><?=$articulo->getUnidades()?></td>
            <td style="padding: 0.5em 0.25em;" class="text-end"><?= number_format($articulo->getPrecio(), 2, ",", 2)?> €</td>
            <td>
              <a href="eliminar.php?id=<?= key($articulo) ?>" title="Eliminar"><i class="bi-trash-fill"></i></a>
              <a href="editar.php?id=<?= key($articulo) ?>" title="Editar"><i class="bi-pencil-fill"></i></a>
              <a href="mostrar.php?id=<?= key($articulo) ?>" title="Mostrar"><i class="bi-eye-fill"></i></a>
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
  <?php include 'partials/footer.php' ?>

  <!-- Bootstrap Javascript y popper -->
  <?php include 'layouts/javascript.php' ?>
</body>

</html>