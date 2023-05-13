<?php
$productos = (new Producto)->todo();
?>
<section class="productos-section">
    <h1 id="productos-title">Nuestros cafés</h1>
    <p>Elegí tu variedad</p>
    <div id="productos">
        <?php
        foreach($productos as $producto):
        ?>
        <div>
            <article>
                <img src="imgs/<?= $producto->getImagen(); ?>" alt="<?= $producto->getImagenDescripcion(); ?>">
                <div>
                    <h2><?= $producto->getNombre(); ?></h2>
                    <p><b>Precio: </b> $<?= $producto->getPrecio(); ?></p>
                    <a href="index.php?s=producto-detalle&id=<?= $producto->getProductoId(); ?>">Ver más</a>
                </div>
            </article>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</section>