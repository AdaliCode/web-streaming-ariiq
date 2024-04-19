<?php


class Home extends Controller // Home === videos
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos();
        // $this->view('templates/header-php/index'); // header php
        $this->view('templates/header', $data); // header html
        $this->view('index', $data);
        $this->view('templates/footer');
    }
}
