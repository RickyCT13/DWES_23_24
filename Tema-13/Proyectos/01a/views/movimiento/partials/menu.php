<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>movimiento">Movimientos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>movimiento/new">Nuevo</a>
                </li>
                <!-- Agregar opción para exportar PDF -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['export'])) ? 'active' : 'disabled' ?>" href="<?= URL ?>movimiento/pdf">Exportar PDF</a>
                </li>
                <!-- Agregar opción para exportar CSV -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['export'])) ? 'active' : 'disabled' ?>" href="<?= URL ?>movimiento/exportCSV">Exportar CSV</a>
                </li>
                <!-- Agregar opción para importar CSV -->
                <li class="nav-item">
                    <button type="button" class="nav-link btn btn-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['import'])) ? '' : 'disabled' ?>" data-bs-toggle="modal" data-bs-target="#importarModal">Importar CSV</button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </a>
                    <!-- Criterio de ordenación como int -->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/1">Id</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/2">Cuenta</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/3">Fecha y hora</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/4">Concepto</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/5">Tipo</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/6">Cantidad</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimiento/ordenar/7">Saldo</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="<?= URL ?>movimiento/filter">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>