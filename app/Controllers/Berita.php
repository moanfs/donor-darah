<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        $berita = new BeritaModel();
        $data['berita'] = $berita->getAllBerita();
        return view('user/berita', $data);
    }

    public function lihatberita($id, $slug)
    {
        $berita = new BeritaModel();
        $data = [
            'beritalain' => $berita->getBeritalain($id),
            'berita' => $berita->getBacaBerita($id)
        ];

        return view('user/lihat_berita', $data);
    }
}
