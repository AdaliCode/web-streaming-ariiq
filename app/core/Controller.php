<?php

// controller utama pengatur semua controller
class Controller
{
    // change datetime to indo format
    function indo_date_format($time): string
    {
        $month = array(
            1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $time_array = explode('-', $time);
        return $time_array[2] . ' ' . $month[(int)$time_array[1]] . ', ' . $time_array[0];
    }
    // buat method view untuk dapat view
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
