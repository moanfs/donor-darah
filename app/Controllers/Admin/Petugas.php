<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PmiModel;

class Petugas extends BaseController
{
    public function index()
    {
        $admin =  new AdminModel();
        $data = [
            'admin' => $admin->getAllAdmin()
        ];
        return view('admin/petugas', $data);
    }

    public function new()
    {
        $pmi = new PmiModel();
        $data = [
            'validation'    => \config\Services::validation(),
            'pmi'           => $pmi->getAllPMI(),
        ];
        return view('admin/petugas-form', $data);
    }

    public function save()
    {
        $admin = new AdminModel();
        $pmi = new PmiModel();
        $data = $this->request->getPost();
        $slug = url_title($data['nama'], '-', true);
        $rules = [
            'nama'      => ['rules' => 'required|', 'errors' => ['required' => 'nama petugas tidak boleh kosong']],
            'email'     => ['rules' => 'required|valid_email', 'errors' => ['required' => 'email tidak boleh kosong', 'valid_email' => 'email tidak valid']],
            'phone'     => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'no hp tidak boleh kosong', 'alpha_numeric' => 'Masukan Nomor yang valid']],
            'password'  => ['rules' => 'required|', 'errors' => ['required' => 'password tidak boleh kosong']],

        ];
        if ($this->validate($rules)) {
            $admin->save([
                'nama'      => $data['nama'],
                'slug'      => $slug,
                'email'     => $data['email'],
                'pmi_id'    => $data['pmi'],
                'phone'     => $data['phone'],
                'pass_hash' => password_hash($data['password'], PASSWORD_DEFAULT),

            ]);
            return redirect()->to(site_url('admin/petugas'))->with('message', 'Berhasil menambah Petugas PMI');
        } else {
            $data = [
                'validation'    => $this->validator,
                'pmi'           => $pmi->getAllPMI(),
            ];
            return view('admin/petugas-form', $data);
        }
    }

    public function show($id)
    {
        $petugas = new AdminModel();
        return view('admin/petugas-show', [
            'petugas' => $petugas->getAdmin($id),
        ]);
    }

    public function delete($id)
    {
        $petugas = new AdminModel();
        if ($this->request->getPost('active') == 1) {
            // untuk mematikaan akun admin
            $petugas->save([
                'id_admin'  => $id,
                'active'    => 0
            ]);
            return redirect()->back();
        } else {
            // untuk mengembalikan akun admin
            $petugas->save([
                'id_admin'  => $id,
                'active'    => 1
            ]);
            return redirect()->back();
        }
        // return redirect()->to(site_url('/admin/petugas/show/') . $hapus['id_admin'])->with('message', 'Berhasil Hapus Petugas PMI');
    }
}
