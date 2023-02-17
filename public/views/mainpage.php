<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
    <title>FlashCardsApp</title>
</head>
<body>
<header>
    <a href="mainpage">
        <img class="logo" src="public/img/logo.svg">
    </a>
</header>
<main id="main_mainpage">
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
    <div id="flashcards_list">

        <div class="flashcard_list_elem">
            <div class="flashcard_front"><b>Front</b></div>
            <div class="flashcard_back"><b>Back</b></div>
            <div class="flashcard_progress"><b>Progress</b></div>
            <div class="flashcard_flag"><b>Flag</b></div>
        </div>

        <?php foreach ($flashcards as $flashcard): ?>
            <div class="flashcard_list_elem">
                <div class="flashcard_front"><? echo $flashcard->getFront(); ?></div>
                <div class="flashcard_back"><? echo $flashcard->getBack(); ?></div>
                <div class="flashcard_progress"><? echo $flashcard->getProgress(); ?></div>
                <div class="flashcard_flag">
                    <?php if($flashcard->getFlag() == 0) : ?>
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="black" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1V21M1 3H12.2C14.9 3 15.5 4.5 13.6 6.4L12.4 7.6C11.6 8.4 11.6 9.7 12.4 10.4L13.6 11.6C15.5 13.5 14.8 15 12.2 15H1" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    <?php endif; ?>
                    <?php if($flashcard->getFlag() == 1) : ?>
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="red" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1V21M1 3H12.2C14.9 3 15.5 4.5 13.6 6.4L12.4 7.6C11.6 8.4 11.6 9.7 12.4 10.4L13.6 11.6C15.5 13.5 14.8 15 12.2 15H1" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    <?php endif; ?></div>
            </div>
        <?php endforeach;?>

    </div>
</main>
</body>