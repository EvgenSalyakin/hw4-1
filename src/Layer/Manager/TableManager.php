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

        echo 'Create';
        return true;
    }

    public static function tableExists(\PDO $db, $tableName)
    {
        $tableExists = $db->query("SHOW TABLES LIKE '{$tableName}'")->rowCount() > 0;

        return $tableExists;
    }

}
