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
        if (empty($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
        $data['title'] = 'Tambah Video';
        $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos();
        // $this->view('templates/header-php/index'); // header php
        $this->view('templates/header', $data); // header html
        $this->view('video/add', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if (empty($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
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
        if (empty($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
        if ($this->model('Vidstream_model')->delete($id) > 0) {
            Flasher::setFlash('Video', 'berhasil', 'dihapus', '../../');
            Flasher::flash();
        } else {
            Flasher::setFlash('Video', 'gagal', 'dihapus', '../../');
            Flasher::flash();
        }
    }
    public function edit($id)
    {
        if (empty($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
        $data['title'] = 'Ubah Video';
        $data['data_video_streaming'] = $this->model('Vidstream_model')->getVideoById($id);
        // $this->view('templates/header-php/index'); // header php
        $this->view('templates/header', $data); // header html
        $this->view('video/edit', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if (empty($_SESSION["login"])) {
            header("Location: " . BASEURL);
            exit;
        }
        if ($this->model('Vidstream_model')->update($_POST, $id) > 0) {
            Flasher::setFlash('Video', 'berhasil', 'diubah', '../../');
            Flasher::flash();
        } else {
            Flasher::setFlash('Video', 'gagal', 'diubah', '../../video/edit/' . $id);
            Flasher::flash();
        }
    }

    public function search()
    {
        $data['title'] = 'Hasil Pencarian untuk "' . $_POST['keyword'] . '"';
        $data['data_video_streaming'] = $this->model('Vidstream_model')->search();
        $this->view('templates/header', $data); // header html
        $this->view('index', $data);
        $this->view('templates/footer');
    }
}
