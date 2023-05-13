<?php
$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data-form'] ?? [];
unset($_SESSION['errores'], $_SESSION['data-form']);
?>
<section class="admin-container">
    <h1>Ingresar al Panel de Administración</h1>

    <p>Completá el formulario con tus credenciales de acceso para poder ingresar al panel de administración.</p>

    <form action="acciones/iniciar-sesion.php" method="POST">
        <div>
            <label for="email">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                value="<?= $dataForm['email'] ?? null;?>"
            >
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Ingresar</button>
    </form>
</section>