<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarModel;
use App\Models\JadwalModel;
use App\Models\KecematanModel;
use App\Models\UserModel;


class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $kecamatan = new KecematanModel();
        $data = [
            'jadwal' => $jadwalModel->getAllDonor(),
            'kecamatan' => $kecamatan->findAll()
        ];
        return view('user/jadwal', $data);
    }

    // untuk daftar kegiatan donor
    public function daftar($id)
    {
        $jadwal = new JadwalModel();
        $data = [
            'jadwal' => $jadwal->getJadwal($id),
        ];
        return view('user/daftar', $data);
    }

    public function create($id)
    {
        $daftar = new DaftarModel();
        $jadwal = new JadwalModel();
        $user = new UserModel();
        $profile = $user->getProfile(session('id_user'));
        $goldar = $profile->goldar;
        // dd($goldar);

        // cek apakah golongan darah user cocok dengan jadwal donor
        $cekdarah = $jadwal->getJadwal($id);
        $darah = unserialize($cekdarah->jenis_darah);

        // $nomor = $cekdarah->nama_kegiatan;
        // dd($nomor);
        // melihat jadwal sudah didaftar oleh user atau belum
        $cekterdaftar = $daftar->where('user_id', $this->request->getPost('user_id'))
            ->where('jadwal_id', $this->request->getPost('jadwal_id'))
            ->countAllResults() > 0;
        // kondisi untuk melihat jadwal sudah didaftar oleh user atau belum
        if ($cekterdaftar) {
            return redirect()->back()->with('gagal', 'akun anda sudah terdaftar pada jadwal ini');
        } else {
            if ($goldar == '-') {
                // jika golongan darah user tidak diketahui 
                return redirect()->back()->with('gagal', 'golongan darah anda tidak diketahui, silahkan lakukan pengecekan golongan darah terlebih dahulu sebelum mendaftar');
            } elseif (in_array($goldar, $darah)) {
                //jika golongan darah user cocok dengan jadwal
                $jumlah_pendaftar = $daftar->getNomor($this->request->getPost('jadwal_id'));
                $daftar->save([
                    'user_id'       => $this->request->getPost('user_id'),
                    'jadwal_id'     => $this->request->getPost('jadwal_id'),
                    'riwayat'       => $this->request->getPost('riwayat'),
                    'nomor'         => $jumlah_pendaftar + 1,
                ]);
                return redirect()->to(site_url('jadwal-donor/terdaftar'))->with('success', 'Berhasil Mendaftar jadwal');
            } else {
                // jika golongan darah user  tidak cocok dengan jadwal
                return redirect()->back()->with('gagal', 'golongan darah anda tidak cocok untuk jadwal ini');
            }
        }
    }

    // menampilkan semua kegiatan yang didaftar
    public function terdaftar()
    {
        $daftar = new DaftarModel();
        return view('user/terdaftar', [
            'jadwal'    => $daftar->getJadwal(),
        ]);
    }

    // menampilkaan detail kegiaatan yang telah didaftarkan
    public function show($id)
    {
        $daftar = new DaftarModel();
        $data = [
            'jadwal' => $daftar->getDaftar($id)
        ];
        return view('user/terdaftar-show', $data);
    }

    public function edit($id)
    {
        $daftar = new DaftarModel();
        $daftar->save([
            'id_daftar' => $id,
            'riwayat'   => $this->request->getPost('riwayat')
        ]);
        return redirect()->to(base_url('jadwal-donor/terdaftar'))->with('success', 'berhasil mengubah data pendaftaran');
    }

    public function delete($id)
    {
        $daftar = new DaftarModel();
        $daftar->delete(['id_daftar' => $id]);
        return redirect()->to(base_url('jadwal-donor/terdaftar'))->with('success', 'berhasil menghapus  data pendaftaran');
    }
}
