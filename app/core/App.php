<?php

class App
{
    // parameter default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // kalau ada file Controller di dalam folder controllers
        if (isset($url[0])) { ///app/controllers/home-> url [0] => home
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]); //home nya hilang dan diambil controllernya
            }
        }

        // ambil controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) { ///app/controllers/home/index-> url [1] => index
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); //method nya hilang dan diambil controllernya
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan cntrl * method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            # code...
            $url = rtrim($_GET['url'], '/'); //menghilangkan last char 
            $url = filter_var($url, FILTER_SANITIZE_URL); //menghilangkan url aneh 
            $url = explode('/', $url);
            return $url;
        }
    }
}
