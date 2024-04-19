<?php


class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        // $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}
