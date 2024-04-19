<?php


class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header-php/login'); // header php
        $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('login');
        $this->view('templates/footer');
    }
}
