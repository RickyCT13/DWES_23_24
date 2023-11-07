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
            <span class="fs-3">Calculadora POO Versión 2</span>
        </header>

        <legend>Calculadora v2</legend>
        <form action="calcular.php" method="POST">

            <div class="mb-3">
                <label for="valor1" class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" step="0.00001" value="<?=$calculadora->getValor1()?>" required>
            </div>

            <div class="mb-3">
                <label for="valor2" class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" step="0.00001" value="<?=$calculadora->getValor2()?>" required>
            </div>

            <div class="mb-3">
                <label for="resultado" class="form-label">Resultado</label>
                <input type="number" class="form-control" name="resultado" value="<?=$calculadora->getResultado()?>" disabled>
            </div>
            <button class="btn btn-danger" name="borrar" value="true">Borrar Datos</button>
            <button class="btn btn-primary" name="operacion" value="suma">Sumar</button>
            <button class="btn btn-primary" name="operacion" value="resta">Restar</button>
            <button class="btn btn-primary" name="operacion" value="producto">Multiplicar</button>
            <button class="btn btn-primary" name="operacion" value="division">Dividir</button>
            <button class="btn btn-primary" name="operacion" value="potencia">Potencia</button>
        </form>

    </div>

    <?php include 'partials/footer.php';?>
    <?php include 'layouts/javascript.php';?>

</body>

</html>