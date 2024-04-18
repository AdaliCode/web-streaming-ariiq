<?php
// class
abstract class Vidstream
{
    const web_name = 'AFLIX';
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

    // abstract can't contain body, and must exist in the child
    abstract public function getInfo();
    public function getInfoVidstream()
    {
        $str = "{$this->title} | Pemeran : {$this->getCast()} ";
        return $str;
    }
}
// inheritance class
class Film extends Vidstream
{
    public function getInfo()
    {
        // :: adalah method static
        $str = "Nama Film : " . $this->getInfoVidstream();
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
    public function getinfo()
    {
        $str = "Nama Series : " . $this->getInfoVidstream() . "| Episode :{$this->episodes} ";
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
    public function getInfo()
    {
        $str = "Nama Series : " . $this->getInfoVidstream() . "| Episode :{$this->episodes} ";
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

echo 'Nama Web : ' . Vidstream::web_name . "<br>";
echo '==================================<br>';
echo $vids->getInfo() . "<br>";
echo $vids2->getInfo() . "<br>";
echo $vids3->getInfo() . "<br>";


$vids->setepisodesExtra(28);
echo $vids->getEpisode();

// $infovids = new CetakInfoVidstream();
// echo $infovids->cetak($vids2);
