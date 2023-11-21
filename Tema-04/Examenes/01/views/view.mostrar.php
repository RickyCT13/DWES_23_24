<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("layouts/layout.head.php"); ?>
    <title>Nuevo - Gestión Jugadores </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Datos del jugador</legend>

        <form>
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $jugador->getId() ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $jugador->getNombre() ?>" disabled>
            </div>
            <!-- número -->
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" value="<?= $jugador->getNumero() ?>" disabled>
            </div>
            <!-- contrato -->
            <div class="mb-3">
                <label for="contrato" class="form-label">Contrato</label>
                <input type="text" class="form-control" name="contrato" value="<?= number_format($jugador->getContrato(), 2, ',', '.')?> €" disabled>
            </div>

            <!-- Pais -->
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" class="form-control" name="pais" value="<?= $paises[$jugador->getPais()] ?>" disabled>
            </div>
            <!-- equipos -->
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <input type="text" class="form-control" name="equipo" value="<?= $equipos[$jugador->getEquipo()] ?>" disabled>
            </div>


            <!-- Perfiles List Checkbox -->
            <div class="mb-3">
                <label for="posiciones" class="form-label">Posiciones</label>
                <input type="text" class="form-control" name="posiciones" value="<?= implode(', ', ArrayJugadores::listaPosiciones($jugador->getPosiciones(), ArrayJugadores::getPosiciones())) ?>" disabled>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>

        <br><br><br> <br>

        <!-- Pie del documento -->
        <?php include("partials/partial.footer.php"); ?>

        <!-- Bootstrap Javascript y popper -->
        <?php include("layouts/layout.javascript.php"); ?>

</body>

</html>