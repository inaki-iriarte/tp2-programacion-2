<?php
$productos = (new Producto)->todo();
?>
<section class="admin-productos">
    <h1>Administración de Productos</h1>

    <div>
        <a href="index.php?s=productos-publicar">Publicar un Nuevo Producto</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto):
            ?>
            <tr>
                <td><?= $producto->getProductoId();?></td>
                <td><?= $producto->getNombre();?></td>
                <td><?= $producto->getPrecio();?></td>
                <td><img src="<?= '../imgs/' . $producto->getImagen();?>" alt="<?= $producto->getImagenDescripcion(); ?>"></td>
                <td>
                    <a href="index.php?s=productos-editar&id=<?= $producto->getProductoId();?>">Editar</a>
                    <a href="index.php?s=productos-eliminar&id=<?= $producto->getProductoId();?>">Eliminar</a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>