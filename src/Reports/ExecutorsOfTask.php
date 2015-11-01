<?php

namespace Reports {

    class ExecutorsOfTask extends AbstractReport
    {
        protected $task;

        public function printReport()
        {
            echo '<br>' . $this->name . ' (' . $this->task . '): <br>';

            if ($this->task <> null) {
                if ($this->task->getDocumentType() == 'Task') {
                    $workersArray = array();
                    $document = $this->task->getProcessing();
                    while ($document <> null) {
                        $found = false;
                        for ($i = 0; $i < count($workersArray); $i++) {
                            if ($workersArray[$i] == $document->getExecutor()) {
                                $found = true;
                                break;
                            }
                        }
                        if (!$found) {
                            $workersArray[] = $document->getExecutor();
                        }
                        $document = $document->getProcessing();
                    }
                    for ($i = 0; $i < count($workersArray); $i++) echo $workersArray[$i]->getName() . '<br>';
                }
            }
            if ($this->task->getCompletion() == null) {
                echo '<br>' . 'The task is not complet.' . '<br>';
            } else {
                echo '<br>' .'The task complet with status ' . $this->task->getCompletion()->getStatus() . '.'. '<br>';
            }
        }

        public function __construct()
        {
            $this->name = 'Executors of task';
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

    }
}
