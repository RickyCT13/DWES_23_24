<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>@yield('titulo') - Laravel GesAlumnos 1.0</title>
  </head>
  <body>
    @include('partials.menu');
    <header>
      <hgroup>
          <!-- Titulos y subtitulos -->
          
          <div class="container">
              <h1 class="display-7">@yield('titulo')</h1>
              <p class="lead">@yield('subtitulo')</p>
          </div>

      </hgroup>
    </header>

    <div class="container">
        @yield('contenido')
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Pié de página -->
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
      <div class="container">
      <span class="text-muted">© 2022
        Juan Carlos Moreno - DWES - 2º DAW - Curso 22/23</span>
      </div>
    </footer>
    
  </body>
</html>