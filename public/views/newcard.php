<?php include('user_cookie.php') ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css">
    <title>FlashCardsApp</title>
</head>
<body>
<?php include('header.php') ?>
<main id="main_newcard">
    <?php include('menubar.php') ?>
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
