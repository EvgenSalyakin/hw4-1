<?php

namespace Layer\Manager;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
abstract class AbstractManager implements ManagerInterface
{
    public function insert($entity)
    {
        $currentDate = new \DateTime();
        $entity->setCreatedAt($currentDate);
    }

    public function update($id, $entity)
    {
        $currentDate = new \DateTime();
        $entity->setUpdatedAt($currentDate);
    }
}
