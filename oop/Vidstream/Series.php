<?php
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
