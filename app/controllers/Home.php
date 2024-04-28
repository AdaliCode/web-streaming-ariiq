<?php
class Home extends Controller // Home === videos
{
    public function index()
    {
        $data['title'] = 'Home';
        if (isset($_GET['keyword'])) {
            $data['data_video_streaming'] = $this->model('Vidstream_model')->search();
        } else {
            $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos();
        }
        $jumlahDataPerHalaman = 5;
        $jumlahData = count($data['data_video_streaming']);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //butuh
        $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1; //butuh
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
        if (isset($_GET['keyword'])) {
            $data['data_video_streaming'] = $this->model('Vidstream_model')->search($awalData, $jumlahDataPerHalaman);
        } else {
            $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos($awalData, $jumlahDataPerHalaman);
        }
        $data['page_component'] = array($jumlahHalaman, $halamanAktif, $awalData);
        $this->view('templates/header', $data); // header html
        $this->view('index', $data);
        $this->view('templates/footer');
    }
}
