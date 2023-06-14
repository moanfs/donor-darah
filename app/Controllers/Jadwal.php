<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jadwal extends BaseController
{
    public function index()
    {
        return view('user/jadwal');
    }
}
