<?php
    // this PHP files contains all data models
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
?>