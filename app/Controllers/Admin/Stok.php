<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StokModel;

class Stok extends BaseController
{
    public function index()
    {
        $stok = new StokModel();
        $data['stok'] = $stok->getAllStok();
        return view('admin/stokdarah', $data);
    }

    public function new()
    {
        $data['validation'] = \config\Services::validation();
        return view('admin/form-stok-darah', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $rules = [
            'goldar'    => ['rules' => 'required', 'errors' => ['required' => 'golongan darah harus dipilih']],
            'jumlah'    => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'jumlah kantong darah tidak boleh kosong', 'alpha_numeric' => 'hanya boleh angka']],
            'kab_kota'  => ['rules' => 'required', 'errors' => ['required' => 'kab/kota tidak boleh kosong']],
            'provinsi'  => ['rules' => 'required', 'errors' => ['required' => 'provinsi tidak boleh kosong']],
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
}
