<?php

namespace Layer\Manager;


/**
 * Interface ManagerInterface
 * @package Layer\Manager
 */
interface ManagerInterface
{
    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity);

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @param $id
     * @return mixed
     */
    public function update($id, $entity);

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity);

    /**
     * Search entity data in the DB by Id*
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Search all entity data in the DB
     * @param $limit
     * @param $offset
     * @return array
     */
    public function findAll($limit, $offset);

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
   // public function findBy($entityName, $criteria = []);
}