<?php
class Auth
{
    public function login(string $email, string $password): bool
    {
        //Búsqueda de usuario
        $usuario = (new Usuario)->traerPorEmail($email);

        if(!$usuario) return false;

        //Verificación de password
        if(!password_verify($password, $usuario->getPassword())) return false;

        //Autenticación del usuario
        $this->autenticar($usuario);
        return true;
    }

    public function autenticar(Usuario $usuario)
    {
        $_SESSION['usuario_id'] = $usuario->getUsuarioId();
    }

    public function autenticado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }
}