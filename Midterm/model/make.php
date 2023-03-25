<?php
    class VehicleMake {
        private $id, $name;

        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }

        //gets the id
        public function getID() {

            return $this->id;

        }

        //gets the name
        public function getName() {

            return $this->name;

        }

        //sets the id
        public function setID($id) {

            $this->id = $id;

        }

        //sets the name
        public function setName($name) {

            $this->name = $name;

        }
    }

?>