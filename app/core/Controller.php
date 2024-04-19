<?php

// controller utama pengatur semua controller
class Controller
{
    // buat method view untuk dapat view
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
