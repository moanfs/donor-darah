<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DaftarModel;
use App\Models\DonorModel;
use App\Models\PmiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $daftar = new DaftarModel();
        $pmi   = new PmiModel();
        return view('admin/index', [
            'donor'     => $daftar->getTopDonor(),
            'pmi'       => $pmi->getAllPMI(),
        ]);
    }
}
