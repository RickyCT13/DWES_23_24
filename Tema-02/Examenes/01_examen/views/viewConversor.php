<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html' ?>
    <title>Conversor</title>
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

            <!-- Decimal -->
            <tr>
                <th>BINARIO</th>
                <td><?=decbin($valor)?></td>
            </tr>

            <!-- Octal -->
            <tr>
                <th>OCTAL</th>
                <td><?=decoct($valor)?></td>
            </tr>

            <!-- Hexadecimal -->
            <tr>
                <th>HEXADECIMAL</th>
                <td><?=strtoupper(dechex($valor))?></td>
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