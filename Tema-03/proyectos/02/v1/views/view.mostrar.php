<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-eye-fill"></i>
            <span class="fs-3">Mostrar Artículo</span>
        </header>

        <legend>Datos del artículo</legend>
        <form>
        <!-- id -->
        <div class="mb-3">
                <label for="id" class="form-label">id</label>
                <input type="text" class="form-control" name="id" value="<?= $articulo['id'] ?>" disabled>
            </div>    
        <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo['descripcion'] ?>" disabled>
            </div>
            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo['modelo'] ?>" disabled>
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categoria" value="<?= $articulo['categoria'] ?>" disabled>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?= $articulo['unidades'] ?>" disabled>
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por unidad (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= $articulo['precio'] ?>" disabled>
            </div>
            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        </form>

    </div>

    <?php include 'partials/footer.php';?>
    <?php include 'layouts/javascript.php';?>

</body>

</html>