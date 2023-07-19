<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\StokModel;

class Home extends BaseController
{
    public function index()
    {
        $stok = new StokModel();
        $berita = new BeritaModel();
        $data = [
            'stok' => $stok->getAllStok(),
            'berita'    => $berita->getOneBerita()
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
