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
        // if (session('id_user')) {
        //     return redirect()->back();
        // }
        $data['validation'] = \config\Services::validation();
        return view('admin/admin-login', $data);
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
            $query = $this->db->table('admin')
                ->getwhere(['email' => $data['email']]);
            $attempt = $query->getrow();
            if ($attempt) {
                if ($attempt->active == 1) {
                    if (password_verify($data['password'], $attempt->pass_hash)) {
                        $params = ['id_admin' => $attempt->id_admin];
                        $slug = ['slug' => $attempt->slug];
                        $role = ['role' => $attempt->role];
                        session()->set($params);
                        session()->set($slug);
                        session()->set($role);
                        return redirect()->to(site_url('admin'));
                    } else {
                        return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
                    }
                } else {
                    return redirect()->back()->withInput()->with('message', 'Akun Anda Di Matikan!!');
                }
            } else {
                return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('admin/admin-login', $data);
            // return redirect()->to(base_url('login-admin'))->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        // session()->remove('id_admin');
        return redirect()->to(site_url('login-admin'));
    }
}
