<?php

class Video extends Controller // Home === videos
{
    public function detail($id)
    {
        $data['data_video_streaming'] = $this->model('Vidstream_model')->getVideoById($id);
        $data['title'] = $data['data_video_streaming']['title'];
        $this->view('templates/header', $data); // header html
        $this->view('video/detail', $data);
        $this->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Tambah Video';
        $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos();
        // $this->view('templates/header-php/index'); // header php
        $this->view('templates/header', $data); // header html
        $this->view('video/add', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if ($this->model('Vidstream_model')->store($_POST) > 0) {
            Flasher::setFlash('Video', 'berhasil', 'ditambahkan', '../');
            Flasher::flash();
        } else {
            Flasher::setFlash('Video', 'gagal', 'ditambahkan', '../video/add');
            Flasher::flash();
        }
    }

    public function delete($id)
    {
        if ($this->model('Vidstream_model')->delete($id) > 0) {
            Flasher::setFlash('Video', 'berhasil', 'dihapus', '../../');
            Flasher::flash();
        } else {
            Flasher::setFlash('Video', 'gagal', 'dihapus', '../../');
            Flasher::flash();
        }
    }
}
