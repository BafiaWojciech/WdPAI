<?php

use models\Flashcard;

require_once __DIR__ . '/../models/Flashcard.php';
require_once 'Repository.php';

class FlashcardRepository extends Repository {
    public function __construct() {
        parent::__constructor();
    }

    public function getFlashcards(): array {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM public.flashcard WHERE user_id = :user_id'
        );
        $stmt->bindParam(':user_id', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $flashcards = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($flashcards as $flashcard) {
            $result[] = new Flashcard(
                $flashcard["front"],
                $flashcard["back"],
                $flashcard["progress"],
                $flashcard["flag"]
            );
        }
        return $result;
    }

    public function addFlashcard(Flashcard $flashcard, $user_id) {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO flashcard (front, back, progress, flag, user_id)
            VALUES (?,?,?,?,?)
            ');
        $stmt->execute([$flashcard->getFront(), $flashcard->getBack(), $flashcard->getProgress(), $flashcard->getFlag(), $user_id]);
    }

    private function decryptIt($x) {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}