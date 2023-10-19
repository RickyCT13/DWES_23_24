<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantilla Bootstrap 5.3.2</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons 1.11.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-app-indicator"></i>
            <span class="fs-3">Datos</span>
        </header>

        <legend>Datos del usuario</legend>
        <form>
            <div class="mb-3">
                <nav>
                    <ul class="nav nav-tabs">
                        <?php if ($userType == "admin"): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nuevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Eliminar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualizar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Consultar</a>
                            </li>
                        <?php elseif ($userType == "editor"): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nuevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualizar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Consultar</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Consultar</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="mb-3">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usuario</td>
                            <td>
                                <?= $user ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <?= $email ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <?= $passwd ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de Usuario</td>
                            <td>
                                <?= $userType ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>


    <!-- Pie del documento -->
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">© 2023
                Ricardo Moreno Cantea - DWES - 2º DAW - Curso 23/24</span>
        </div>
    </footer>

    <!-- Bootstrap Javascript y popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>