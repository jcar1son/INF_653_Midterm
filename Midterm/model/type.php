<?php
    class VehicleType {

        private $id, $name;
        //general constructor or setting the ID and name for the type
        public function __construct($id, $name) {

            $this->id = $id;
            $this->name = $name;

        }

        //sets the ID
        public function setID($id) {

            $this->id = $id;

        }

        //sets the name
        public function setName($name) {

            $this->name = $name;

        }

        //gets the name
        public function getName() {

            return $this->name;

        }

        //gets the name
        public function getID() {

            return $this->id;

        }

    }

?>