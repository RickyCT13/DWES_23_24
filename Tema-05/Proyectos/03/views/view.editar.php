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
        <form action="update.php?id=<?=$idEdit?>" method="POST">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredorEdit->nombre?>">
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredorEdit->apellidos?>">
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredorEdit->ciudad?>">
            </div>

            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?=$corredorEdit->fechaNacimiento?>">
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="email" class="form-label">Sexo</label>
                <div class="form-control">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" value="H" <?=($corredorEdit->sexo === 'H')?'checked':null?>>
                        <label class="form-check-label" for="sexo">Hombre</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" value="M" <?=($corredorEdit->sexo === 'M')?'checked':null?>>
                        <label class="form-check-label" for="sexo">Mujer</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" value="" <?=($corredorEdit->sexo === '')?'checked':null?>>
                        <label class="form-check-label" for="sexo">Sin especificar</label>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?=$corredorEdit->email?>">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?=$corredorEdit->dni?>">
            </div>

            <!-- Categoria -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option selected disabled>Seleccione Categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria->id ?>" <?=($corredorEdit->id_categoria === $categoria->id)?'selected':null?>>
                            <?= $categoria->categoria ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Club -->
            <div class="mb-3">
                <label for="club" class="form-label">Club</label>
                <select name="club" class="form-select">
                    <option selected disabled>Seleccione Club</option>
                    <?php foreach ($clubs as $club) : ?>
                        <option value="<?= $club->id ?>" <?=($corredorEdit->id_club === $club->id)?'selected':null?>>
                            <?= $club->club ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button class="btn btn-primary" type="submit">Actualizar datos</button>
        </form>

        <br>
        <br>
        <br>

    </div>

    <?php include 'partials/footer.php'; ?>
    <?php include 'layouts/javascript.php'; ?>

</body>

</html>