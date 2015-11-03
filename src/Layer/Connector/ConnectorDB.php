<?php

namespace Layer\Connector;

class ConnectorDB implements ConnectorInterface
{
    private static $dsn = null;


    public static function connect($dataBaseName, $user, $password)
    {
        if (self::$dsn == null) {
            try {
                $conn = new \PDO('mysql:host=localhost;dbname=' . $dataBaseName . ';charset=UTF8', $user, $password);
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$dsn = $conn;

                return self::$dsn;

            } catch (\PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();

                return false;
            }
        } else {

            return self::$dsn;
        }

    }

    public static function connectClose(&$db)
    {
        if (($db instanceof \PDO) && ($db === self::$dsn)) {
            $db = null;
            self::$dsn = null;

            return true;

        } else {
            echo "wrong argument";

            return false;
        }
    }
}