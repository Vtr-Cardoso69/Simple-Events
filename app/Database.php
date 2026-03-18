<?php

class Database
{
    public static function conectar(): PDO
    {
        $host = "localhost";
        $banco = "eventosdb";
        $usuario = "root";
        $senha = "";

        $dsn = "mysql:host=$host;dbname=$banco;charset=utf8mb4";

        return new PDO(
            $dsn,
            $usuario,
            $senha,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    }
}