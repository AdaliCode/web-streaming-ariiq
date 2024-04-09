<?php
// class
class Vidstream
{
    // property
    public $title, $cast, $episodes;
    // variabel lokal
    public function __construct($title = "title", $cast = "cast", $episodes = "0")
    {
        $this->title = $title;
        $this->cast = $cast;
        $this->episodes = $episodes;
    }
    // method
    public function getCast()
    {
        // this buat memanggil global atau dalam class
        return "$this->cast";
    }

    public function getInfoVidstream()
    {
        $str = "Nama Series : {$this->title} | Pemeran : {$this->getCast()} | Episode {$this->episodes}";
        return $str;
    }
}

// inheritance class
class Film extends Vidstream
{
    public function getInfoVidstream()
    {
        $str = "Nama Film : {$this->title} | Pemeran : {$this->getCast()}";
        return $str;
    }
}
// class yang mengambil data dari class atasan
// cetak class
class CetakInfoVidstream
{
    // instance dari class Vidstream
    public function cetak(Vidstream $vstream)
    {
        $str = "Jdul : {$vstream->title} |  Pemeran : {$vstream->getCast()}";
        return $str;
    }
}

// object
$vids = new Vidstream("Running Man", "Song Jihyo, Yoo Jae Suk", "628");
$vids2 = new Vidstream("Pyramid Game", "Bona WJSN, Kim Da Ah", "10");
$vids3 = new Film("The Beekeeper", "Jason Statham");

echo $vids->getInfoVidstream() . "<br>";
echo $vids2->getInfoVidstream() . "<br>";
echo $vids3->getInfoVidstream() . "<br>";

// $infovids = new CetakInfoVidstream();
// echo $infovids->cetak($vids2);
