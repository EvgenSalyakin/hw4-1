<?php

namespace Catalogs {

    class Worker extends AbstractCatalog
        {
        protected $nameWorker;

        protected $position;

        protected $subdivision;

        /**
         * @return mixed
         */
        public function getNameWorker()
        {
            return $this->nameWorker;
        }

        /**
         * @param mixed $name
         */
        public function setNameWorker($name)
        {
            $this->nameWorker = $name;
        }

        /**
         * @return mixed
         */
        public function getPosition()
        {
            return $this->position;
        }

        /**
         * @param mixed $position
         */
        public function setPosition($position)
        {
            $this->position = $position;
        }

        /**
         * @return mixed
         */
        public function getSubdivision()
        {
            return $this->subdivision;
        }

        /**
         * @param mixed $subdivision
         */
        public function setSubdivision($subdivision)
        {
            $this->subdivision = $subdivision;
        }


    }
}
