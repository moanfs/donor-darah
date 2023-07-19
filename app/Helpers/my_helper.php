<?php

function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('users')->where('id_user', session('id_user'))->get()->getRow();
}

function getPengguna()
{
    $db = \Config\Database::connect();
    return $db->table('users')->countAllResults();
}

function getPendonor()
{
    $db = \Config\Database::connect();
    return $db->table('pendonor')->countAllResults();
}

function getStokDarah()
{
    $db = \Config\Database::connect();
    return $db->table('stok_darah')->countAllResults();
}
