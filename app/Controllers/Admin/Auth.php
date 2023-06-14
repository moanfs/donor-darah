<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $db, $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->back();
        }
        $data['validation'] = \config\Services::validation();
        return view('login', $data);
    }

    public function attempLogin()
    {
        $data = $this->request->getPost();
        $rules = [
            'email'         => [
                'rules' =>  'required|valid_email',
                'errors' => ['required' => 'email tidak boleh kosong', 'valid_email'  => 'Email tidak valid']
            ],

            'password'      => [
                'rules' =>  'required|',
                'errors' => ['required' => 'password tidak boleh kosong']
            ]
        ];
        if ($this->validate($rules)) {
            $query = $this->db->table('users')
                ->getwhere(['email' => $data['email']]);
            $attempt = $query->getrow();
            if ($attempt) {
                if ($attempt->auth_group == 1) {
                    if (password_verify($data['password'], $attempt->pass_hash)) {
                        $params = ['id_user' => $attempt->id_user];
                        $slug = ['slug' => $attempt->slug];
                        session()->set($params);
                        session()->set($slug);
                        return redirect()->to(site_url('admin'));
                    } else {
                        return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
                    }
                } else {
                    return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
                }
            } else {
                return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('auth', $data);
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('auth'));
    }
}
