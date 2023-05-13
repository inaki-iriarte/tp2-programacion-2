<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$auth = new Auth;

if(!$auth->login($email, $password)) {
    $_SESSION['mensajeError'] = 'Las credenciales ingresadas no coinciden con nuestros registros.';
    $_SESSION['data-form'] = $_POST;
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$_SESSION['mensajeFeedback'] = 'Bienvenido/a';
header('Location: ../index.php?s=home');
exit;