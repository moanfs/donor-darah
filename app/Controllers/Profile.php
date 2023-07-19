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
        $data['profile'] = $profile->getProfile($id);
        return view('user/setting_profile', $data);
    }

    public function save()
    {
        $profile = new UserModel();
        $data = $this->request->getPost();
    }
}
