<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tablas de multiplicación</title>

    <!-- Bootstrap css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons 1.11.1 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <!-- Capa Principal -->
    <div class="container" style="margin-bottom: 35px;">
      <header class="pb-3 mb-4 border-bottom">
        <i class="bi bi-grid-3x3"></i>
        <span class="fs-3">Tablas de multiplicar</span>
        <i class="bi bi-123"></i>
      </header>

      <?php include 'models/modelTablaMult.php'; ?>
      <div class="content">
        <table class="table table-info" border="1">
            <tr>
                <td></td>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <th><?= $i ?></th>
                <?php endfor; ?>
            </tr>
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <tr>
                    <th><?= $i ?></th>
                    <?php for ($j = 1; $j <= 10; $j++) : ?>
                        <td><?= $i * $j ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
      </div>
      
    </div>

    <!-- Pie del documento -->
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
      <div class="container">
        <span class="text-muted"
          >© 2023 Ricardo Moreno Cantea - DWES - 2º DAW - Curso 23/24</span
        >
      </div>
    </footer>

    <!-- Bootstrap Javascript y popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>