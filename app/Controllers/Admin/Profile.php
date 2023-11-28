<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index($id, $slug)
    {
        //
        $profile = new UserModel();
        $data['profile'] = $profile->getProfile($id);

        return view('admin/profile', $data);
    }

    public function update($id)
    {

        $validation = $this->validate([
            'namadepan'     => 'required|min_length[3]',
            'namabelakang'  => 'required|min_length[3]',
            'email'         => 'required|valid_email',
        ]);

        if (!$validation) {
            $profile = new UserModel();

            return view('admin/profile', [
                'profile'   => $profile->getProfile($id),
                'validation' => $this->validator
            ]);
        } else {
            $profile = new UserModel();
            $profile->save([
                'id_user'   => $id,
                'nama_depan' => $this->request->getPost('namadepan'),
                'nama_belakang' => $this->request->getPost('namabelakang'),
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
            $user = new UserModel();
            $image = $this->request->getFile('img_profile');
            $gambar = $image->getRandomName();
            $image->move('assets/img/', $gambar);
            $user->save([
                'id_user'   => $id,
                'img_profile'   => $gambar
            ]);
            return redirect()->back()->with('success', 'Foto Berhasil Diganti');
        }
        return redirect()->back()->with('gagal', 'format gambar tidak sesuai');
    }

    public function password($id)
    {
        $user = new UserModel();
        $data = $user->find($id);
        $passdatabase = $data['pass_hash'];
        $rules = [
            'passlama'  => 'required',
            'passbaru'  => 'required|min_length[3]'
        ];
        if ($this->validate($rules)) {
            $passlama = $this->request->getPost('passlama');
            $passbaru = password_hash($this->request->getPost('passbaru'), PASSWORD_DEFAULT);
            if (password_verify($passlama, $passdatabase)) {
                $user->save([
                    'id_user'       => $id,
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
