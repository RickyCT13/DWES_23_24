<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container" style="padding: 1em 1em;">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-eye-fill"></i>
            <span class="fs-3">Mostrar Artículo</span>
        </header>

        <legend>Datos del artículo</legend>
        <form>
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">id</label>
                <input type="text" class="form-control" name="id" value="<?= $articulo->getId() ?>" disabled>
            </div>
            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo->getDescripcion() ?>"
                    disabled>
            </div>
            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo->getModelo() ?>" disabled>
            </div>
            <!-- Marca -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca" value="<?= $marcas[$articulo->getMarca()] ?>"
                    disabled>
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="categorias" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categorias"
                    value="<?= implode(', ', ArrayArticulos::mostrarCategorias($categorias, $articulo->getCategorias())) ?>" disabled>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?= $articulo->getUnidades() ?>"
                    disabled>
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por unidad (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01"
                    value="<?= $articulo->getPrecio() ?>" disabled>
            </div>
            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        </form>

    </div>

    <?php include 'partials/footer.php'; ?>
    <?php include 'layouts/javascript.php'; ?>

</body>

</html>