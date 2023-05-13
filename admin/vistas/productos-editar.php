<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data-form'] ?? [];
unset($_SESSION['errores'], $_SESSION['data-form']);

$producto = (new Producto)->traerPorId($_GET['id']);
?>
<section class="admin-publicar">
    <h1>Editar Producto</h1>

    <p>Modificá los datos del producto. Para finalizar, dale a "Actualizar".</p>

    <form action="acciones/productos-editar.php?id=<?= $producto->getProductoId();?>" method="post" class="form-publicar" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre"
                aria-describedby="help-nombre <?= isset($errores['nombre']) ? 'error-nombre' : null; ?>"
                value="<?= $dataForm['nombre'] ?? $producto->getNombre();?>"
            >
            <div id="help-nombre">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['nombre'])):
            ?>
            <div id="error-nombre"><span class="visually-hidden">Error:</span> <?= $errores['nombre'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="precio">Precio</label>
            <input 
                type="text" 
                id="precio" 
                name="precio"
                aria-describedby="help-precio <?= isset($errores['precio']) ? 'error-precio' : null; ?>"
                value="<?= $dataForm['precio'] ?? $producto->getPrecio();?>"
            >
            <div id="help-precio">Ingrese números solamente.</div>
            <?php 
            if(isset($errores['precio'])):
            ?>
            <div id="error-precio"><span class="visually-hidden">Error:</span> <?= $errores['precio'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="origen">Origen</label>
            <input 
                type="text" 
                id="origen" 
                name="origen"
                aria-describedby="help-origen <?= isset($errores['origen']) ? 'error-origen' : null; ?>"
                value="<?= $dataForm['origen'] ?? $producto->getOrigen();?>"
            >
            <div id="help-origen">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['origen'])):
            ?>
            <div id="error-origen"><span class="visually-hidden">Error:</span> <?= $errores['origen'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="nota">Notas</label>
            <input 
                type="text" 
                id="nota" 
                name="nota"
                aria-describedby="help-nota <?= isset($errores['nota']) ? 'error-nota' : null; ?>"
                value="<?= $dataForm['nota'] ?? $producto->getNotas();?>"
            >
            <div id="help-nota">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['nota'])):
            ?>
            <div id="error-nota"><span class="visually-hidden">Error:</span> <?= $errores['nota'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="varietal">Varietal</label>
            <input 
                type="text" 
                id="varietal" 
                name="varietal"
                aria-describedby="help-varietal <?= isset($errores['varietal']) ? 'error-varietal' : null; ?>"
                value="<?= $dataForm['varietal'] ?? $producto->getVarietal();?>"
            >
            <div id="help-varietal">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['varietal'])):
            ?>
            <div id="error-varietal"><span class="visually-hidden">Error:</span> <?= $errores['varietal'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="beneficio">Beneficio</label>
            <input 
                type="text" 
                id="beneficio" 
                name="beneficio"
                aria-describedby="help-beneficio <?= isset($errores['beneficio']) ? 'error-beneficio' : null; ?>"
                value="<?= $dataForm['beneficio'] ?? $producto->getBeneficio();?>"
            >
            <div id="help-beneficio">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['beneficio'])):
            ?>
            <div id="error-beneficio"><span class="visually-hidden">Error:</span> <?= $errores['beneficio'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="altitud">Altitud</label>
            <input 
                type="text" 
                id="altitud" 
                name="altitud"
                aria-describedby="help-altitud <?= isset($errores['altitud']) ? 'error-altitud' : null; ?>"
                value="<?= $dataForm['altitud'] ?? $producto->getAltitud();?>"
            >
            <div id="help-altitud">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['altitud'])):
            ?>
            <div id="error-altitud"><span class="visually-hidden">Error:</span> <?= $errores['altitud'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <label for="uso">Uso</label>
            <input 
                type="text" 
                id="uso" 
                name="uso"
                aria-describedby="help-uso <?= isset($errores['uso']) ? 'error-uso' : null; ?>"
                value="<?= $dataForm['uso'] ?? $producto->getUso();?>"
            >
            <div id="help-uso">Debe tener al menos 2 caracteres.</div>
            <?php 
            if(isset($errores['uso'])):
            ?>
            <div id="error-uso"><span class="visually-hidden">Error:</span> <?= $errores['uso'];?></div>
            <?php 
            endif;
            ?>
        </div>
        <div>
            <p>Imagen actual</p>
            <img src="<?= '../imgs/' . $producto->getImagen();?>" alt="">
        </div>
        <div>
            <label for="imagen">Imagen (opcional)</label>
            <input 
                type="file" 
                id="imagen" 
                name="imagen"
                aria-describedby="help-imagen"
            >
            <div id="help-imagen">Solo elegí una imagen si querés cambiar la actual.</div>
        </div>
        <div>
            <label for="imagen_descripcion">Descripción de la Imagen (opcional)</label>
            <input 
                type="text" 
                id="imagen_descripcion" 
                name="imagen_descripcion"
                value="<?= $dataForm['imagen_descripcion'] ?? $producto->getImagenDescripcion();?>"
            >
        </div>
        <button type="submit">Actualizar</button>
    </form>
</section>