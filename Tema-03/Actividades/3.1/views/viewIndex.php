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
            <span class="fs-3">Actividad 3.1: Estructura condicional if</span>
        </header>

        <legend>Formulario Registro</legend>
        <form method="POST" action="acceso.php">
            <!-- Nombre de usuario -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="userHelp">
                <div id="userHelp" class="form-text">Entre 8 y 15 caracteres.</div>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label"></label>
                <input type="email" class="form-control" name="correo" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca un email válido.</div>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contra" class="form-control">
            </div>
            <!-- Confirmar -->
            <div class="mb-3">
                <label class="form-label">Confirmar contraseña</label>
                <input type="password" name="contraConfirm" class="form-control">
            </div>
            <!-- Perfil (Lista desplegable) -->
            <select class="form-select" name="perfiles">
                <option selected disabled>Seleccione un perfil:</option>
                <option value="admin">Administrador</option>
                <option value="editor">Editor</option>
                <option value="usuario">Usuario</option>
            </select>
            <br>
            <button type="reset" class="btn btn-primary">Borrar</button>
            <button type="submit" class="btn btn-primary" formaction="acceso.php">Acceso</button>
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