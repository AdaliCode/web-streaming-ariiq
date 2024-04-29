<?php
class Home extends Controller // Home === videos
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['data_video_streaming'] = (isset($_GET['keyword'])) ? $this->model('Vidstream_model')->search() : $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos();
        $this->view('templates/header', $data); // header
        if (isset($_SESSION["login"])) {
            // login, paging
            $jumlahDataPerHalaman = 5;
            $jumlahData = count($data['data_video_streaming']);
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //butuh
            $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1; //butuh
            $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
            $data['data_video_streaming'] = (isset($_GET['keyword'])) ? $this->model('Vidstream_model')->search($awalData, $jumlahDataPerHalaman) : $data['data_video_streaming'] = $this->model('Vidstream_model')->getAllvideos($awalData, $jumlahDataPerHalaman);
            $data['page_component'] = array($jumlahHalaman, $halamanAktif, $awalData);
            $this->view('user/index', $data);
        } else {
            // no login
            for ($i = 0; $i < count($data['data_video_streaming']); $i++) {
                $data['data_video_streaming'][$i]['vid_release'] = $this->indo_date_format($data['data_video_streaming'][$i]['vid_release']);
            }
            $this->view('index', $data);
        }
        $this->view('templates/footer');
    }
}
