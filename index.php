<?php
require_once __DIR__ . '/bootstrap/init.php';

$rutas = [
    '404' => [
        'titulo' => 'Página no Encontrada',
    ],
    'home' => [
        'titulo' => 'Home',
    ],
    'productos' => [
        'titulo' => 'Nuestros cafés',
    ],
    'producto-detalle' => [
        'titulo' => 'Detalle del café',
    ],
    'contacto' => [
        'titulo' => 'Contactanos',
    ],
];

$vista = $_GET['s'] ?? 'home';

if(!file_exists('vistas/' . $vista . '.php')) {
    $vista = '404';
}

if(!isset($rutas[$vista])) {
    $vista = '404';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rutas[$vista]['titulo']; ?> - Coffee Tiger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;700&family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <header id="main-header">
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?s=home">
                    <img src="imgs/logo-light.png" alt="Logo Coffee Tiger">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="index.php?s=home">Home</a>
                        <a class="nav-link" href="index.php?s=productos">Productos</a>
                        <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
            require __DIR__ . '/vistas/' . $vista . '.php';
        ?>
    </main>

    <footer class="footer">
        <div>
            <div id="info-footer">
                <p><b>Dirección:</b> Sarmiento 550, Bahía Blanca</p>
                <p><b>Email:</b> ventas@coffeetigerco.com</p>
                <p><b>Tel.:</b> +54 02915279928</p>
            </div>
            <div id="footer-brand">
                <a href="index.php?s=home"><img src="imgs/logo-light.png" alt="Logo Coffee Tiger"></a>
            </div>
            <div id="redes">
                <a href="https://www.facebook.com/coffeetigerco" target="_blank"><img src="imgs/Redes_FB.png" alt="Logo Facebook"></a>
                <a href="https://www.instagram.com/coffeetigerco/" target="_blank"><img src="imgs/Redes_IG.png" alt="Logo Instagram"></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>