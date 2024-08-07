<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
        return view('user/login', $data);
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
                if ($attempt->active == 1) {
                    if (password_verify($data['password'], $attempt->pass_hash)) {
                        $params = ['id_user' => $attempt->id_user];
                        $slug = ['slug' => $attempt->slug];
                        session()->set($params);
                        session()->set($slug);
                        return redirect()->to('/');
                    } else {
                        return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
                    }
                } else {
                    return redirect()->back()->withInput()->with('message', 'Akun Anda Di Matikan, <br> Silahkan Hubungi Pihak PMI Ke Nomor (022) 4207052 untuk Pengembalian Akun!!');
                }
            } else {
                return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!!');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('user/login', $data);
        }
    }

    public function register()
    {
        if (session('id_user')) {
            return redirect()->back();
        }
        $data['validation'] = \config\Services::validation();
        return view('user/register', $data);
    }

    public function attempRegister()
    {
        $user = new UserModel();
        $data = $this->request->getPost();
        $usia = date("Y", strtotime($data['tgl_lahir']));
        $newusia =  date("Y") - $usia;
        $rules = [
            'namadepan'     => ['rules' => 'required|', 'errors' => ['required' => 'Nama Depan tidak boleh kosong']],
            'namabelakang'  => ['rules' => 'required|', 'errors' => ['required' => 'Nama Belakang tidak boleh kosong']],
            'tgl_lahir'     => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal Lahir tidak boleh kosong']],
            'nik'           => ['rules' => 'required|min_length[16]|max_length[16]|is_unique[users.nik]|integer', 'errors' => ['required' => 'Nik tidak boleh kosong', 'max_length' => 'Nik Harus 16',  'min_length' => 'Nik Harus 16', 'is_unique' => 'Nik sudah Terdaftar', 'integer' => 'NIK Hanya Boleh Angka']],
            'email'         => ['rules' => 'required|is_unique[users.email]|valid_email', 'errors' => ['required' => 'email tidak boleh kosong', 'is_unique' => 'email sudah terdaftar', 'valid_email'  => 'Email tidak valid']],
            'password'      => ['rules' => 'required|', 'errors' => ['required' => 'Password tidak boleh kosong']]
        ];
        if ($this->validate($rules)) {
            $fullname = $data['namadepan'] . ' ' . $data['namabelakang'];
            $slug = url_title($fullname, '-', true);
            $user->save([
                'nama_depan'        => $data['namadepan'],
                'nama_belakang'     => $data['namabelakang'],
                'slug'              => $slug,
                'tanggal_lahir'     => $data['tgl_lahir'],
                'nik'               => $data['nik'],
                'jenis_klamin'      => $data['jeniskelamin'],
                'usia'              => $newusia,
                'goldar'            => $data['goldar'],
                'email'             => $data['email'],
                'pass_hash'         => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);
            return redirect()->to('login')->with('success', 'Berhasil membuat akun');
        } else {
            $data['validation'] = $this->validator;
            return view('user/register', $data);
        }
    }

    public function logout()
    {
        // session()->remove('id_user');
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
