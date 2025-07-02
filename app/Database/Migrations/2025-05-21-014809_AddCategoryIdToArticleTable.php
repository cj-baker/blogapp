<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryIdToArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("article", [
            "category_id" => [
                "type" => "INT",
                "null" => true,
                "unsigned" => true,
                "constraint" => 11
            ]
            ]);
            

                            //addForeignKey function passes in the ("name of the column from the first table", "name of the table we are linking to", "name of the column from the table we are linking to", 
                            //"Call CASCADE for updates", "Call CASCADE for deletes", "name of the foreign key" )
            $this->forge->addForeignKey("category_id", "categories", "id",
                                            "SET NULL", "CASCADE", "article_categories_id_fk");
                            //CASCADE means that when a parent recorded changed (updated or deleted) the corresponding child object is too.
            $this->forge->processIndexes("article");

            //NOTE -- Both linked columns "users_id" and "id" must have the same data types/"rules"
    }

    public function down()
    {
        $this->forge->dropForeignKey("article", "article_categories_id_fk");
        $this->forge->dropColumn("article", "category_id");
    }
}
