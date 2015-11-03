<?php

require __DIR__ . '/../config/autoload.php';

use \Layer\Connector\ConnectorDB as ConnectorDB;
use \Layer\Manager\TableManager;

$connector = ConnectorDB::connect($config['db_name'], $config['db_user'], $config['db_password']);
TableManager::createTables($connector);



//echo $response;
ConnectorDB::connectClose($connector);