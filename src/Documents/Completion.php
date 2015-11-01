<?php

namespace Documents;


class Completion extends AbstractDocument implements DocumentInterface
{
    protected $task;

    protected $description;

    protected $status;

    public function __construct($documentNumber, $documentDate, $task, $status, $description)
    {
        $this->action = false;
        $this->removed = false;
        $this->documentNumber = $documentNumber;
        $this->documentDate = $documentDate;
        $this->description = $description;
        $this->task = $task;
        $this->status = $status;
        $this->documentType = 'Completion';
    }

    public function action()
    {
        if ($this->task <> null) {
            if ($this->task->getDocumentType() == 'Task') {
                $this->task->setCompletion($this);
            }
        }
        return parent::action();
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}