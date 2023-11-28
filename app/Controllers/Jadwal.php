<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarModel;
use App\Models\JadwalModel;
use App\Models\UserModel;
use App\Models\WilayahModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $data['jadwal'] = $jadwalModel->getAllDonor();
        return view('user/jadwal', $data);
    }

    public function daftar($id)
    {
        // $profile = new UserModel();
        $jadwal = new JadwalModel();
        $data = [
            'jadwal'     => $jadwal->getJadwal($id),
        ];
        return view('user/daftar', $data);
    }

    public function create($id)
    {
        $daftar = new DaftarModel();
        $cekterdaftar = $daftar->where('user_id', $this->request->getPost('user_id'))
            ->where('jadwal_id', $this->request->getPost('jadwal_id'))
            ->countAllResults() > 0;
        // dd($cekterdaftar);
        if ($cekterdaftar) {
            return redirect()->back()->with('gagal', 'akun anda sudah terdaftar pada jadwal ini');
        } else {
            $jumlah_pendaftar = $daftar->getNomor($this->request->getPost('jadwal_id'));

            $daftar->save([
                'user_id'       => $this->request->getPost('user_id'),
                'jadwal_id'     => $this->request->getPost('jadwal_id'),
                'nomor'         => $jumlah_pendaftar + 1,
            ]);

            return redirect()->to(site_url('jadwal-donor/terdaftar'))->with('success', 'Berhasil Mendaftar jadwal');
        }
    }

    public function terdaftar()
    {
        $daftar = new DaftarModel();
        return view('user/terdaftar', [
            'jadwal'    => $daftar->getJadwal(),
        ]);
    }

    public function lihat($id)
    {
        $daftar = new DaftarModel();

        // return view('')
    }
}
