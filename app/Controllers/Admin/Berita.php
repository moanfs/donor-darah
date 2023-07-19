<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        $berita = new BeritaModel();
        $data['berita'] = $berita->getAllBerita();
        return view('admin/berita', $data);
    }

    public function new()
    {
        $data['validation'] = \config\Services::validation();
        return view('admin/form-berita', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $rules = [
            'judul'     => ['rules' => 'required|', 'errors' => ['required' => 'judul berita tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi berita tidak boleh kosong']],
            'img'       => ['rules' => 'uploaded[img]|max_size[img,2048]|ext_in[img,png,jpg,jpeg]', 'errors' => ['uploaded' => 'gambar berita tidak boleh kosong', 'max_size' => 'ukuran maksimal 2MB', 'ext_in' => 'file hanya boleh png, jpg dan jpeg']],
            'isi'       => ['rules' => 'required|', 'errors' => ['required' => 'isi berita tidak boleh kosong']],
            'sumber'    => ['rules' => 'required|', 'errors' => ['required' => 'sumber berita tidak boleh kosong']],
        ];
        $berita = new BeritaModel();
        if ($this->validate($rules)) {
            $slug = url_title($data['judul'], '-', true);
            $image = $this->request->getFile('img');
            $gambar = $image->getRandomName();
            $image->move('assets/berita/', $gambar);
            $berita->save([
                'judul'     => $data['judul'],
                'slug'      => $slug,
                'lokasi'    => $data['lokasi'],
                'img'       => $gambar,
                'isi'       => $data['isi'],
                'sumber'    => $data['sumber'],
            ]);
            return redirect()->to(site_url('admin/berita'))->with('message', 'Berhasil menambah berita');
        } else {
            $data['validation'] = $this->validator;
            return view('admin/form-berita', $data);
        }
    }
}
