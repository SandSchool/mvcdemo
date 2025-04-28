<?php
class Database
{
    public static $connection;

    public static function connect()
    {
        if (!self::$connection) {
            $config = require 'config.php';
            $db = $config['db'];

            try {
                self::$connection = new PDO(
                    "mysql:host={$db['host']};dbname={$db['name']};charset=utf8",
                    $db['username'],
                    $db['password']
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
