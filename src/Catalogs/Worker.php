<?php

namespace Catalogs {

    class Worker extends AbstractCatalog
        {
        protected $name;

        protected $position;

        protected $subdivision;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
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
