<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\DaftarDonor;
use App\Models\DaftarModel;
use App\Models\PendaftarModel;

class Pendaftar extends BaseController
{
    public function index()
    {
        $daftar = new DaftarModel();
        return view('admin/pendaftar', [
            'data'  => $daftar->getPendaftar(),
        ]);
    }
}
