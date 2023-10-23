<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include 'layouts/head.html'?>
  </head>
  <body>
    <!-- Capa Principal -->
    <div class="container">
      <header class="pb-3 mb-4 border-bottom">
        <i class="bi bi-book"></i>
        <span class="fs-3">Actividad 3.4 - Tabla de libros</span>
      </header>
      <legend>Tabla Libros</legend>
      <table class="table">
        <!-- Encabezado tabla -->
        <thead>
            <tr>
                <th>id</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Cuerpo tabla -->
        <tbody>
            <?php foreach($libros as $libro): ?>
                <!-- Se aplicará el mismo formato a cada campo de la tabla -->
                <tr>
                    <?php foreach($libro as $campo): ?>
                        <td><?= $campo ?></td>
                    <?php endforeach; ?>
                    <td>
                    <a href="eliminar.php?indice=<?=$libro['id']?>"><i class="bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <!-- Pie de la tabla -->
        <tfoot>
            <!-- La celda ocupará tantas columnas (colspan)
            como campos de cada registro haya (count($libro)) -->
            <td colspan="<?= count($libro)?>">Nº Libros: <?= count($libros)?></td>
        </tfoot>
      </table>

    </div>

    <!-- Pie del documento -->
    <?php include 'layouts/footer.html'?>

    <!-- Bootstrap Javascript y popper -->
    <?php include 'layouts/javascript.html'?>
  </body>
</html>