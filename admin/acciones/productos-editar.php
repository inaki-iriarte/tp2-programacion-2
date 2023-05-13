<?php
use Intervention\Image\ImageManagerStatic as Image;

require_once __DIR__ . '/../../bootstrap/init.php';

//Autenticación
$auth = new Auth;
if(!$auth->autenticado()) {
    $_SESSION['mensajeError'] = 'Se necesita haber iniciado sesión como administrador para realizar esta acción.';
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$producto_id        = $_GET['id'];
$nombre             = $_POST['nombre'];
$precio             = $_POST['precio'];
$origen             = $_POST['origen'];
$nota               = $_POST['nota'];
$varietal           = $_POST['varietal'];
$beneficio          = $_POST['beneficio'];
$altitud            = $_POST['altitud'];
$uso                = $_POST['uso'];
$imagen_descripcion = $_POST['imagen_descripcion'];
$imagen             = $_FILES['imagen'];

// Validaciones
$errores = [];

if(empty($nombre)) {
    $errores['nombre'] = "El nombre del producto tiene que tener un valor.";
} else if(strlen($nombre) < 2) {
    $errores['nombre'] = "El nombre del producto debe tener al menos 2 caracteres.";
}

if(empty($precio)) {
    $errores['precio'] = "El precio del producto tiene que tener un valor.";
} else if(!is_numeric($precio)) {
    $errores['precio'] = "Solo puede ingresar números para definir el precio del producto.";
}

if(empty($origen)) {
    $errores['origen'] = "El origen del producto tiene que tener un valor.";
} else if(strlen($origen) < 2) {
    $errores['origen'] = "El origen del producto debe tener al menos 2 caracteres.";
}

if(empty($nota)) {
    $errores['nota'] = "La nota del producto tiene que tener un valor.";
} else if(strlen($nota) < 2) {
    $errores['nota'] = "La nota del producto debe tener al menos 2 caracteres.";
}

if(empty($varietal)) {
    $errores['varietal'] = "La varietal del producto tiene que tener un valor.";
} else if(strlen($varietal) < 2) {
    $errores['varietal'] = "La varietal del producto debe tener al menos 2 caracteres.";
}

if(empty($beneficio)) {
    $errores['beneficio'] = "El beneficio del producto tiene que tener un valor.";
} else if(strlen($beneficio) < 2) {
    $errores['beneficio'] = "El beneficio del producto debe tener al menos 2 caracteres.";
}

if(empty($altitud)) {
    $errores['altitud'] = "La altitud del producto tiene que tener un valor.";
} else if(strlen($altitud) < 2) {
    $errores['altitud'] = "La altitud del producto debe tener al menos 2 caracteres.";
}

if(empty($uso)) {
    $errores['uso'] = "El uso del producto tiene que tener un valor.";
} else if(strlen($uso) < 2) {
    $errores['uso'] = "El uso del producto debe tener al menos 2 caracteres.";
}

if(count($errores) > 0) {
    $_SESSION['errores'] = $errores;

    $_SESSION['data-form'] = $_POST;

    header('Location: ../index.php?s=productos-editar&id=' . $producto_id);
    exit;
}

$producto = (new Producto)->traerPorId($producto_id);

// Nombre a la imagen y mover a la carpeta imgs del proyecto
if(!empty($imagen['tmp_name'])) {
    $nombreImagen = time() . "_" . $imagen['name'];

    $nuevaImagen = Image::make($imagen['tmp_name']);

    $nuevaImagen->fit(1000, 1000);

    $nuevaImagen->save(RUTA_IMGS . '/' . $nombreImagen);
}

try {
    (new Producto)->editar($producto_id, [
        'usuario_fk' => 1,
        'nombre' => $nombre,
        'precio' => $precio,
        'origen' => $origen,
        'nota' => $nota,
        'varietal' => $varietal,
        'beneficio' => $beneficio,
        'altitud' => $altitud,
        'uso' => $uso,
        'imagen_descripcion' => $imagen_descripcion,
        'imagen' => $nombreImagen ?? $producto->getImagen(),
    ]);

    if(!empty($imagen['tmp_name'])) {
        $imagenVieja = RUTA_IMGS . '/' . $producto->getImagen();

        if(file_exists($imagenVieja)) unlink($imagenVieja);
    }

    $_SESSION['mensajeFeedback'] = 'El producto se actualizó correctamente.';
    
    header('Location: ../index.php?s=productos');
    exit;
} catch (Exception $e) {
    header('Location: ../index.php?s=productos-editar&id=' . $producto_id);
    exit;
}