<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\PmiModel;
use App\Models\StokModel;

class Home extends BaseController
{
    public function index()
    {
        $stok = new StokModel();
        $berita = new BeritaModel();
        $pmi = new PmiModel();
        $data = [
            'stok'      => $stok->getStokByGol(),
            'berita'    => $berita->getOneBerita(),
            'pmi'       => $pmi->findAll()
        ];
        return view('user/dashboard', $data);
    }

    public function faq()
    {
        return view('user/faq');
    }

    public function privasi()
    {
        return view('user/kebijakan');
    }

    public function back()
    {
        return redirect()->back();
    }
}
