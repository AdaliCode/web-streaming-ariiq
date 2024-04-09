<?php
// class
class Vidstream
{
    // property
    public $title, $vid_type, $cast, $episodes;
    // variabel lokal
    public function __construct($title = "title", $vid_type = "vid_type", $cast = "cast", $episodes = "0")
    {
        $this->title = $title;
        $this->cast = $cast;
        $this->vid_type = $vid_type;
        $this->episodes = $episodes;
    }
    // method
    public function getCast()
    {
        // this buat memanggil global atau dalam class
        return "$this->cast";
    }
}

// class yang mengambil data dari class atasan
// cetak class
class CetakInfoVidstream
{
    // instance dari class Vidstream
    public function cetak(Vidstream $vstream)
    {
        $str = "Jdul : {$vstream->title} | Tipe :  {$vstream->vid_type} |  Pemeran : {$vstream->getCast()}";
        return $str;
    }
}

// object
$vids = new Vidstream("Running Man", "Variety Show Korea", "Song Jihyo, Yoo Jae Suk", "628");
$vids2 = new Vidstream("Pyramid Game", "Drama Korea", "Bona WJSN, Kim Da Ah", "10");

$infovids = new CetakInfoVidstream();
echo $infovids->cetak($vids2);
