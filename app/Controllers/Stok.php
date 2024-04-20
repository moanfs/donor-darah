<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;

class Stok extends BaseController
{
    public function index($slug)
    {
        $stokModel  = new StokModel();
        $data = [
            'stok'      => $stokModel->getStokByGoldar($slug),
            'goldar'    => $stokModel->where('slug', $slug)->limit(1)->get()->getRow()
        ];
        return view('user/stok-darah', $data);
    }
}
