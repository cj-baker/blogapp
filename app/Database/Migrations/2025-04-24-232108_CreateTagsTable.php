<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tag_id' => [
        'type'           => 'INT',
        'null'           => false,
        'auto_increment' => true,
        ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
        ]
    ]);

        $this->forge->addPrimaryKey("tag_id");

        $this->forge->createTable("tags");
    }

    public function down()
    {
        $this->forge->dropTable("tags"); 
    }
}
