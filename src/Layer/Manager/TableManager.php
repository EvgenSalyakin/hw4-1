<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 01.11.15
 * Time: 13:22
 */

namespace Layer\Manager;


class TableManager
{
    public static function createTables(\PDO $db)
    {

        if (!self::tableExists($db, 'organizations')) {
            try {
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Error Handling
                $sql = '
                CREATE TABLE IF NOT EXISTS `organizations` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                code INT NOT NULL,
                description VARCHAR( 250 ),
                nameOrganization VARCHAR(50) NOT NULL,
                address VARCHAR( 250 ),
                director VARCHAR( 250 ),
                phone VARCHAR(50)
                )
                ';
                $statement = $db->prepare($sql);
                $statement->execute();


            } catch (\PDOException $e) {
                echo $e->getMessage();

            }
        }

        if (!self::tableExists($db, 'workers')) {
            try {
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Error Handling
                $sql = '
                CREATE TABLE IF NOT EXISTS `workers` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                description VARCHAR( 250 ),
                nameWorker VARCHAR(150) NOT NULL,
                position VARCHAR( 250 ),
                subdivision VARCHAR( 250 )
                )
                ';
                $statement = $db->prepare($sql);
                $statement->execute();


            } catch (\PDOException $e) {
                echo $e->getMessage();

            }
        }
        return true;
    }

    public static function tableExists(\PDO $db, $tableName)
    {
        $tableExists = $db->query("SHOW TABLES LIKE '{$tableName}'")->rowCount() > 0;

        return $tableExists;
    }

}
