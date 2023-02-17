<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('mainpage', 'MainpageController');

Routing::get('newcard', 'MainpageController');
Routing::get('learn', 'MainpageController');
Routing::get('writing', 'MainpageController');
Routing::get('learncardswithflag', 'MainpageController');

Routing::post('addnewcard', 'CardController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::run($path);