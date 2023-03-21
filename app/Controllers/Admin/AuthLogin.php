<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AuthLogin extends BaseController
{
    public function attempLogin()
    {
        return view('admin/login');
    }
}
