<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container" style="padding: 1em 1em;">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator-fill"></i>
            <span class="fs-3">Calculadora POO Versión 2</span>
        </header>

        <legend>Resultado</legend>
        <form>

            <div class="mb-3">
                <label for="valor1" class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" value="<?=$calculadora->getValor1()?>" disabled>
            </div>

            <div class="mb-3">
                <label for="valor2" class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" value="<?=$calculadora->getValor2()?>" disabled>
            </div>

            <div class="mb-3">
                <label for="resultado" class="form-label"><?=$calculadora->getOperacion()?></label>
                <input type="number" class="form-control" name="resultado" value="<?=$calculadora->getResultado()?>" disabled>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        </form>

    </div>

    <?php include 'partials/footer.php';?>
    <?php include 'layouts/javascript.php';?>

</body>

</html>