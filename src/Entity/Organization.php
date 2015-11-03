<?php

namespace Entity;

class Organization extends AbstractCatalog
{

    protected $nameOrganization;

    protected $address;

    protected $director;

    protected $phone;

     /**
     * @return mixed
     */
    public function getNameOrganization()
    {
        return $this->nameOrganization;
    }

    /**
     * @param mixed $name
     */
    public function setNameOrganization($name)
    {
        $this->nameOrganization = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

}