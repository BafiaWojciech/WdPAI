<?php include('autologin.php') ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>FlashCardsApp</title>
</head>
<body>
<header>
    <img class="logo" src="public/img/logo.svg">
</header>
<main id="main_login">
    <form class="login" action="login" method="post">
        <input name="username_email" type="text" placeholder="username/email">
        <input name="password" type="password" placeholder="password">
        <button type="submit">Log in</button>
        <div class="login_message">
            <?php if (isset($login_messages)) {
                foreach ($login_messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </form>
    <div class="splitter">
        <hr>
        <span class="or">OR</span>
        <hr>
    </div>
    <form class="login" action="register" method="post">
        <input name="username" type="text" placeholder="username">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <input name="repeate_password" type="password" placeholder="repeate password">
        <div id="privacy_policy_div">
            <input type="checkbox" id="privacy_policy_box" name="privacy_policy_checkbox" value="V">
            <label id="policy_label" for="privacy_policy_box"> I read and accepted <a href="https://google.com"><u>privacy
                        policy</u></a></label><br>
        </div>
        <button type="submit">Sign in</button>
        <div class="signin_message">
            <?php if (isset($signin_messages)) {
                foreach ($signin_messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </form>
</main>
</body>
