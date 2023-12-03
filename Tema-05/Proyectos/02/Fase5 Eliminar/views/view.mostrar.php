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
            <span class="fs-3">Mostrar Alumno</span>
        </header>

        <legend>Datos del alumno</legend>
        <form>
            <!-- Id -->
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $alumnoEdit->id ?>" disabled>
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumnoEdit->nombre ?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumnoEdit->apellidos ?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $alumnoEdit->email ?>" disabled>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $alumnoEdit->telefono ?>" disabled>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?= $alumnoEdit->direccion ?>" disabled>
            </div>

            <!-- Población -->
            <div class="mb-3">
                <label for="poblacion" class="form-label">Población</label>
                <input type="text" class="form-control" name="poblacion" value="<?= $alumnoEdit->poblacion ?>" disabled>
            </div>

            <!-- Provincia -->
            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia" value="<?= $alumnoEdit->provincia ?>" disabled>
            </div>

            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" value="<?= $alumnoEdit->nacionalidad ?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $alumnoEdit->dni ?>" disabled>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?= $alumnoEdit->fechaNac ?>" disabled>
            </div>

            <!-- Curso -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <?php foreach ($cursos as $curso): ?>
                    <?php if ($curso->id === $alumnoEdit->id_curso): ?>
                        <input type="text" class="form-control" name="curso" value="<?= $curso->curso ?>" disabled>
                    <?php endif; ?>
                <?php endforeach; ?>
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