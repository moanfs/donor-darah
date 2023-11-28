<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DonorModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $donor = new DonorModel();
        return view('admin/index', [
            'donor'     => $donor->getNewPendonor(),
        ]);
    }
}
