<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wilayah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'nama'              => ['type' => 'varchar', 'constraint' => '125'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('provinsi');

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => '11', 'unsigned' => true, 'auto_increment' => true],
            'provinsi_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nama'              => ['type' => 'varchar', 'constraint' => '125'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('provinsi_id');
        $this->forge->addForeignKey('provinsi_id', 'provinsi', 'id', '', 'CASCADE');
        $this->forge->createTable('kota_kabupaten');
    }

    public function down()
    {
        //
    }
}
