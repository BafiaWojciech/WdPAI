<?php

use \models\Flashcard;
use repository\UserRepository;

require_once __DIR__.'/../models/Flashcard.php';

class CardController extends AppController {
    public function addnewcard() {
        $front = $_POST["front"];
        $back = $_POST["back"];

        $flashcard = new Flashcard($front, $back, 0, 0);
        $repo = new FlashcardRepository();
        $repo->addFlashcard($flashcard, $this->decryptIt($_COOKIE['user_id']));

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/newcard");
    }

    private function decryptIt($x) {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}