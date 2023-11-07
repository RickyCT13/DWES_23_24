<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator-fill"></i>
            <span class="fs-3">Calculadora POO</span>
        </header>

        <legend>Calculadora</legend>
        <form action="calcular.php" method="POST">

            <div class="mb-3">
                <label for="valor1" class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" step="0.00001" required>
            </div>

            <div class="mb-3">
                <label for="valor2" class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" step="0.00001" required>
            </div>

            <div class="mb-3">
                <label for="operacion">Operación</label>
                <select name="operacion" class="form-select" required>
                    <option selected disabled>Seleccione una operación</option>
                    <option value="1">Suma</option>
                    <option value="2">Resta</option>
                    <option value="3">Producto</option>
                    <option value="4">División</option>
                    <option value="5">Potencia</option>
                </select>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button class="btn btn-danger" type="reset">Borrar Datos</button>
            <button class="btn btn-primary" type="submit">Calcular</button>
        </form>

    </div>

    <?php include 'partials/footer.php';?>
    <?php include 'layouts/javascript.php';?>

</body>

</html>