<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\WilayahModel;

class Jadwal extends BaseController
{

    public function index()
    {
        $wilayah = new WilayahModel();
        $jadwalModel = new JadwalModel();

        $data = [
            'jadwal' => $jadwalModel->getAllDonor(),
            'provinsi'  => $wilayah->AllProvinsi()
        ];
        return view('admin/jadwaldonor', $data);
    }

    public function new()
    {
        $wilayah = new WilayahModel();
        $data = [
            'validation' => \config\Services::validation(),
            'provinsi'  => $wilayah->AllProvinsi(),
        ];
        return view('admin/form-jadwal-donor', $data);
    }

    public function save()
    {
        $jadwalModel = new JadwalModel();
        $data = $this->request->getPost();
        $slug = url_title($data['nama'], '-', true);
        $rules = [
            'nama'      => ['rules' => 'required|', 'errors' => ['required' => 'nama kegiatan tidak boleh kosong']],
            'lokasi'    => ['rules' => 'required|', 'errors' => ['required' => 'lokasi kegiatan tidak boleh kosong']],
            'provinsi'  => ['rules' => 'required|', 'errors' => ['required' => 'provinsi kegiatan tidak boleh kosong']],
            'kabupaten' => ['rules' => 'required|', 'errors' => ['required' => 'kab/kota kegiatan tidak boleh kosong']],
            'desc'      => ['rules' => 'required|', 'errors' => ['required' => 'deskripsi kegiatan tidak boleh kosong']],
            'date'      => ['rules' => 'required|', 'errors' => ['required' => 'tanggal kegiatan tidak boleh kosong']],
            'time'      => ['rules' => 'required|', 'errors' => ['required' => 'jam kegiatan tidak boleh kosong']],
            'date_end'  => ['rules' => 'required|', 'errors' => ['required' => 'tanggal batas pendaftaran tidak boleh kosong']],
            'time_end'  => ['rules' => 'required|', 'errors' => ['required' => 'jam batas pendaftaran tidak boleh kosong']],
        ];

        if ($this->validate($rules)) {
            $jadwalModel->save([
                'nama'      => $data['nama'],
                'slug'      => $slug,
                'lokasi'    => $data['lokasi'],
                'provinsi'  => $data['provinsi'],
                'kab_kota'  => $data['kabupaten'],
                'desc'      => $data['desc'],
                'date'      => $data['date'],
                'time'      => $data['time'],
                'date_end'  => $data['date_end'],
                'time_end'  => $data['time_end'],
            ]);
            return redirect()->to(site_url('admin/jadwal-donor'))->with('message', 'Berhasil menambah jadwal');
        } else {
            $data['validation'] = $this->validator;
            return view('admin/form-jadwal-donor', $data);
        }
    }

    public function edit($id)
    {
        $wilayah = new WilayahModel();
        $jadwal = new JadwalModel();
        $data = [
            'validation' => \config\Services::validation(),
            'provinsi'  => $wilayah->AllProvinsi(),
            'jadwal'    => $jadwal->getJadwal($id),

        ];
        return view('admin/edit-jadwal-donor', $data);
    }

    public function kabupaten()
    {
        $wilayah = new WilayahModel();
        $provinsi = $this->request->getPost('provinsi');
        $kab = $wilayah->AllKabupaten($provinsi);
        echo '<option value="">Pilih Kabupaten/Kota</option>';
        foreach ($kab as  $value) {
            echo "<option value=" . $value->id . ">" . $value->name . "</option>";
        }
    }

    public function editkabupaten()
    {
        $wilayah = new WilayahModel();
        $provinsi = $this->request->getPost('provinsi');
        $kab = $wilayah->AllKabupaten($provinsi);
        echo '<option value="">Pilih Kabupaten/Kota</option>';
        foreach ($kab as  $value) {
            echo "<option value=" . $value->id . ">" . $value->name . "</option>";
        }
    }
}
