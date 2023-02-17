<?php

require_once __DIR__.'/../repository/FlashcardRepository.php';
require_once 'AppController.php';

class MainpageController extends AppController {

    private $flashcards;

    public function __constructor() {
        parent::__constructor();
        $this->flashcards = new FlashcardRepository();
    }

    public function mainpage() {
        $this->flashcards = new FlashcardRepository();
        $tmp = $this->flashcards->getFlashcards();
        $this->render('mainpage', ['flashcards'=>$tmp]);
    }

    public function newcard() {
        $this->render('newcard');
    }

    public function learn() {
        $this->render('learn');
    }

    public function writing() {
        $this->render('writing');
    }

    public function learncardswithflag() {
        $this->render('learncardswithflag');
    }
}