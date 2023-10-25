<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-clipboard2-plus-fill"></i>
            <span class="fs-3">Añadir Artículo</span>
        </header>

        <legend>Formulario Añadir Artículo</legend>
        <form action="create.php" method="POST">
            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo">
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select name="categoria" class="form-control">
                    <?php foreach($categorias as $categoria): ?>
                        <option value=""></option>
                </select>
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