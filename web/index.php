<?php

require __DIR__ . '/../config/autoload.php';

use \Layer\Connector\ConnectorDB as ConnectorDB;
use \Layer\Manager\TableManager;

$connector = ConnectorDB::connect($config['db_name'], $config['db_user'], $config['db_password']);
TableManager::createTables($connector);

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'organizations';
$controllerName = ucfirst($controllerName) . 'Controller';
$controllerName = 'Controllers\\' . $controllerName;

$controller = new $controllerName($connector);

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
$actionName = $actionName . 'Action';

$response = $controller->$actionName();

echo $response;
ConnectorDB::connectClose($connector);