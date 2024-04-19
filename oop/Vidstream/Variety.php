<?php
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
