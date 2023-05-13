<?php
// Clase para conexión a la base de datos

class DB
{
    public const DB_HOST = 'localhost';
    public const DB_USER = 'root';
    public const DB_PASS = '';
    public const DB_NAME = 'dw3_iriarte_inaki';

    /**
     * Obtiene la conexión a la base de datos.
     * 
     * @return PDO
     */
    public function getConexion(): PDO
    {
        $db_dsn = 'mysql:host=' . DB::DB_HOST . ';dbname=' . DB::DB_NAME . ';charset=utf8mb4';

        try {
            $db = new PDO($db_dsn, DB::DB_USER, DB::DB_PASS);

            return $db;
        } catch (Exception $e) {
            exit;
        }
    }
}