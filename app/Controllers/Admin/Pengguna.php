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
        // $user = $users->find($id);
        if ($this->request->getPost('active') == 1) {
            $users->save([
                'id_user'   => $id,
                'active'    => 0
            ]);
            return redirect()->back();
        } else {
            $users->save([
                'id_user'   => $id,
                'active'    => 1
            ]);
            return redirect()->back();
        }
    }
}
