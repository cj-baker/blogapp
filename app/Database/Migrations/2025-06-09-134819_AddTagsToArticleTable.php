<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTagsToArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("article", [
            "tags" =>[
                "type" => "TEXT",
                "null" => true
        ]
        ]);
        $this->forge->addKey("tags");
        $this->forge->processIndexes("article");
    }
     
    public function down()
    {
        $this->forge->dropColumn("article", "tags");
    }
}
