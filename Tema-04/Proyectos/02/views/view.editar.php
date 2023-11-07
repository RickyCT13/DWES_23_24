<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-pencil-fill"></i>
            <span class="fs-3">Editar Artículo</span>
        </header>

        <legend>Formulario Editar Artículo</legend>
        <form action="update.php?id=<?= $id ?>" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">id</label>
                <input type="text" class="form-control" name="id" value="<?= $articulo['id'] ?>" disabled>
            </div>
            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo['descripcion'] ?>">
            </div>
            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo['modelo'] ?>">
            </div>
            <!-- Marca -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <select name="marca" class="form-select">
                    <?php foreach ($marcas as $indice => $marca): ?>
                        <option value="<?= $indice ?>" <?= ($articulo['marca'] == $indice) ? 'selected' : null ?>>
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categorías</label>
                <?php foreach ($categorias as $indice => $categoria): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="categorias[]" <?= in_array($indice, $articulo['categorias']) ? 'checked' : null ?>>
                        <label class="form-check-label" for="categorias[]">
                            <?= $categoria ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?= $articulo['unidades'] ?>">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por unidad (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= $articulo['precio'] ?>">
            </div>
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button class="btn btn-primary" type="submit">Actualizar Artículo</button>
        </form>

    </div>

    <?php include 'partials/footer.php'; ?>
    <?php include 'layouts/javascript.php'; ?>

</body>

</html>