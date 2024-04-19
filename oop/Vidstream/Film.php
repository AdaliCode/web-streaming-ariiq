<?php
class Film extends Vidstream
{
    public function getInfo()
    {
        // :: adalah method static
        $str = "Nama Film : " . $this->getInfoVidstream();
        return $str;
    }
}
