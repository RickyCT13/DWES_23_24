<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html' ?>
    <title>Resultados</title>
</head>
<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Calculadora Conversor Decimal</span>   
        </header>

        <legend>Resultados</legend>
        <table class="table">
            <!-- Original -->
            <tr>
                <th>DECIMAL</th>
                <td><?=$valor?></td>
            </tr>

            <!-- Convertido -->
            <tr>
                <th><?=$conversion?></th>
                <td><?=$resultado?></td>
            </tr>

        </table>
        <a class="btn btn-primary" href="index.php">Volver</a>

        
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
        
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>