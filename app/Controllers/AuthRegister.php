<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthRegister extends BaseController
{
    public function attempRegis()
    {
        //
        return view('user/register.php');
    }
}
