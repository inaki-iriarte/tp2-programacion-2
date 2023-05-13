<?php
require_once __DIR__ . '/../../bootstrap/init.php';

//Autenticación
$auth = new Auth;
if(!$auth->autenticado()) {
    $_SESSION['mensajeError'] = 'Se necesita haber iniciado sesión como administrador para realizar esta acción.';
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$id = $_GET['id'];

try {
    $producto = (new Producto)->traerPorId($id);

    if(!empty($producto->getImagen())) {
        if(file_exists(RUTA_IMGS . '/' . $producto->getImagen())) {
            unlink(RUTA_IMGS . '/' . $producto->getImagen());
        }
    }

    (new Producto)->eliminar($id);

    $_SESSION['mensajeFeedback'] = "El producto se elimino correctamente.";

    header("Location: ../index.php?s=productos");
    exit;
} catch (Exception $e) {
    $_SESSION['mensajeFeedback'] = "El producto no pudo ser eliminado por un error inesperado.";

    header("Location: ../index.php?s=productos");
    exit;
}