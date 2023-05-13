<?php
class Usuario
{
    private int $usuario_id;
    private string $email;
    private string $password;
    private ?string $nombre;
    private ?string $apellido;

    /**
     * Obtiene un usuario por su email.
     * Si no existe, retorna null.
     */
    public function traerPorEmail(string $email): self|null
    {
        $db = (new DB)->getConexion();
        $query = "SELECT * FROM usuarios
                WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        $usuario = $stmt->fetch();

        if(!$usuario) return null;

        return $usuario;
    }


    // Setters y Getters
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(int $id)
    {
        $this->usuario_id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}