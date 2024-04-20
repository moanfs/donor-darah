<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DaftarModel;
use App\Models\JadwalModel;
use App\Models\PmiModel;

class Pendaftar extends BaseController
{
    public function index()
    {
        $jadwal = new JadwalModel();
        $daftar = new DaftarModel();

        return view('admin/pendaftar', [
            'data'  => $daftar->getPendaftar(),
        ]);
    }

    // menampilkan data peserta berdasarkan jadwal id
    public function show($id)
    {
        $daftar = new DaftarModel();
        $pmi = new PmiModel();

        $data = [
            'pendaftar' => $daftar->getPendaftarByJadwal($id),
            'pmi'       => $pmi->getJadwal($id)
        ];
        return view('admin/pendaftar-jadwal', $data);
    }

    // menampilkan data peserta berdasarkan daftar id
    public function peserta($id)
    {
        $daftar = new DaftarModel();

        $data = [
            'peserta'   => $daftar->getPendaftarByDaftar($id),
        ];
        return view('admin/pendaftar-show', $data);
    }

    public function selesai($id)
    {
        $daftar = new DaftarModel();
        $kondisi = $daftar->getKondisi($id);
        // cek kondisi kegiatan sudah dimulai apa belum
        if ($kondisi) {
            $daftar->save([
                'id_daftar' => $id,
                'status'    => 1
            ]);
            return redirect()->back()->with('success', 'Donor Selesai, Ucapkan Terima Kasih Pada Pendonor');
        } else {
            return redirect()->back()->with('errors', 'Kegiatan Belum Dimulai');
        }
    }

    public function batal($id)
    {
        $daftar = new DaftarModel();
        $kondisi = $daftar->getKondisi($id);
        $rules = [
            'keterangan'     => ['rules' => 'required|', 'errors' => ['required' => 'jumlah darah tidak boleh kosong']],
        ];
        // cek kondisi kegiatan sudah dimulai apa belum
        if ($kondisi) {
            if ($this->validate($rules)) {
                $daftar->save([
                    'id_daftar' => $id,
                    'status'    => 2,
                    'keterangan' => $this->request->getPost('keterangan')
                ]);
                return redirect()->back()->with('message', 'Donor Batal Dilakukan');
            } else {
                return redirect()->back()->withInput()->with('errors', 'Keterangan Tidak Boleh Kosong');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', '<b> GAGAL!!</b> Kegiatan Belum Dimulai');
        }
    }

    public function absen($id)
    {
        $daftar = new DaftarModel();
        $kondisi = $daftar->getKondisi($id);
        if ($kondisi) {
            $daftar->save([
                'id_daftar' => $id,
                'status'    => $this->request->getPost('status'),
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->with('errors', '<b> GAGAL!!</b> Kegiatan Belum Dimulai');
        }
    }
}
