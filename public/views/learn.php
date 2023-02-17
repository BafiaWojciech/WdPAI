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
    <div class="menu_bar">
        <a href="newcard" class="menu_bar_elem" >
            <img class="menu_bar_elem_img" src="public/img/newcard.svg">
        </a>
        <p class="menu_bar_elem_text">new card</p>
        <a href="learn" class="menu_bar_elem" >
            <img class="menu_bar_elem_img" src="public/img/learn.svg">
        </a>
        <p class="menu_bar_elem_text">learn</p>
        <a href="writing" class="menu_bar_elem" >
            <img class="menu_bar_elem_img" src="public/img/writing.svg">
        </a>
        <p class="menu_bar_elem_text">writing</p>
        <a href="learncardswithflag" class="menu_bar_elem" >
            <img class="menu_bar_elem_img" src="public/img/learnwithflag.svg">
        </a>
        <p class="menu_bar_elem_text">learn cards<br>with flag</p>
    </div>

    <div class="wrap">
        <div class="card" onclick="showback()">
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

