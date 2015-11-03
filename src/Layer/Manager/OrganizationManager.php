<?php

namespace Layer\Manager;

class OrganizationManager extends AbstractManager
{
    private $connector;

    public function __construct(\PDO $connector)
    {
        $this->connector = $connector;
    }

    public function findAll($limit = 100, $offset = 0)
    {
        $statement = $this->connector->prepare('SELECT * FROM organizations LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        return $this->fetchOrganizationData($statement);

    }

    private function fetchOrganizationData(\PDOStatement $statement)
    {
        $results = [];
        while ($result = $statement->fetch()) {
            $results[] = [
                'id' => $result['id'],
                'nameOrganization' => $result['nameOrganization'],
                'code' => $result['code'],
                'address' => $result['address'],
                'phone' => $result['phone'],
                'director' => $result['director'],
                'description' => $result['description']
            ];
        }
        return $results;
    }

    public function insert($entity)
    {
        parent::insert($entity);

        $statement = $this->connector->prepare('INSERT INTO organizations (nameOrganization, code, address, director, phone,description) VALUES(:nameOrganization, :code, :address, :director, :phone, :description)');
        $statement->bindValue(':nameOrganization', $entity->getNameOrganization());
        $statement->bindValue(':code', $entity->getCode());
        $statement->bindValue(':address', $entity->getAddress());
        $statement->bindValue(':director', $entity->getDirector());
        $statement->bindValue(':phone', $entity->getPhone());
        $statement->bindValue(':description', $entity->getDescription());

        return $statement->execute();
    }

    public function find($id)
    {
        $statement = $this->connector->prepare('SELECT * FROM organizations WHERE id = :id LIMIT 1');
        $statement->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $statement->execute();
        return $this->fetchOrganizationData($statement);

    }

    public function update($id, $entity)
    {
        parent::update($id, $entity);

        $statement = $this->connector->prepare('UPDATE organizations SET nameOrganization = :nameOrganization, code = :code, address = :address, director = :director, phone = :phone, description = :description WHERE id = :id');
        $statement->bindValue(':nameOrganization', $entity->getNameOrganization());
        $statement->bindValue(':code', $entity->getCode());
        $statement->bindValue(':address', $entity->getAddress());
        $statement->bindValue(':director', $entity->getDirector());
        $statement->bindValue(':phone', $entity->getPhone());
        $statement->bindValue(':description', $entity->getDescription());
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove($id)
    {
        $statement = $this->connector->prepare('DELETE FROM organizations WHERE id = :id');
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}
