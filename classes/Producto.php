<?php

class Producto
{
    private int $producto_id;
    private string $nombre;
    private int $precio;
    private string $origen;
    private string $nota;
    private string $varietal;
    private string $beneficio;
    private string $altitud;
    private string $uso;
    private ?string $imagen;
    private ?string $imagen_descripcion;

    /**
     * Guarda los datos de **$data** en las propiedades equivalentes de la clase.
     * 
     * @param array $data
     */
    public function cargarDatosDeArray(array $data): void
    {
        $this->producto_id = $data['producto_id'];
        $this->nombre = $data['nombre'];
        $this->precio = $data['precio'];
        $this->origen = $data['origen'];
        $this->nota = $data['nota'];
        $this->varietal = $data['varietal'];
        $this->beneficio = $data['beneficio'];
        $this->altitud = $data['altitud'];
        $this->uso = $data['uso'];
        $this->imagen = $data['imagen'];
        $this->imagen_descripcion = $data['imagen_descripcion'];
    }

    /**
     * Retorna un array con todos los productos.
     * 
     * @return Producto[]
     */
    public function todo(): array
    {
        $db = (new DB)->getConexion();
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);

        return $stmt->fetchAll();
    }

    /**
     * Retorna el producto correspondiente al $id provisto.
     * 
     * @param int $id
     * @return Producto|null
     */
    public function traerPorId(int $id): ?Producto
    {
        $db = (new DB)->getConexion();
        $query = "SELECT * FROM productos 
                WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $producto = $stmt->fetch();
        if(!$producto) return null;
        return $producto;
    }

    public function crear(array $data)
    {
        $db = (new DB)->getConexion();
        $query = "INSERT INTO productos (usuario_fk, nombre, precio, origen, nota, varietal, beneficio, altitud, uso, imagen, imagen_descripcion) 
                VALUES (:usuario_fk, :nombre, :precio, :origen, :nota, :varietal, :beneficio, :altitud, :uso, :imagen, :imagen_descripcion)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'usuario_fk'         => $data['usuario_fk'],
            'nombre'             => $data['nombre'],
            'precio'             => $data['precio'],
            'origen'             => $data['origen'],
            'nota'               => $data['nota'],
            'varietal'           => $data['varietal'],
            'beneficio'          => $data['beneficio'],
            'altitud'            => $data['altitud'],
            'uso'                => $data['uso'],
            'imagen'             => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
        ]);
    }

    public function editar(int $id, array $data)
    {
        $db = (new DB)->getConexion();
        $query = "UPDATE productos 
                SET usuario_fk         = :usuario_fk, 
                    nombre             = :nombre, 
                    precio             = :precio,
                    origen             = :origen, 
                    nota               = :nota, 
                    varietal           = :varietal, 
                    beneficio          = :beneficio, 
                    altitud            = :altitud, 
                    uso                = :uso, 
                    imagen             = :imagen, 
                    imagen_descripcion = :imagen_descripcion
                WHERE producto_id = :producto_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'usuario_fk'         => $data['usuario_fk'],
            'nombre'             => $data['nombre'],
            'precio'             => $data['precio'],
            'origen'             => $data['origen'],
            'nota'               => $data['nota'],
            'varietal'           => $data['varietal'],
            'beneficio'          => $data['beneficio'],
            'altitud'            => $data['altitud'],
            'uso'                => $data['uso'],
            'imagen'             => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
            'producto_id'        => $id,
        ]);
    }

    /**
     * Elimina la noticia de la base de datos.
     */
    public function eliminar(int $id)
    {
        $db = (new DB)->getConexion();
        $query = "DELETE FROM productos 
                WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }


    // SETTERS Y GETTERS

    /**
     * Get the value of producto_id
     */ 
    public function getProductoId(): int
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     */ 
    public function setProductoId(int $producto_id)
    {
        $this->producto_id = $producto_id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */ 
    public function setPrecio(int $precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get the value of origen
     */ 
    public function getOrigen(): string
    {
        return $this->origen;
    }

    /**
     * Set the value of origen
     */ 
    public function setOrigen(string $origen)
    {
        $this->origen = $origen;
    }

    /**
     * Get the value of notas
     */ 
    public function getNotas(): string
    {
        return $this->nota;
    }

    /**
     * Set the value of notas
     */ 
    public function setNotas(string $notas)
    {
        $this->nota = $notas;
    }

    /**
     * Get the value of varietal
     */ 
    public function getVarietal(): string
    {
        return $this->varietal;
    }

    /**
     * Set the value of varietal
     */ 
    public function setVarietal(string $varietal)
    {
        $this->varietal = $varietal;
    }

    /**
     * Get the value of beneficio
     */ 
    public function getBeneficio(): string
    {
        return $this->beneficio;
    }

    /**
     * Set the value of beneficio
     */ 
    public function setBeneficio(string $beneficio)
    {
        $this->beneficio = $beneficio;
    }

    /**
     * Get the value of altitud
     */ 
    public function getAltitud(): string
    {
        return $this->altitud;
    }

    /**
     * Set the value of altitud
     */ 
    public function setAltitud(string $altitud)
    {
        $this->altitud = $altitud;
    }

    /**
     * Get the value of uso
     */ 
    public function getUso(): string
    {
        return $this->uso;
    }

    /**
     * Set the value of uso
     */ 
    public function setUso(string $uso)
    {
        $this->uso = $uso;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */ 
    public function setImagen(?string $imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * Get the value of imagen_descripcion
     */ 
    public function getImagenDescripcion(): ?string
    {
        return $this->imagen_descripcion;
    }

    /**
     * Set the value of imagen_descripcion
     */ 
    public function setImagenDescripcion(?string $imagen_descripcion)
    {
        $this->imagen_descripcion = $imagen_descripcion;
    }
}

