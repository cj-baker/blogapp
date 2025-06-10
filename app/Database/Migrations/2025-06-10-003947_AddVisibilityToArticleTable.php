<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVisibilityToArticleTable extends Migration
{
    public function up()
    {
       $this->forge->addColumn("article", [
            "visibility" =>[
                "type" => "INT",
                'constraint'=> 11,
                "default" => 1,
        ]
        ]);
        
        $this->forge->processIndexes("article");
    }

    public function down()
    {
        $this->forge->dropColumn("article", "visibility");
    }
}
