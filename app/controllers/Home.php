<?php


class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $this->view('templates/header-php/index'); // header php
        $this->view('templates/header', $data); // header html
        $this->view('index');
        $this->view('templates/footer');
    }
}
