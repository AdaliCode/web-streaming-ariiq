<?php

// Jualan produk
// class
class Vidstream
{
    // property
    public $title = "title", $vid_type = "video type",
        $episodes = "0";
    // method
    public function getLabel()
    {
        // this buat memanggil global atau dalam class
        return "$this->title, $this->vid_type";
    }
}

// object
$vids = new Vidstream();
$vids->title = "Running Man";
$vids->vid_type = "Variety Show Korea";
$vids->episodes = "628";
$vids2 = new Vidstream();
$vids2->title = "Pyramid Game";
$vids2->vid_type = "Drama Korea";
$vids2->episodes = "10";

// var_dump($vids);
echo "<br>Variety Show Korea : " . $vids->getLabel();
echo "<br>";
echo "Drama Korea  : " . $vids->getLabel();
