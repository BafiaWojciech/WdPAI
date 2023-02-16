<?php

namespace models;

class Deck {
    public $deck_name;

    public function __construct($name) {
        $this->deck_name = $name;
    }

    public function getName(){
        return $this->deck_name;
    }

    public function setName($deck_name) {
        $this->deck_name = $deck_name;
    }
}