<?php
    class Vehicle {

        private $make_id, $type_id, $class_id;
        private $year, $model, $price;

        //general constructor for the vehicle class
        public function __construct($make_id, $type_id, $class_id, $year, $model, $price) {

            $this->make_id = $make_id;
            $this->type_id = $type_id;
            $this->class_id = $class_id;
            $this->year = $year;
            $this->model = $model;
            $this->price = $price;

        }

        

        //gets the year, model, and etc for the vehicles
        public function getYear() {

            return $this->year;

        }

        public function getModel() {

            return $this->model;

        }

        public function getPrice() {

            return $this->price;

        }

        public function getType() {

            return $this->type_id;

        }

        public function getClass() {

            return $this->class_id;

        }

         public function getMake() {

            return $this->make_id;

        }

        
        //sets the year, model and etc for the vehicles
        public function setYear($year) {

            $this->year = $year;

        }

        public function setModel($model) {

            $this->model = $model;

        }

        public function setPrice($price) {

            $this->price = $price;

        }

        public function setMake($make_id) {

            $this->make_id = $make_id;

        }


        public function setType($type_id) {

            $this->type_id = $type_id;

        }

        
        

        public function setClass($class_id) {

            $this->class_id = $class_id;

        }

        //formats the price to prevent errors
        public function getFormattedPrice() {

            return '$' . number_format($this->price, 2, '.', ',') . '';

        }
    }

?>