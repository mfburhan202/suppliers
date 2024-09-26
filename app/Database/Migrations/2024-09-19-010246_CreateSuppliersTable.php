<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 20,
                'required'  => true,
                'auto_increment' => true,
            ],
            'idsupplier' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'required'  => true,
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'required'  => true,
            ],
            'pic_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'required'  => true,
            ],
            'pic_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'phone_company' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('suppliers');
    }

    public function down()
    {
        $this->forge->dropTable('suppliers');
    }
}
