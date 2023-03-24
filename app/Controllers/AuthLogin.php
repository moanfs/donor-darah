<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthLogin extends BaseController
{
    public function attempLogin()
    {
        return view('user/login');
    }
}
