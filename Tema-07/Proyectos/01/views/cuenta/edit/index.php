<!DOCTYPE html>
<html lang="es">

<!-- Head -->

<head>
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Proyecto -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php require_once("views/cuenta/partials/header.php") ?>

        <legend>Formulario Nueva Cuenta</legend>

        <!-- Formulario Nuevo cuenta -->
        <form action="<?= URL ?>cuenta/update/<?= $this->id ?>" method="POST">

            <!-- Número de Cuenta -->
            <div class="mb-3">
                <label class="form-label">Número de Cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?= $this->cuenta->num_cuenta ?>">
                                
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['num_cuenta'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['num_cuenta'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- ID Cliente -->
            <div class="mb-3">
                <label class="form-label">Nombre cliente</label>
                <select class="form-select" name="id_cliente">
                    <?php foreach ($this->clientes as $cliente) : ?>
                        <option value="<?= $cliente->id ?>"
                        <?= ($this->cuenta->id_cliente == $cliente->id) ? 'selected' : null; ?>
                        ><?= $cliente->nombreCompleto ?></option>
                    <?php endforeach; ?>
                </select>
                                
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['id_cliente'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['id_cliente'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Fecha Alta -->
            <div class="mb-3">
                <label class="form-label">Fecha Alta</label>
                <input type="date" class="form-control" name="fecha_alta" value="<?= $this->cuenta->fecha_alta ?>">
            </div>

            <!-- Fecha Último Movimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha Último Movimiento</label>
                <input type="date" class="form-control" name="fecha_ul_mov" value="<?= $this->cuenta->fecha_ul_mov ?>">
            </div>

            <!-- Número de Movimientos -->
            <div class="mb-3">
                <label class="form-label">Número de Movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?= $this->cuenta->num_movtos ?>">
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="text" class="form-control" name="saldo" value="<?= $this->cuenta->saldo ?>">
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>cuenta" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
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