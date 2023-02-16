<?php

use models\Deck;

require_once __DIR__.'/../models/Deck.php';
require_once 'Repository.php';

class DeckRepository extends Repository {

    public function __construct()
    {
        parent::__constructor();
    }

    public function getDeckName(): array {
        $stmt = $this->database->connect()->prepare(
            'SELECT deck_name FROM public.deck WHERE user_id = :user_id'
        );
        $stmt->bindParam(':user_id', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($tmp as $deck) {
            $result[] = new Deck(
                $deck["deck_name"]
            );
        }
        return $result;
    }

    private function decryptIt($x) {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}