<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Menú Artículos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nuevo.php">Añadir</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ordenar.php?criterio=id">id</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=descripcion">Descripción</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=modelo">Modelo</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=marca">Marca</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=categorias">Categorías</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=unidades">Unidades</a></li>
                        <li><a class="dropdown-item" href="ordenar.php?criterio=precio">Precio</a></li>
                    </ul>
                </li>
            </ul>
            <!--<form class="d-flex" role="search" method="GET" action="buscar.php">
                <input class="form-control me-2" type="search" placeholder="Introduzca algo..." aria-label="Buscar" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>-->
        </div>
    </div>
</nav>