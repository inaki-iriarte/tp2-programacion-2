<?php
$producto = (new Producto)->traerPorId($_GET['id']);

if(!$producto) {
    require 'vistas/productos-no-existe.php';
} else {
?>

<section>
    <h1>Confirmación para Eliminar</h1>
    <p>Estás a punto de eliminar el siguiente producto. ¿Estás seguro/a que querés hacer esto?</p>

    <article>
        <img src="../imgs/<?= $producto->getImagen(); ?>" alt="<?= $producto->getImagenDescripcion(); ?>">
        <div>
            <h2><?= $producto->getNombre(); ?></h2>
            <p><b>Precio: </b> $<?= $producto->getPrecio(); ?></p>
        </div>
    </article>

    <hr>

    <form action="acciones/productos-eliminar.php?id=<?= $producto->getProductoId(); ?>" method="POST">
        <button type="submit">Sí, eliminar</button>
    </form>
</section>
<?php
}
?>