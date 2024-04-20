<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DonorSeeder extends Seeder
{
    public function run()
    {
        // kecamatan kota bandung
        $datakec = [
            ['kecamatan' => 'Kecamatan Andir'], //1
            ['kecamatan' => 'Kecamatan Astana Anyar'], //2
            ['kecamatan' => 'Kecamatan Antapani'], //3
            ['kecamatan' => 'Kecamatan Arcamanik'], //4
            ['kecamatan' => 'Kecamatan Babakan Ciparay'], //5
            ['kecamatan' => 'Kecamatan Bandung Kidul'], //6
            ['kecamatan' => 'Kecamatan Bandung Kulon'], //7
            ['kecamatan' => 'Kecamatan Dayeuh kolot'], //8
            ['kecamatan' => 'Kecamatan Bandung Wetan'], //9
            ['kecamatan' => 'Kecamatan Batununggal'], //10
            ['kecamatan' => 'Kecamatan Bojongloa Kaler'], //11
            ['kecamatan' => 'Kecamatan Bojongloa Kidul'], //12
            ['kecamatan' => 'Kecamatan Buahbatu'], //13
            ['kecamatan' => 'Kecamatan Cibeunying Kaler'], //14
            ['kecamatan' => 'Kecamatan Cibeunying Kidul '], //15
            ['kecamatan' => 'Kecamatan Cibiru'], //16
            ['kecamatan' => 'Kecamatan Cicendo'], //17 
            ['kecamatan' => 'Kecamatan Cidadap'], //18
            ['kecamatan' => 'Kecamatan Cinambo'],  //19
            ['kecamatan' => 'Kecamatan Coblong'],    //20
            ['kecamatan' => 'Kecamatan Gedebage'],    //21
            ['kecamatan' => 'Kecamatan Kiaracondong'], //22
            ['kecamatan' => 'Kecamatan Lengkong'],     //23
            ['kecamatan' => 'Kecamatan Mandalajati'],   //24
            ['kecamatan' => 'Kecamatan Panyileukan'], //25
            ['kecamatan' => 'Kecamatan Rancasari'], //26
            ['kecamatan' => 'Kecamatan Regol'], //27
            ['kecamatan' => 'Kecamatan Sukasari'], //28
            ['kecamatan' => 'Kecamatan Sumur Bandung'], //29
            ['kecamatan' => 'Kecamatan Ujungberung'], //30
        ];

        foreach ($datakec as $row) {
            $this->db->table('kecamatan')->insert($row);
        }

        // daftar PMI bandung
        $datapmi = [
            [
                'nama_pmi'      => 'PMI Kota Bandung',
                'kec_id'        => '9',
                'alamat'        => 'Jl. Aceh No.79, Cihapit',
                'kontak'        => '(022) 4207052'
            ],
            [
                'nama_pmi'      => 'PMI Cablong',
                'kec_id'        => '20',
                'alamat'        => 'Jl. Ir. H. Juanda No.426A, Dago',
                'kontak'        => '(022) 2500095'
            ],
            [
                'nama_pmi'      => 'PMI Kulon',
                'kec_id'        => '7',
                'alamat'        => 'Jl, Caringin',
                'kontak'        => '(022) 6015113'
            ],
            [
                'nama_pmi'      => 'PMI Antapani',
                'kec_id'        => '3',
                'alamat'        => 'Jl. A.H. Nasution No.14, Antapani Wetan',
                'kontak'        => '087864490493'
            ],
            [
                'nama_pmi'      => 'PMI Store',
                'kec_id'        => '9',
                'alamat'        => 'Jl. Aceh No.79, Cihapit, Gedung PMI LT II, Koperasi PMI,, Cihapit',
                'kontak'        => '08562105974'
            ],
            [
                'nama_pmi'      => 'PMI Unit Unisba',
                'kec_id'        => '13',
                'alamat'        => 'Sekejati, Buahbatu, Bandung City',
                'kontak'        => '0818124546'
            ],
            [
                'nama_pmi'      => 'Posko PMI ',
                'kec_id'        => '9',
                'alamat'        => 'Jl. Aceh No.79, Cihapit',
                'kontak'        => '(022) 20542781'
            ],
            [
                'nama_pmi'      => 'PMI Unit UIN Gunung Djati',
                'kec_id'        => '16',
                'alamat'        => 'Jl. Gg. Kujang No.82, Cipadung',
                'kontak'        => '081312126820'
            ],

        ];
        foreach ($datapmi as $row) {
            $this->db->table('pmi')->insert($row);
        }

        // admin
        $data = [
            'nama'          => 'Super Admin',
            'slug'          => url_title('Super Admin', '-', true),
            'email'         => 'admin@mail.com',
            'role'          => '0',
            'pmi_id'        => '1',
            'pass_hash'     => password_hash('12345', PASSWORD_DEFAULT),
        ];
        $this->db->table('admin')->insert($data);
    }
}
