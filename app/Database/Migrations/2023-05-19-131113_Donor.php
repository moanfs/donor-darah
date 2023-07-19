<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Donor extends Migration
{
    public function up()
    {
        // $this->forge->createDatabase('donor_darah', ifNotExists: false);
        //tabel user
        $this->forge->addField([
            'id_user'           => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama_depan'        => ['type' => 'varchar', 'constraint' => '125'],
            'nama_belakang'     => ['type' => 'varchar', 'constraint' => '125'],
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
            'auth_group'        => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');

        $this->forge->addField([
            'id_darah'          => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'goldar'            => ['type' => 'varchar', 'constraint' => '125'],
            'jumlah'            => ['type' => 'int', 'constraint' => '11'],
            'kab_kota'          => ['type' => 'varchar', 'constraint' => '125'],
            'provinsi'          => ['type' => 'varchar', 'constraint' => '125'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_darah', true);
        $this->forge->createTable('stok_darah');

        $this->forge->addField([
            'id_jadwal'         => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => '125'],
            'nama'              => ['type' => 'varchar', 'constraint' => '125'],
            'date'              => ['type' => 'varchar', 'constraint' => '125'],
            'time'              => ['type' => 'varchar', 'constraint' => '125'],
            'date_end'          => ['type' => 'varchar', 'constraint' => '125'],
            'time_end'          => ['type' => 'varchar', 'constraint' => '125'],
            'kab_kota'          => ['type' => 'varchar', 'constraint' => '125'],
            'provinsi'          => ['type' => 'varchar', 'constraint' => '125'],
            'lokasi'            => ['type' => 'varchar', 'constraint' => '125'],
            'desc'              => ['type' => 'varchar', 'constraint' => '125', 'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->createTable('jadwal_donor');

        $this->forge->addField([
            'id_donor'          => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'jadwal_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'user_id'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_donor', true);
        $this->forge->addKey(['jadwal_id', 'user_id']);
        $this->forge->addForeignKey('jadwal_id', 'jadwal_donor', 'id_jadwal', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id_user', '', 'CASCADE');
        $this->forge->createTable('pendonor');

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
