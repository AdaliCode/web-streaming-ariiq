<?php

// memulai session
if (!session_id()) session_start();
// .. itu artinya keluar dari folder
require_once '../app/init.php';

$app = new App;
