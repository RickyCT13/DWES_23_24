<!doctype html>
<html lang="es">
  <head>
    <!-- Incluimos layout.head.php -->
    
    <title>Home - CRUD Tabla Películas</title>
  </head>
  
  <body>
    <div class="container">
      
      <!-- Cabecera -->
      <!-- Incluimos partial.cabecera.php -->
  
      <legend>
        Tabla Películas
      </legend>

      <!-- Incluimos Partials menu -->
      <!-- Incluimos partial.menu.php -->

      <!-- Generamos la tabla de libros -->
      <table class="table">
        <!-- Generamos el encabezado de la tabla películas -->
        <thead>
          <tr>
           
          </tr>
        </thead>
        <tbody>
          <!-- Mostramos los detalles de las películas -->
          <?php foreach (): ?>
            <!-- Muestro los datos de la película -->
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><</td>
              <td></td>
          
            
              <!-- Muestro los botones de acción -->
              <td>
                <a href="#" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                <a href="#" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
                <a href="#" Title="Mostrar"><i class="bi bi-eye"></i></a>
              </td>
            <!-- Fin botones de acción -->
            
            </tr>
          <?php endforeach; ?>
          <tfoot>
            <tr>
              <td colspan="7">Número Registros: <?= ?></td>
            </tr>
          </tfoot>
          
        </tbody>
      </table>
      
      <!-- Incluimos Partials footer -->
      <!-- Incluimos partial.footer.php -->
      
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <!-- Incluimos layout.javascript.php -->

  </body>
</html>