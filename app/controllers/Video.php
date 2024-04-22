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
        if ($this->model('Vidstream_model')->addDataVideo($_POST) > 0) {
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
