<?php

namespace Documents;

abstract class AbstractDocument implements DocumentInterface
{

    protected $UID;

    protected $documentNumber;
    
    protected $documentDate;

    protected $removed;

    protected $action;

    protected $documentType;

    public function action()
    {
        $this->action = !$this->action;
        return $this->action;
    }

    public function remove()
    {
        $this->removed = !$this->removed;
        $this->action = false;

        return $this->removed;
    }

    function __toString()
    {
        return $this->getDocumentType().' N'.$this->getDocumentNumber().' dated '.$this->getDocumentDate();
    }

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param mixed $documentNumber
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return mixed
     */
    public function getDocumentDate()
    {
        return $this->documentDate;
    }

    /**
     * @param mixed $documentDate
     */
    public function setDocumentDate($documentDate)
    {
        $this->documentDate = $documentDate;
    }

    /**
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param mixed $documentType
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
    }

}