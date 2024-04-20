<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Profile extends BaseController
{
    public function index($slug)
    {
        //
        $profile = new AdminModel();
        $data['profile'] = $profile->getProfile();

        return view('admin/admin-profile', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $validation = $this->validate([
            'nama'     => 'required|min_length[3]',
            'email'    => 'required|valid_email',
        ]);

        if (!$validation) {
            $profile = new AdminModel();

            return view('admin/admin-profile', [
                'profile'   => $profile->getProfile($id),
                'validation' => $this->validator
            ]);
        } else {
            $profile = new AdminModel();
            $profile->save([
                'id_admin'   => $id,
                'nama' => $this->request->getPost('nama'),
                'slug' => url_title($data['nama'], '-', true),
                'email' => $this->request->getPost('email'),
            ]);

            session()->setFlashdata('message', 'Profile Berhasil Diupdate');
            return redirect()->back();
        }
    }

    public function updateimg($id)
    {
        $rules = [
            'img_profile'   => ['rules' => 'uploaded[img_profile]|max_size[img_profile,2048]|ext_in[img_profile,png,jpg,jpeg]', 'errors' => ['uploaded' => 'gambar berita tidak boleh kosong', 'max_size' => 'ukuran maksimal 2MB', 'ext_in' => 'file hanya boleh png, jpg dan jpeg']]
        ];
        if ($this->validate($rules)) {
            $user = new AdminModel();
            $image = $this->request->getFile('img_profile');
            $gambar = $image->getRandomName();
            $image->move('assets/img/', $gambar);
            $user->save([
                'id_admin'   => $id,
                'img_profile'   => $gambar
            ]);
            return redirect()->back()->with('success', 'Foto Berhasil Diganti');
        }
        return redirect()->back()->with('gagal', 'format gambar tidak sesuai');
    }

    public function password($id)
    {
        $data = $this->request->getPost();
        $user = new AdminModel();
        $dataadmin = $user->find($id);
        $passdatabase = $data['pass_hash'];
        $rules = [
            'passlama'  => 'required',
            'passbaru'  => 'required|min_length[3]'
        ];
        if ($this->validate($rules)) {
            $passlama = $dataadmin['passlama'];
            $passbaru = password_hash($data['passbaru'], PASSWORD_DEFAULT);
            if (password_verify($passlama, $passdatabase)) {
                $user->save([
                    'id_admin'       => $id,
                    'pass_hash'     => $passbaru
                ]);
                return redirect()->back()->with('successpas', 'password berhasil diganti');
            } else {
                return redirect()->back()->with('gagalpas', 'password lama salah');
            }
        } {
            return redirect()->back()->with('gagalpas', 'password tidak boleh kosong');
        }
    }
}
