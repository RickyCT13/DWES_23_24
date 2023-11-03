<!-- Crear view.mostrar.php a partir de view.nuevo.php -->
<!doctype html>
<html lang="es">
  <head>
    <!-- Incluimos HEAD -->
    <?php include("layouts/layout.head.php") ?>
    <title>Añadir Película - CRUD Tabla Películas</title>
  </head>
  <body>
    <div class="container">    

      <!-- Incluimos Cabecera -->
      <?php include("partials/partial.cabecera.php") ?> 

      <legend>
        Formulario Nueva Película
      </legend>

      <form>
            <!-- Campo ID Oculto-->
            <div class="mb-3"> 
                <label class="form-label">Id</label>
                <input name = "id" type="text" class="form-control" value="<?= $id ?>" disabled>
            </div>

            <!-- Campo título -->
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input name="titulo" type="text" class="form-control" value="<?= $pelicula['titulo'] ?>" disabled>
            </div>

            <!-- País Select -->
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input name="pais" type="text" class="form-control" value="<?= $paises[$pelicula['pais']] ?>" disabled>
            </div>

            <!-- Campo director -->
            <div class="mb-3">
                <label class="form-label">Director</label>
                <input name = "director" type="text" class="form-control" value="<?= $pelicula['director'] ?>" disabled>
            </div>

            <!-- Campo Año -->
            <div class="mb-3">
                <label class="form-label">Año</label>
                <input name = "año" type="number" class="form-control" value="<?= $pelicula['año'] ?>" disabled>
            </div>

             <!-- Categorías -->
             <div class="mb-3">
                <label for="generos" class="form-label">Géneros</label>
                <input name="generos" type="text" class="form-control" value="<?= implode(', ', mostrarGeneros($generos, $pelicula['generos'])) ?>" disabled>
            </div>

            <br>
            <div class="mb-3" role="group">
              <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            </div>
      </form>
      <br>
      <br>
      <br>
      <!-- Incluimos Partials footer -->
      <?php include("partials/partial.footer.php") ?>
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <?php include("layouts/layout.javascript.php") ?>
  </body>
</html>