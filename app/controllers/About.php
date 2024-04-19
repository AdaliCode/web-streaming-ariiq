<?php
class About
{
    public function index($title = 'Runningman', $type = 'Variety Show')
    {
        echo "Halo, Aku suka $title, Itu adalah $type kesukaanku";
    }
    public function page()
    {
        echo 'About/page';
    }
}
