<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('user/dashboard');
    }

    public function faq()
    {
        return view('user/faq');
    }

    public function privasi()
    {
        return view('user/kebijakan');
    }
}
