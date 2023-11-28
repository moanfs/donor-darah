<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index($id, $slug)
    {
        //
        $profile = new UserModel();
        $data['profile'] = $profile->getProfile($id);
        // dd($data);
        return view('user/profile', $data);
    }

    public function settingProfile($id, $slug)
    {
        $profile = new UserModel();
        $data = [
            'profile' => $profile->getProfile($id),
            'validation' => \config\Services::validation(),
        ];
        return view('user/setting_profile', $data);
    }


    public function save($id)
    {
        $user = new UserModel();
        $slug = url_title($this->request->getVar('namadepan'), $this->request->getVar('namabelakang'), '-', true);
        $rules = [
            'namadepan'     => 'required|min_length[3]',
            'namabelakang'  => 'required|min_length[3]',
            'nik'           => 'required|min_length[16]|max_length[16]',
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'goldar'        => 'required',
            'jenis_kelamin' => 'required',
        ];

        if ($this->validate($rules)) {
            $user->save([
                'id_user'       => $id,
                'slug'          => $slug,
                'namadepan'     => $this->request->getVar('namadepan'),
                'namabelakang'  => $this->request->getVar('belakang'),
                'nik'           => $this->request->getVar('nik'),
                'tempat_lahir'  => $this->request->getVar('tempatlahir'),
                'tanggal_lahir' => $this->request->getVar('tanggallahir'),
                'goldar'        => $this->request->getVar('goldar'),
                'jenis_klamin'  => $this->request->getVar('jenis_kelamin'),
            ]);
            return redirect()->back()->with('success', 'Berhasil Edit Profile');
        } else {
            // return 'gagal vaildasi';
            // $validation = \config\Services::validation();
            return redirect()->back()->withInput()->with('gagal', 'gagal edit profile');
        }

        return redirect()->back();
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
}
