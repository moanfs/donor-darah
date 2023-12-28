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
        $berita = new BeritaModel();
        $data = $this->request->getPost();

        $rules = [
            'judul'     => ['rules' => 'required|', 'errors' => ['required' => 'judul berita tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi berita tidak boleh kosong']],
            'img'       => ['rules' => 'uploaded[img]|max_size[img,2048]|ext_in[img,png,jpg,jpeg]', 'errors' => ['uploaded' => 'gambar berita tidak boleh kosong', 'max_size' => 'ukuran maksimal 2MB', 'ext_in' => 'file hanya boleh png, jpg dan jpeg']],
            'isi'       => ['rules' => 'required|', 'errors' => ['required' => 'isi berita tidak boleh kosong']],
            'sumber'    => ['rules' => 'required|', 'errors' => ['required' => 'sumber berita tidak boleh kosong']],
        ];

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
            // return view('admin/form-berita', $data);
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $berita = new BeritaModel();
        return view('admin/berita-edit', [
            'berita'        => $berita->find($id),
            'validation'    => \config\Services::validation(),
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $imgnew = $this->request->getFile('img');
        $berita = new BeritaModel();

        $rules = [
            'judul'     => ['rules' => 'required|', 'errors' => ['required' => 'judul berita tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi berita tidak boleh kosong']],
            'isi'       => ['rules' => 'required|', 'errors' => ['required' => 'isi berita tidak boleh kosong']],
            'sumber'    => ['rules' => 'required|', 'errors' => ['required' => 'sumber berita tidak boleh kosong']],
        ];
        $rulesimg = [
            'judul'     => ['rules' => 'required|', 'errors' => ['required' => 'judul berita tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi berita tidak boleh kosong']],
            'img'       => ['rules' => 'uploaded[img]|max_size[img,2048]|ext_in[img,png,jpg,jpeg]', 'errors' => ['uploaded' => 'gambar berita tidak boleh kosong', 'max_size' => 'ukuran maksimal 2MB', 'ext_in' => 'file hanya boleh png, jpg dan jpeg']],
            'isi'       => ['rules' => 'required|', 'errors' => ['required' => 'isi berita tidak boleh kosong']],
            'sumber'    => ['rules' => 'required|', 'errors' => ['required' => 'sumber berita tidak boleh kosong']],
        ];
        if ($imgnew->isValid()) {
            if ($this->validate($rulesimg)) {
                $slug = url_title($data['judul'], '-', true);
                $image = $this->request->getFile('img');
                $gambar = $image->getRandomName();
                $image->move('assets/berita/', $gambar);
                $berita->save([
                    'id_berita' => $id,
                    'judul'     => $data['judul'],
                    'slug'      => $slug,
                    'lokasi'    => $data['lokasi'],
                    'img'       => $gambar,
                    'isi'       => $data['isi'],
                    'sumber'    => $data['sumber'],
                ]);
                return redirect()->back()->with('success', 'Berhasil edit berita');
            }
            return redirect()->back()->with('gagal', 'gagal edit berita, periksa apakah data yang dimasukkan sudah benar');
        } else {
            if ($this->validate($rules)) {
                $slug = url_title($data['judul'], '-', true);
                $berita->save([
                    'id_berita' => $id,
                    'judul'     => $data['judul'],
                    'slug'      => $slug,
                    'lokasi'    => $data['lokasi'],
                    'isi'       => $data['isi'],
                    'sumber'    => $data['sumber'],
                ]);
                return redirect()->back()->with('success', 'Berhasil edit berita');
            }
            return redirect()->back()->with('gagal', 'gagal edit berita, periksa apakah data yang dimasukkan sudah benar');
        }
    }

    public function delete($id)
    {
        $berita = new BeritaModel();
        $berita->delete(['id_berita' => $id]);
        return redirect()->back()->with('message', 'Berhasil Hapus Berita');
    }
}
