<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap -->
    <?php require_once("template/partials/head.php");  ?>
    <title> <?= $this->title ?> </title>

</head>

<body>
    <!-- menu fijo superior -->
    <?php require_once "template/partials/menuBar.php"; ?>
    <br><br><br>

    <!-- capa principal -->
    <div class="container">

        <!-- cabecera -->
        <?php include "views/contacto/partials/header.php" ?>

        <legend>Formulario Contacto</legend>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/error.php' ?>

        <!-- Formulario  -->
        <form action="<?= URL ?>contacto/validar" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $this->contacto->nombre ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['nombre'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['nombre'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" value="<?= $this->contacto->email ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['email'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Asunto -->
            <div class="mb-3">
                <label for="" class="form-label">Asunto</label>
                <input type="text" class="form-control" name="asunto" value="<?= $this->contacto->asunto ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['asunto'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['asunto'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Mensaje -->
            <div class="mb-3">
                <label for="" class="form-label">Mensaje</label>
                <input type="text" class="form-control" name="mensaje" value="<?= $this->contacto->mensaje ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['mensaje'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['mensaje'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Botones de Acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>