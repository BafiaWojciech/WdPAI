<?php

require_once __DIR__.'/../repository/DeckRepository.php';
require_once 'AppController.php';

class MainpageController extends AppController {

    private $decks;

    public function __constructor() {
        parent::__constructor();
        $this->decks = new DeckRepository();
    }

    public function mainpage() {
        $this->decks = new DeckRepository();
        $tmp = $this->decks->getDeckName();
        $this->render('mainpage', ['decks'=>$tmp]);
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