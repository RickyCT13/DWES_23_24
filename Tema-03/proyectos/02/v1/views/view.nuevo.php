<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
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
                <select name="categoria" class="form-select">
                    <option selected disabled>Seleccione Categoría</option>
                    <?php foreach($categorias as $indice => $categoria): ?>
                        <option value="<?=$indice?>"><?=$categoria?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por unidad (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01">
            </div>
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button class="btn btn-danger" type="reset">Borrar Datos</button>
            <button class="btn btn-primary" type="submit">Añadir Artículo</button>
        </form>

    </div>

    <?php include 'partials/footer.php';?>
    <?php include 'layouts/javascript.php';?>

</body>

</html>