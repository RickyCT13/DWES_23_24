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
                        <th>id</th>
                        <th>Nombre completo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Población</th>
                        <th>DNI</th>
                        <th class="text-end">Edad</th>
                        <th class="text-end">Curso</th>
                    </tr>
                </thead>
                <!-- Cuerpo tabla -->
                <tbody>
                    <tr>
                        <!-- Campos por separado uds y precio alineados dcha, precio con moneda -->
                        <td><?= $alumnoElim->id ?></td>
                        <td><?= $alumnoElim->nombreCompleto ?></td>
                        <td><?= $alumnoElim->email ?></td>
                        <td><?= $alumnoElim->telefono ?></td>
                        <td><?= $alumnoElim->poblacion ?></td>
                        <td><?= $alumnoElim->dni ?></td>
                        <td class="text-end"><?= $alumnoElim->edad ?></td>
                        <td class="text-end"><?= $alumnoElim->curso ?></td>
                    </tr>
                </tbody>
            </table><br>
            <p><h4>¿Está seguro de que desea eliminar este alumno?</h4></p>
            
            <a class="btn btn-primary" href="index.php" role="button">No, volver</a>
            <button class="btn btn-danger" type="submit">Sí, borrar alumno</button>
        </form>

        <?php $alumnos = null;
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