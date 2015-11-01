<?php

namespace Documents;

class Task extends AbstractDocument implements DocumentInterface
{

    protected $description;

    protected $status;

    protected $processing;

    protected $completion;

    public function __construct($documentNumber, $documentDate, $contractor, $description)
    {
        $this->action = false;
        $this->removed = false;
        $this->documentNumber = $documentNumber;
        $this->documentDate = $documentDate;
        $this->description = $description;
        $this->status = 'new';
        $this->description = $description;
        $this->completion = null;
        $this->processing = null;
        $this->contractor = $contractor;
        $this->documentType = 'Task';
    }

     /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

     /**
     * @return mixed
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCompletion()
    {
        return $this->completion;
    }

    /**
     * @return mixed
     */
    public function getProcessing()
    {
        return $this->processing;
    }

    /**
     * @param null $processing
     */
    public function setProcessing($processing)
    {
        $this->processing = $processing;
    }

    /**
     * @param null $completion
     */
    public function setCompletion($completion)
    {
        $this->completion = $completion;
    }

}