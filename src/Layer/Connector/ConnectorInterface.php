<?php

namespace Layer\Connector;

/**
 * Interface ConnectorInterface
 * @package Layer\Connector
 */
interface ConnectorInterface
{
    /**
     * @param $dataBaseName
     * @param $user
     * @param $password
     * @return mixed
     */
    public static function connect($dataBaseName, $user, $password);

    /**
     * @param $db
     * @return mixed
     */
    public static function connectClose(&$db);
}