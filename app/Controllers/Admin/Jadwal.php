<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $data['jadwal'] = $jadwalModel->getAllJadwal();
        return view('admin/jadwaldonor', $data);
    }

    public function new()
    {
        // dd(date('Y-m-d'));
        $data['validation'] = \config\Services::validation();
        return view('admin/form-jadwal-donor', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $rules = [
            'nama'      => ['rules' => 'required|', 'errors' => ['required' => 'nama kegiatan tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi kegiatan tidak boleh kosong']],
            'provinsi'  => ['rules' => 'required|', 'errors' => ['required' => 'provinsi kegiatan tidak boleh kosong']],
            'kab_kota'  => ['rules' => 'required|', 'errors' => ['required' => 'kab/kota kegiatan tidak boleh kosong']],
            'desc'      => ['rules' => 'required|', 'errors' => ['required' => 'deskripsi kegiatan tidak boleh kosong']],
            'date'      => ['rules' => 'required|', 'errors' => ['required' => 'tanggal kegiatan tidak boleh kosong']],
            'time'      => ['rules' => 'required|', 'errors' => ['required' => 'jam kegiatan tidak boleh kosong']],
            'date_end'  => ['rules' => 'required|', 'errors' => ['required' => 'tanggal batas pendaftaran tidak boleh kosong']],
            'time_end'  => ['rules' => 'required|', 'errors' => ['required' => 'jam batas pendaftaran tidak boleh kosong']],
        ];
        $jadwalModel = new JadwalModel();
        if ($this->validate($rules)) {
            $jadwalModel->save($data);
            return redirect()->to(site_url('admin/jadwal-donor'))->with('message', 'Berhasil menambah jadwal');
        } else {
            $data['validation'] = $this->validator;
            return view('admin/form-jadwal-donor', $data);
        }
    }
}
