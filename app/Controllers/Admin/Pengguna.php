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
}
