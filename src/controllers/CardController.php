<?php

use \models\Flashcard;
use repository\UserRepository;

require_once __DIR__.'/../models/Flashcard.php';

class CardController extends AppController {
    public function addnewcard() {
        $front = $_POST["front"];
        $back = $_POST["back"];

        // Tutaj jest poważny błąd, ten problem powinno sie rozwiązać za pomocą tranzakcji !
        $repo = new FlashcardRepository();
        $flashcard = new Flashcard($repo->getNextId(), $front, $back, 0, 0);
        $repo->addFlashcard($flashcard, $this->decryptIt($_COOKIE['user_id']));

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/newcard");
    }

    public function againFlashcard($id) {
        $repo = new FlashcardRepository();
        $repo->againFlashcard($id);
        http_response_code(200);
    }

    public function hardFlashcard($id) {
        $repo = new FlashcardRepository();
        $repo->hardFlashcard($id);
        http_response_code(200);
    }

    public function easyFlashcard($id) {
        $repo = new FlashcardRepository();
        $repo->easyFlashcard($id);
        http_response_code(200);
    }

    public function changeFlag($id) {
        $repo = new FlashcardRepository();
        $repo->changeFlag($id);
        http_response_code(200);
    }

    private function decryptIt($x) {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }

}