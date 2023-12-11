<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php' ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container" style="padding: 1em 1em;">
        <?php include 'partials/header.php' ?>

        <?php include 'partials/menu.php'; ?>

        <form action="delete.php?id=<?= $idElim ?>" method="POST">
            <table class="table">
                <!-- Encabezado tabla -->
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Apellidos, Nombre</th>
                        <th>Ciudad</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Categoría</th>
                        <th>Club</th>
                    </tr>
                </thead>
                <!-- Cuerpo tabla -->
                <tbody>
                    <!-- Se aplicará el mismo formato a cada campo de la tabla -->
                    <tr>
                        <!-- Campos por separado uds y precio alineados dcha, precio con moneda -->
                        <td><?= $corredorElim->id ?></td>
                        <td><?= $corredorElim->nombreCorredor ?></td>
                        <td><?= $corredorElim->ciudad ?></td>
                        <td><?= $corredorElim->email ?></td>
                        <td><?= $corredorElim->edad ?></td>
                        <td><?= $corredorElim->categoria ?></td>
                        <td><?= $corredorElim->club ?></td>
                    </tr>
                </tbody>
            </table><br>
            <p>
            <h4>¿Está seguro de que desea eliminar este corredor?</h4>
            </p>

            <a class="btn btn-primary" href="index.php" role="button">No, volver</a>
            <button class="btn btn-danger" type="submit">Sí, borrar corredor</button>
        </form>

        <?php $corredores = null;
        $db->cerrarConexion();
        ?>


        <br>
        <br>
        <br>

    </div>

    <!-- Pie del documento -->
    <?php include 'partials/footer.php' ?>

    <!-- Bootstrap Javascript y popper -->
    <?php include 'layouts/javascript.php' ?>
</body>

</html>