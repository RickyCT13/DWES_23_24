<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book"></i>
            <span class="fs-3">Añadir Libro</span>
        </header>

        <legend>Formulario Añadir Libro</legend>
        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">id</label>
                <input type="text" class="form-control" name="id">
            </div>
            <!-- Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <!-- Autor -->
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor">
            </div>
            <!-- Editorial -->
            <div class="mb-3">
                <label for="autor" class="form-label">Editorial</label>
                <input type="text" class="form-control" name="editorial">
            </div>
            <!-- Género -->
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" name="genero">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio en € (Euros)</label>
                <input type="number" class="form-control" name="precio" step="0.01">
            </div>
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button class="btn btn-danger" type="reset">Borrar Datos</button>
            <button class="btn btn-primary" type="submit">Añadir Libro</button>
        </form>

    </div>

    <?php include 'layouts/footer.html';?>
    <?php include 'layouts/javascript.html';?>

</body>

</html>