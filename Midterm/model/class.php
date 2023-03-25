<?php
    class VehicleClass {

        private $id, $name;

        public function __construct($id, $name) {

            $this->id = $id;
            $this->name = $name;

        }

        //gets the name and ID
        public function getID() {

            return $this->id;

        }

        public function getName() {

            return $this->name;

        }


        //sets the ID and name
        public function setID($id) {

            $this->id = $id;

        }

        public function setName($name) {

            $this->name = $name;

        }
    }

?>