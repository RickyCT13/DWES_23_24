<!DOCTYPE html>
<html lang="es">

<!-- Head -->

<head>
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Proyecto -->
    <?php require_once("template/partials/menuAut.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php require_once("views/cuenta/partials/header.php") ?>

        <legend>Formulario Nueva Cuenta</legend>

        <!-- Formulario Nuevo Cuenta -->
        <!-- Formulario Mostrar Cuenta -->
        <form action="<?= URL ?>cuenta/importCSV" method="POST">

            <!-- Número de Cuenta -->
            <div class="mb-3">
                <input type="file" name="file" />
                <input type="submit" name="importSubmit" value="IMPORT">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </form>

        <br>
        <br>
    </div>
    <br>
    <br>
    <!-- Pié del documento -->
    <?php require_once("template/partials/footer.php") ?>


    <!-- javascript bootstrap 532 -->
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>