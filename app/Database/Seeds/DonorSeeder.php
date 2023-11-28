<?php

namespace App\Database\Seeds;

use App\Models\WilayahModel;
use CodeIgniter\Database\Seeder;

class DonorSeeder extends Seeder
{
    public function run()
    {
        // //
        // $data = [
        //     'nama_depan'    => 'Admin',
        //     'nama_belakang' => 'Donor',
        //     'slug'          => url_title('Admin Donor', '-', true),
        //     'email'         => 'admin@mail.com',
        //     'jenis_klamin'  => 'Laki Laki',
        //     'goldar'        => 'B',
        //     'active'        => '1',
        //     'pass_hash'     => password_hash('12345', PASSWORD_DEFAULT),
        //     'auth_group'    => '1'
        // ];
        // $this->db->table('users')->insert($data);

        // $data = [
        //     'nama_depan'    => 'User',
        //     'nama_belakang' => 'Donor',
        //     'slug'          => url_title('User Donor', '-', true),
        //     'email'         => 'user@mail.com',
        //     'jenis_klamin'  => 'Laki Laki',
        //     'goldar'        => 'A',
        //     'active'        => '1',
        //     'pass_hash'     => password_hash('12345', PASSWORD_DEFAULT),
        //     'auth_group'    => '0'
        // ];
        // $this->db->table('users')->insert($data);\

        $wilayahModel = new WilayahModel();

        // Mendapatkan data provinsi dan kota/kabupaten dari API
        $provinsiData = $wilayahModel->getProvinsi();
        $kotaKabupatenData = $wilayahModel->getKotaKabupaten($provinsiId);

        // Import data ke dalam database
        $wilayahModel->importProvinsi($provinsiData);
        $wilayahModel->importKotaKabupaten($kotaKabupatenData);

        return 'Data wilayah berhasil diimpor ke dalam database.';
    }
}
