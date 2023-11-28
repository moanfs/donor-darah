<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDonor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_daftar'         => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'user_id'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'jadwal_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nomor'             => ['type' => 'varchar', 'constraint' => '125'],
            'status'            => ['type' => 'boolean', 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_daftar', true);
        $this->forge->addKey(['jadwal_id', 'user_id']);
        $this->forge->addForeignKey('jadwal_id', 'jadwal_donor', 'id_jadwal', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id_user', '', 'CASCADE');
        $this->forge->createTable('dafat_donor');
    }

    public function down()
    {
        //
    }
}
