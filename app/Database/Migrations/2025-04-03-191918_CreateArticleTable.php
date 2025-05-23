<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
        'type'           => 'INT',
        'null'           => false,
        'auto_increment' => true,
        ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
        ],
            "content" => [
                "type" => "TEXT",
                "null" => false
        ]
    ]);

        $this->forge->addPrimaryKey("id");

        $this->forge->createTable("article");
    }

    public function down()
    {
        $this->forge->dropTable("article"); 
    }
}
