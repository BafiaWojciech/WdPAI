<?php
require_once "AppController.php";

class CookieController extends AppController
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function delete_cookie()
    {
        setcookie('user_id', "", -3600, "/");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }
}