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
    <form class="wrap" action="addnewcard" method="post">
        <div class="card">
            <div class="card_half">
                <input name="front" class="newcard_text_field" type="text" placeholder="front">
            </div>
            <div class="card_splitter"></div>
            <div class="card_half">
                <input name="back" class="newcard_text_field" type="text" placeholder="back">
            </div>
        </div>
        <button id="newcard_add_button">add</button>
    </form>

</main>
</body>