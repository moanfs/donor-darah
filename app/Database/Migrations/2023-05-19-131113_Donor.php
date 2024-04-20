<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Donor extends Migration
{
    public function up()
    {
        //tabel user
        $this->forge->addField([
            'id_user'           => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama_depan'        => ['type' => 'varchar', 'constraint' => '125'],
            'nama_belakang'     => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'nik'               => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'usia'              => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'goldar'            => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'tempat_lahir'      => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'tanggal_lahir'     => ['type' => 'date', 'null' => true],
            'jenis_klamin'      => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'alamat'            => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'email'             => ['type' => 'varchar', 'constraint' => '125'],
            'phone'             => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'pass_hash'         => ['type' => 'varchar', 'constraint' => '125'],
            'img_profile'       => ['type' => 'varchar', 'constraint' => 125, 'default' => 'profile.png'],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');

        // tabel kecamatan bandung
        $this->forge->addField([
            'id_kecamatan'      => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'kecamatan'         => ['type' => 'VARCHAR', 'constraint' => '125'],
        ]);
        $this->forge->addKey('id_kecamatan', true);
        $this->forge->createTable('kecamatan');

        // tabel PMI
        $this->forge->addField([
            'id_pmi'            => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'kec_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama_pmi'          => ['type' => 'varchar', 'constraint' => '125'],
            'alamat'            => ['type' => 'varchar', 'constraint' => '125'],
            'kontak'            => ['type' => 'varchar', 'constraint' => '125'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_pmi', true);
        $this->forge->addKey('kec_id');
        $this->forge->addForeignKey('kec_id', 'kecamatan', 'id_kecamatan', '', 'CASCADE');
        $this->forge->createTable('pmi');

        // tabel Admin
        $this->forge->addField([
            'id_admin'          => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'pmi_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama'              => ['type' => 'varchar', 'constraint' => '125'],
            'email'             => ['type' => 'varchar', 'constraint' => '125'],
            'phone'             => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'pass_hash'         => ['type' => 'varchar', 'constraint' => '125'],
            'img_profile'       => ['type' => 'varchar', 'constraint' => 125, 'default' => 'profile.png'],
            'role'              => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->addKey('pmi_id');
        $this->forge->addForeignKey('pmi_id', 'pmi', 'id_pmi', '', 'CASCADE');
        $this->forge->createTable('admin');


        // tabel stok darah
        $this->forge->addField([
            'id_darah'          => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'pmi_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'slug'              => ['type' => 'varchar', 'constraint' => '125'],
            'goldar'            => ['type' => 'varchar', 'constraint' => '11'],
            'jumlah'            => ['type' => 'int', 'constraint' => '11'],
            'kontak2'           => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'created_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'updated_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'deleted_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_darah', true);
        $this->forge->addKey('pmi_id');
        $this->forge->addForeignKey('pmi_id', 'pmi', 'id_pmi', '', 'CASCADE');
        $this->forge->createTable('stok_darah');

        // tabel jadwal donor
        $this->forge->addField([
            'id_jadwal'         => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'pmi_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama_kegiatan'     => ['type' => 'varchar', 'constraint' => '125'],
            'date'              => ['type' => 'varchar', 'constraint' => '125'],
            'time'              => ['type' => 'varchar', 'constraint' => '125'],
            'time_end'          => ['type' => 'varchar', 'constraint' => '125'],
            'lokasi'            => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'alamat_kegiatan'   => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'desc'              => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'jenis_darah'       => ['type' => 'varchar', 'constraint' => '225', 'null' => true],
            'kontak2'           => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'created_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'updated_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'deleted_by'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->addKey('pmi_id');
        $this->forge->addForeignKey('pmi_id', 'pmi', 'id_pmi', '', 'CASCADE');
        $this->forge->createTable('jadwal_donor');

        // tabel daftar donor
        $this->forge->addField([
            'id_daftar'         => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'user_id'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'jadwal_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nomor'             => ['type' => 'varchar', 'constraint' => '11'],
            'riwayat'           => ['type' => 'varchar', 'constraint' => '225', 'null' => true],
            'keterangan'        => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'status'            => ['type' => 'boolean', 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_daftar', true);
        $this->forge->addKey(['jadwal_id', 'user_id']);
        $this->forge->addForeignKey('jadwal_id', 'jadwal_donor', 'id_jadwal', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id_user', '', 'CASCADE');
        $this->forge->createTable('daftar_donor');

        $this->forge->addField([
            'id_berita'         => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'judul'             => ['type' => 'varchar', 'constraint' => '125'],
            'lokasi'            => ['type' => 'varchar', 'constraint' => '125'],
            'img'               => ['type' => 'varchar', 'constraint' => '125'],
            'isi'               => ['type' => 'varchar', 'constraint' => '999'],
            'sumber'            => ['type' => 'varchar', 'constraint' => '125'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        //
    }
}
