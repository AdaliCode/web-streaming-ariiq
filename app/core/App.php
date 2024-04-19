<?php

class App
{
    public function __construct()
    {
        // http://localhost/phpmvc/public/index.php?url=as
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL()
    {
        // localhost/phpmvc/public/home/index/
        if (isset($_GET['url'])) { // home/index/
            $url = rtrim($_GET['url'], '/'); // menghilangkan last char => home/index
            $url = filter_var($url, FILTER_SANITIZE_URL); // menghilangkan url aneh 
            $url = explode('/', $url); // array(2) { [0]=> string(4) "home" [1]=> string(5) "index" }
            return $url;
        }
    }
}
