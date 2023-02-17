<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
    <title>Login page</title>
</head>
<body>
<header>
    <img class="logo" src="public/img/logo.svg">
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
            <div class="flashcard_delete"><b>Delete</b></div>
        </div>

        <?php foreach ($flashcards as $flashcard): ?>
            <div class="flashcard_list_elem">
                <div class="flashcard_front"><? echo $flashcard->getFront(); ?></div>
                <div class="flashcard_back"><? echo $flashcard->getBack(); ?></div>
                <div class="flashcard_progress"><? echo $flashcard->getProgress(); ?></div>
                <div class="flashcard_flag"><? echo $flashcard->getFlag(); ?></div>
                <div class="flashcard_delete"><button>delete</button></div>
            </div>
        <?php endforeach;?>

    </div>
</main>
</body>