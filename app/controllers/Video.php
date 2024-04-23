<?php

session_start();
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
            echo
            "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = '../';
             </script>
            ";
        } else {
            echo
            "<script>
                alert('data gagal ditambahkan!');
                document.location.href = '../video/add';
             </script>
            ";
        }
    }
}
