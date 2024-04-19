<?php abstract class Vidstream
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
