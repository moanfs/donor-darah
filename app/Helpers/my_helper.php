<?php

function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('users')->where('id_user', session('id_user'))->get()->getRow();
}

function adminLogin()
{
    $db = \Config\Database::connect();
    return $db->table('admin')->where('id_admin', session('id_admin'))->get()->getRow();
}

function getPengguna()
{
    $db = \Config\Database::connect();
    return $db->table('users')->countAllResults();
}

function getPendonor()
{
    $db = \Config\Database::connect();
    return $db->table('daftar_donor')->countAllResults();
}

function getStokDarah()
{
    $db = \Config\Database::connect();
    return $db->table('stok_darah')->countAllResults();
}

function getPMI()
{
    $db = \Config\Database::connect();
    return $db->table('pmi')->countAllResults();
}
