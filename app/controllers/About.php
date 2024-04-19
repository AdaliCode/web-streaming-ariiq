<?php
class About extends Controller
{
    public function index($title = 'Runningman', $type = 'Variety Show')
    {
        echo "Halo, Aku suka $title, Itu adalah $type kesukaanku";
        $data['title'] = 'About';
        $data['vidstream_title'] = 'Runningman';
        $data['vidstream_type'] = 'Variety Show';
        $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('templates/header', $data); //buat method view yang ada di controller
        $this->view('about/page', $data);
        $this->view('templates/footer');
    }
}
