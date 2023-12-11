<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php'; ?>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container" style="padding: 1em 1em;">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-clipboard2-plus-fill"></i>
            <span class="fs-3">Añadir Corredor</span>
        </header>

        <legend>Formulario Añadir Corredor</legend>
        <form>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredor->nombre?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredor->apellidos?>" disabled>
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredor->ciudad?>" disabled>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                <input type="text" class="form-control" name="fechaNac" value="<?=$corredor->fechaNacimiento?>" disabled>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="email" class="form-label">Sexo</label>
                <?php switch ($corredor->sexo): ?><?php case 'H': ?>
                        <input type="text" class="form-control" name="categoria" value="Hombre" disabled>
                        <?php break; ?>
                    <?php case 'M': ?>
                        <input type="text" class="form-control" name="categoria" value="Mujer" disabled>
                        <?php break; ?>
                    <?php case '': ?>
                        <input type="text" class="form-control" name="categoria" value="Sin especificar" disabled>
                        <?php break; ?>
                <?php endswitch; ?>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?=$corredor->email?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?=$corredor->dni?>" disabled>
            </div>

            <!-- Categoria -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="categoria" value="<?=$categoria->categoria?>" disabled>
            </div>

            <!-- Club -->
            <div class="mb-3">
                <label for="club" class="form-label">Club</label>
                <input type="text" class="form-control" name="club" value="<?=$club->club?>" disabled>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        </form>

        <br>
        <br>
        <br>

    </div>

    <?php include 'partials/footer.php'; ?>
    <?php include 'layouts/javascript.php'; ?>

</body>

</html>