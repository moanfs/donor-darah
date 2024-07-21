<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PmiModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $pmi = new PmiModel();

        $data = [
            'jadwal'        => $jadwalModel->getAllJadwal(),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI(),
        ];
        return view('admin/jadwal-donor', $data);
    }

    public function new()
    {
        $pmi = new PmiModel();
        $data = [
            'validation'    => \config\Services::validation(),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI(),
        ];
        return view('admin/jadwal-donor-form', $data);
    }

    public function save()
    {
        $pmi = new PmiModel();
        $jadwalModel = new JadwalModel();

        $petugas = $pmi->getPMI();
        $pilihan = $this->request->getVar('pilihan');
        $darah['pilihan'] = serialize($pilihan);
        $data = $this->request->getPost();
        // dd($data);
        $slug = url_title($data['nama_kegiatan'], '-', true);
        // validasi rules
        $rules = [
            'nama_kegiatan'     => ['rules' => 'required|', 'errors' => ['required' => 'nama kegiatan tidak boleh kosong']],
            'lokasi'            => ['rules' => 'required|', 'errors' => ['required' => 'lokasi kegiatan tidak boleh kosong']],
            // 'kontak2'           => ['rules' => 'integer|min_length[8]|max_length[13]', 'errors' => ['integer' => 'kontak 2 hanya boleh angka', 'min_length' => 'kontak minimal 6 Angka dan Makasimal 13', 'max_length' => 'kontak minimal 6 Angka dan Makasimal 13']],
            'pilihan'           => ['rules' => 'required|', 'errors' => ['required' => 'Golongan darah tidak boleh kosong pilih minimal satu']],
            'alamat_kegiatan'   => ['rules' => 'required|', 'errors' => ['required' => 'alamat kegiatan tidak boleh kosong']],
            'desc'              => ['rules' => 'required|', 'errors' => ['required' => 'deskripsi kegiatan tidak boleh kosong']],
            'date'              => ['rules' => 'required|', 'errors' => ['required' => 'tanggal kegiatan tidak boleh kosong']],
            'time'              => ['rules' => 'required|', 'errors' => ['required' => 'jam kegiatan tidak boleh kosong']],
            'time_end'          => ['rules' => 'required|', 'errors' => ['required' => 'jam batas pendaftaran tidak boleh kosong']],
        ];
        // cek apakah jadwala sudah ada di lokasi dan tanggal yang sama
        $cekJadwal = $jadwalModel->where('lokasi', $this->request->getPost('lokasi'))
            ->where('date', $this->request->getPost('date'))
            ->countAllResults() > 0;

        if ($this->validate($rules)) {
            // cek jam kegiatan tidak boleh lebih besar dari  jam selesai kegiatan
            if ($data['time'] >= $data['time_end']) {
                return redirect()->back()->withInput()->with('error', 'Jam mulai kegiatan tidak boleh lebih besar dari jam selesai kegiatan');
            } else {
                // cek apakah jadwal sudah terdaftar
                if ($cekJadwal) {
                    return redirect()->back()->withInput()->with('error', 'Lokasi Kegiatan di Tanggal yang sama sudah terdaftar');
                } else {
                    $jadwalModel->save([
                        'nama_kegiatan'     => $data['nama_kegiatan'],
                        'slug'              => $slug,
                        'pmi_id'            => $data['pmi_id'],
                        'date'              => $data['date'],
                        'time'              => $data['time'],
                        'time_end'          => $data['time_end'],
                        'lokasi'            => $data['lokasi'],
                        // 'kontak2'           => $data['kontak2'],
                        'alamat_kegiatan'   => $data['alamat_kegiatan'],
                        'desc'              => $data['desc'],
                        'jenis_darah'       => $darah,
                        'created_by'        => $petugas->nama,
                    ]);
                    return redirect()->to(site_url('admin/jadwal-donor'))->with('message', 'Berhasil menambah jadwal');
                }
            }
        } else {
            $data = [
                'validation' => $this->validator,
                'pmi'           => $pmi->getAllPMI(),
                'petugas'       => $pmi->getPMI(),
            ];
            return view('admin/jadwal-donor-form', $data);
        }
    }

    public function edit($id)
    {
        $pmi = new PmiModel();
        $jadwal = new JadwalModel();
        $data = [
            'validation'    => \config\Services::validation(),
            'jadwal'        => $jadwal->getJadwal($id),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI(),
        ];
        return view('admin/jadwal-donor-edit', $data);
    }

    public function update($id)
    {
        $jadwalModel = new JadwalModel();
        $pmi = new PmiModel();

        $petugas = $pmi->getPMI();
        $pilihan = $this->request->getVar('pilihan');
        $darah['pilihan'] = serialize($pilihan);
        $data = $this->request->getPost();
        $slug = url_title($data['nama_kegiatan'], '-', true);
        // validasi rules
        $rules = [
            'nama_kegiatan'     => ['rules' => 'required|', 'errors' => ['required' => 'nama kegiatan tidak boleh kosong']],
            'lokasi'            => ['rules' => 'required|', 'errors' => ['required' => 'lokasi kegiatan tidak boleh kosong']],
            'pilihan'           => ['rules' => 'required|', 'errors' => ['required' => 'Golongan darah tidak boleh kosong pilih minimal satu']],
            'alamat_kegiatan'   => ['rules' => 'required|', 'errors' => ['required' => 'alamat kegiatan tidak boleh kosong']],
            'desc'              => ['rules' => 'required|', 'errors' => ['required' => 'deskripsi kegiatan tidak boleh kosong']],
            'date'              => ['rules' => 'required|', 'errors' => ['required' => 'tanggal kegiatan tidak boleh kosong']],
            'time'              => ['rules' => 'required|', 'errors' => ['required' => 'jam kegiatan tidak boleh kosong']],
            'time_end'          => ['rules' => 'required|', 'errors' => ['required' => 'jam batas pendaftaran tidak boleh kosong']],
        ];

        if ($this->validate($rules)) {
            // cek apakah jam kegiatan lebih besar dari jam selesai
            if ($data['time'] >= $data['time_end']) {
                return redirect()->back()->withInput()->with('error', 'Jam mulai kegiatan tidak boleh lebih besar dari jam selesai kegiatan');
            } else {
                // $datalama =  $jadwalModel->getJadwal($id);
                $jadwalModel->save([
                    'id_jadwal' => $id,
                    'slug'              => $slug,
                    // 'pmi_id'            => $petugas->id_pmi,
                    'pmi_id'            => $data['pmi_id'],
                    'date'              => $data['date'],
                    'time'              => $data['time'],
                    'time_end'          => $data['time_end'],
                    'lokasi'            => $data['lokasi'],
                    'alamat_kegiatan'   => $data['alamat_kegiatan'],
                    'desc'              => $data['desc'],
                    'jenis_darah'       => $darah,
                    'updated_by'        => $petugas->nama,
                ]);
                return redirect()->to(site_url('admin/jadwal-donor'))->with('message', 'Berhasil Edit jadwal');
            }
        } else {
            $data = [

                'jadwal'    => $jadwalModel->getJadwal($id),
                'validation' => $this->validator,
                'pmi'           => $pmi->getAllPMI(),
                'petugas'       => $pmi->getPMI(),
            ];
            return view('admin/jadwal-donor-edit', $data);
        }
    }

    public function delete($id)
    {
        $jadwal  = new JadwalModel();
        $data = $this->request->getPost('hapus');
        $jwl = $jadwal->find($id);
        // dd($jwl['lokasi']);
        // dd($data);
        if ($data != $jwl['lokasi']) {
            return redirect()->back()->with('error', 'Lokasi Kegiatan Salah');
        } else {
            $jadwal->delete(['id_jadwal' => $id]);
        }
        return redirect()->to(site_url('admin/jadwal-donor'))->with('message', 'Berhasil Hapus Jadwal');
    }
}
