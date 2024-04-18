<?php
// class
class Vidstream
{
    // property
    public $title, $cast;
    protected $extraEpisode;
    public function __construct($title = "title", $cast = "cast")
    {
        $this->title = $title;
        $this->cast = $cast;
    }
    public function getCast()
    {
        return "$this->cast";
    }

    public function getInfoVidstream()
    {
        $str = "{$this->title} | Pemeran : {$this->getCast()} ";
        return $str;
    }
}

// inheritance class
class Film extends Vidstream
{
    public function getInfoVidstream()
    {
        // :: adalah method static
        $str = "Nama Film : " . parent::getInfoVidstream();
        return $str;
    }
}
class Series extends Vidstream
{
    public $episodes;
    public function __construct($title = "title", $cast = "cast", $episodes = 0)
    {
        parent::__construct($title, $cast);
        $this->episodes = $episodes;
    }
    public function getInfoVidstream()
    {
        $str = "Nama Series : " . parent::getInfoVidstream() . "| Episode :{$this->episodes} ";
        return $str;
    }
}
class Variety extends Vidstream
{
    private $episodes;
    protected $episodesExtra;
    // protected itu dengan class dan turunannya
    // private itu dengan classnya doang
    public function getEpisode()
    {
        return "Episode " . $this->title  . " setelah ditambah episodenya dengan " . $this->episodesExtra . " adalah " . $this->episodes + $this->episodesExtra;
    }
    public function __construct($title = "title", $cast = "cast", $episodes = 0)
    {
        parent::__construct($title, $cast);
        $this->episodes = $episodes;
    }

    // bisa diaplikasikan ke inherritance lain
    public function setepisodesExtra($episodesExtra)
    {
        $this->episodesExtra = $episodesExtra;
    }
    public function getInfoVidstream()
    {
        $str = "Nama Series : " . parent::getInfoVidstream() . "| Episode :{$this->episodes} ";
        return $str;
    }
}
// class yang mengambil data dari class atasan
// cetak class
// class CetakInfoVidstream
// {
//     // instance dari class Vidstream
//     public function cetak(Vidstream $vstream)
//     {
//         $str = "Jdul : {$vstream->title} | Pemeran : {$vstream->getCast()}";
//         return $str;
//     }
// }

// object
$vids = new Variety("Running Man", "Song Jihyo, Yoo Jae Suk", 600);
$vids2 = new Series("Pyramid Game", "Bona WJSN, Kim Da Ah", 10);
$vids3 = new Film("The Beekeeper", "Jason Statham");

echo $vids->getInfoVidstream() . "<br>";
echo $vids2->getInfoVidstream() . "<br>";
echo $vids3->getInfoVidstream() . "<br>";


$vids->setepisodesExtra(28);
echo $vids->getEpisode();

// $infovids = new CetakInfoVidstream();
// echo $infovids->cetak($vids2);
