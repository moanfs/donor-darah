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
}
