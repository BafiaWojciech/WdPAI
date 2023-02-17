<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
    <?php
        $arr = array();
        foreach($flashcards as $flashcard) {
            array_push($arr, array('id'=>$flashcard->getId(), 'front'=>$flashcard->getFront(),
                'back'=>$flashcard->getBack(), 'progress'=>$flashcard->getProgress(), 'flag'=>$flashcard->getFlag()));
        }
    ?>
    <script type='text/javascript'>
        var arr= <?php echo json_encode($arr); ?>;
    </script>
    <script type="text/javascript" src="./public/js/learn.js" defer></script>
    <title>FlashCardsApp</title>

</head>
<body>
<header>
    <a href="mainpage">
        <img class="logo" src="public/img/logo.svg">
    </a>
</header>
<main id="main_newcard">
    <?php include('menubar.php') ?>
    <div class="wrap">
        <div class="control_buttons">
            <div id="stats">
                <img src="public/img/stats.svg">
            </div>
            <div id="delete">
                <img src="public/img/trash.svg">
            </div>
        </div>
        <div class="card">
            <div class="card_half">
                <div id="front"></div>
            </div>
            <div class="card_splitter"></div>
            <div class="card_half">
                <div id="back"></div>
            </div>
        </div>
        <div class="difficulty_buttons">
            <button id="button_again">again</button>
            <button id="button_hard">hard</button>
            <button id="button_easy">easy</button>
        </div>
    </div>
</main>
</body>

