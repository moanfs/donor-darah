<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StokModel;
use App\Models\WilayahModel;

class Stok extends BaseController
{
    public function index()
    {
        $stok = new StokModel();
        $wilayah = new WilayahModel();
        $data = [
            'stok' => $stok->getAllStok()
        ];
        return view('admin/stokdarah', $data);
    }

    public function new()
    {
        $wilayah = new WilayahModel();
        $data = [
            'validation' => \config\Services::validation(),
            'kabupaten'  => $wilayah->AllKabupaten(),
        ];
        return view('admin/form-stok-darah', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $rules = [
            'goldar'    => ['rules' => 'required', 'errors' => ['required' => 'golongan darah harus dipilih']],
            'jumlah'    => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'jumlah kantong darah tidak boleh kosong', 'alpha_numeric' => 'hanya boleh angka']],
            'kab_kota'  => ['rules' => 'required', 'errors' => ['required' => 'kab/kota tidak boleh kosong']],
            'nama_pmi'  => ['rules' => 'required', 'errors' => ['required' => 'Nama PMI tidak boleh kosong']],
            // 'provinsi'  => ['rules' => 'required', 'errors' => ['required' => 'provinsi tidak boleh kosong']],
        ];
        if ($this->validate($rules)) {
            $stok = new StokModel();
            $stok->save($data);
            return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil ditambah');
        } else {
            $data['validation'] = $this->validator;
            return view('admin/form-stok-darah', $data);
        }
    }

    public function show($id)
    {
        $stok = new StokModel();
        return view('admin/stokdarah-show', [
            'darah' => $stok->find($id),
            // 'provinsi'  => 
        ]);
    }

    public function edit($id)
    {
        $stok = new StokModel();
        $wilayah = new WilayahModel();
        return view('admin/stokdarah-edit', [
            'darah' => $stok->find($id),
            'validation' => \config\Services::validation(),
            'kabupaten'  => $wilayah->AllKabupaten(),
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $stok = new StokModel();
        $wilayah = new WilayahModel();
        $rules = [
            'goldar'    => ['rules' => 'required', 'errors' => ['required' => 'golongan darah harus dipilih']],
            'jumlah'    => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'jumlah kantong darah tidak boleh kosong', 'alpha_numeric' => 'hanya boleh angka']],
            'kab_kota'  => ['rules' => 'required', 'errors' => ['required' => 'kab/kota tidak boleh kosong']],
            'nama_pmi'  => ['rules' => 'required', 'errors' => ['required' => 'Nama PMI tidak boleh kosong']],
            // 'provinsi'  => ['rules' => 'required', 'errors' => ['required' => 'provinsi tidak boleh kosong']],
        ];
        if ($this->validate($rules)) {

            $stok->save([
                'id_darah'  => $id,
                'goldar'    => $data['goldar'],
                'jumlah'    => $data['jumlah'],
                'kab_kota'  => $data['kab_kota'],
                'nama_pmi'  => $data['nama_pmi']
            ]);
            return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil ditambah');
        } else {
            $data = [
                'darah' => $stok->find($id),
                'validation' => $this->validator,
                'kabupaten'  => $wilayah->AllKabupaten(),
            ];
            return view('admin/stokdarah-edit', $data);
        }
    }
}
