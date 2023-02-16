<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>
<body>
<header>
    <img class="logo" src="public/img/logo.svg">
</header>
<main>
    <div class="menu_bar">
        <a href="newcard" class="menu_bar_elem" >
            <div>
                <img class="menu_bar_elem_img" src="public/img/newcard.svg">
                <p class="menu_bar_elem_text">new card</p>
            </div>
        </a>
        <a href="learn" class="menu_bar_elem" >
            <div>
                <img class="menu_bar_elem_img" src="public/img/learn.svg">
                <p class="menu_bar_elem_text">learn</p>
            </div>
        </a>
        <a href="writing" class="menu_bar_elem" >
            <div>
                <img class="menu_bar_elem_img" src="public/img/writing.svg">
                <p class="menu_bar_elem_text">writing</p>
            </div>
        </a>
        <a href="learncardswithflag" class="menu_bar_elem" >
            <div>
                <img class="menu_bar_elem_img" src="public/img/learnwithflag.svg">
                <p class="menu_bar_elem_text">learn cards<br>with flag</p>
            </div>
        </a>
    </div>

    <div class="decks_bar">
        <h2 id="mydecks_header">my decks</h2>
        <hr>
        <?php foreach ($decks as $deck): ?>
            <p class="decktitle"><? echo $deck->getName(); ?></p>
        <?php endforeach;?>

    </div>
    <div class="flashcards_list">

    </div>
</main>
</body>