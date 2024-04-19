<?php
// // class
// require_once 'Vidstream/Vidstream.php';
// // inheritance class
// require_once 'Vidstream/Film.php';
// require_once 'Vidstream/Series.php';
// require_once 'Vidstream/Variety.php';

spl_autoload_register(function ($class) {
    require_once __DIR__ . '/Vidstream/' . $class . '.php';
});


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
