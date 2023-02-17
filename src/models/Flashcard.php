<?php

namespace models;

class Flashcard {
    private $front;
    private $back;
    private $progress;
    private $flag;

    public function __construct($front, $back, $progress, $flag) {
        $this->front = $front;
        $this->back = $back;
        $this->progress = $progress;
        $this->flag = $flag;
    }

    //getters
    public function getFront() {
        return $this->front;
    }

    public function getBack() {
        return $this->back;
    }

    public function getProgress() {
        return $this->progress;
    }

    public function getFlag() {
        return $this->flag;
    }

    //setters
    public function setFront($front) {
        $this->front = $front;
    }

    public function setBack($back) {
        $this->back = $back;
    }

    public function setProgress($progress) {
        $this->progress = $progress;
    }

    public function setFlag($flag) {
        $this->flag = $flag;
    }


}