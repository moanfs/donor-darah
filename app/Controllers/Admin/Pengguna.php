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
        $user = $users->find($id);
        if ($this->request->getPost('active') == 1) {
            // untuk mematikaan akun user
            $users->save([
                'id_user'   => $id,
                'active'    => 0
            ]);

            // Mengirim email pemberitahuan
            $this->sendDeactivationEmail($user['email'], $user['nama_depan']);
            return redirect()->back();
        } else {
            // untuk mengembalikan akun user
            $users->save([
                'id_user'   => $id,
                'active'    => 1
            ]);
            return redirect()->back();
        }
    }

    private function sendDeactivationEmail($email, $nama_depan)
    {
        // dd($email);
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('no-reply@donortree.com', 'Donor Tree');
        $emailService->setSubject('Akun Dinonaktifkan');
        $emailService->setMessage("Hi $nama_depan, <br><br> Akun Anda telah dinonaktifkan. Jika Anda merasa ini adalah kesalahan, silakan hubungi kami.");

        if ($emailService->send()) {
            log_message('info', 'Email berhasil dikirim ke ' . $email);
        } else {
            log_message('error', 'Email gagal dikirim ke ' . $email . '. Error: ' . $emailService->printDebugger(['headers']));
        }
    }
}
