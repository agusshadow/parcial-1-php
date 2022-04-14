<?php 

$rutas_permitidas = [
  'inicio' => [
    'title' => 'Inicio'
  ],
  'listado' => [
    'title' => 'Listado'
  ],
  'contacto' => [
    'title' => 'Contacto'
  ],
  '404' => [
    'title' => 'Pagina no encontrada'
  ],
];

$vista = isset($_GET['s']) ? $_GET['s'] : 'inicio';

if (!isset($rutas_permitidas[$vista])) {
  $vista = '404';
}

$vista_seleccionada = $rutas_permitidas[$vista];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $vista_seleccionada['title'] ?></title>
</head>
<body>

    <header>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#">Logo</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?s=inicio">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?s=listado">Productos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn" type="submit">Buscar</button>
                </form>
              </div>
            </div>
          </nav>

    </header>
    
    <main>

        <?php 

        if (file_exists('vistas/' . $vista . '.php')) {
          require_once __DIR__ . '/vistas/' . $vista . '.php';
        } else {
          require_once __DIR__ . '/vistas/404.php';
        }
        
        ?>

    </main>

    <footer>
      <small class="text-white mx-auto">©copy</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>