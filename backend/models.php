<?php
    // this PHP files contains all the data models
    // uses class to represent the data models

    class User {
        public $firstName;
        public $lastName;
        public $email;
        public $password;

        public function __construct($firstName, $lastName, $email, $password) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }        
    }

    class Smartphone {
        public $brand;
        public $model;
        public $screen;
        public $os;
        public $chipset;
        public $GPU;
        public $RAM;
        public $storage;
        public $price;

        public function __construct($brand, $model, $screen, $os, $chipset, $GPU, $RAM, $storage, $price) {
            $this->brand = $brand;
            $this->model = $model;
            $this->screen = $screen;
            $this->os = $os;
            $this->chipset = $chipset;
            $this->GPU = $GPU;
            $this->RAM = $RAM;
            $this->storage = $storage;
            $this->price = $price;
        } 
    }
    class Laptop {
        public $brand;
        public $model;
        public $os;
        public $processor;
        public $RAM;
        public $storage;
        public $price;

        public function __construct($brand, $model, $os, $processor, $RAM, $storage, $price) {
            $this->brand = $brand;
            $this->model = $model;
            $this->os = $os;
            $this->processor = $processor;
            $this->RAM = $RAM;
            $this->storage = $storage;
            $this->price = $price;
        } 
    }
    class Tablet {
        public $brand;
        public $model;
        public $screen;
        public $processor;
        public $RAM;
        public $storage;
        public $batteryLife;
        public $os;
        public $price;

        public function __construct($brand, $model, $screen, $processor, $RAM, $storage, $batteryLife, $os, $price) {
            $this->brand = $brand;
            $this->model = $model;
            $this->screen = $screen;
            $this->processor = $processor;
            $this->RAM = $RAM;
            $this->storage = $storage;
            $this->batteryLife = $batteryLife;
            $this->os = $os;
            $this->price = $price;
        } 
    }
?>