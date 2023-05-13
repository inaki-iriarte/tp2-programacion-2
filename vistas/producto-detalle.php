<?php
$producto = (new Producto)->traerPorId($_GET['id']);
?>
<section>
    <div id="producto-detalle">
        <img src="imgs/<?= $producto->getImagen(); ?>" alt="<?= $producto->getImagenDescripcion(); ?>">

        <div>
            <h1><?= $producto->getNombre(); ?></h1>
            <p><b>Peso:</b> 250 g.</p>
            <p><b>Precio: </b> $<?= $producto->getPrecio(); ?></p>

            <button>Comprar</button>
        </div>
    </div>
    <div id="producto-descripcion">
        <hr>
        
        <h2>Descripción</h2>

        <ul>
            <li><b>Origen: </b><?= $producto->getOrigen(); ?></li>
            <li><b>Notas: </b><?= $producto->getNotas(); ?></li>
            <li><b>Varietal: </b><?= $producto->getVarietal(); ?></li>
            <li><b>Beneficio: </b><?= $producto->getBeneficio(); ?></li>
            <li><b>Altitud: </b><?= $producto->getAltitud(); ?></li>
            <li><b>Sugerencia de uso: </b><?= $producto->getUso(); ?></li>
        </ul>
    </div>
</section>