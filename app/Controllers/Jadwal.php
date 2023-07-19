<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $data['jadwal'] = $jadwalModel->getAllJadwal();
        return view('user/jadwal', $data);
    }
}
