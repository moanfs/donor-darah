<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DonorSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            'nama_depan'    => 'Admin',
            'nama_belakang' => 'Donor',
            'slug'          => url_title('Admin Donor', '-', true),
            'email'         => 'admin@mail.com',
            'active'        => '1',
            'pass_hash'     => password_hash('12345', PASSWORD_DEFAULT),
            'auth_group'    => '1'
        ];
        $this->db->table('users')->insert($data);
    }
}
