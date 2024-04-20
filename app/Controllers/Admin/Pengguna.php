<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengguna extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        $data['users'] = $users->getAllUser();
        return view('admin/pengguna', $data);
    }

    public function show($id)
    {
        $users = new UserModel();
        return view('admin/pengguna-show', [
            'user' => $users->find($id),
        ]);
    }
    public function edit($id)
    {
        $users = new UserModel();
        if ($this->request->getPost('active') == 1) {
            // untuk mematikaan akun user
            $users->save([
                'id_user'   => $id,
                'active'    => 0
            ]);
            return redirect()->back();
        } else {
            // untuk mengembalikan akun user
            $users->save([
                'id_user'   => $id,
                'active'    => 1
            ]);
            return redirect()->back();
        }
    }
}
