<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Acara extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_acara' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_acara' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tanggal_acara' => [
                'type'       => 'DATE',
            ],
            'info_acara' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_acara', true);
        $this->forge->createTable('acara');
    }

    public function down()
    {
        $this->forge->dropTable('acara');
    }
}
