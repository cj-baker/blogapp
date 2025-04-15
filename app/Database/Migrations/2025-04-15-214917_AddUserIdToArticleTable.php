<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("article", [
            "users_id" => [
                "type" => "INT",
                "null" => false,
                "unsigned" => true,
                "constraint" => 11
            ]
            ]);

            $sql = "SELECT id FROM users LIMIT 1"; //query the data base for the first user in the table
            $result = $this->db->query($sql)->getResult(); //get the result of the above query

            if ($result){ //set the user id to the results we just grabbed from the database
                $sql = "UPDATE article SET users_id = {$result[0]->id}";

                $this->db->query($sql);
            }
                            //addForeignKey function passes in the ("name of the article from the first table", "name of the table we are linking to", "name of the column from the table we are linking to", 
                            //"Call CASCADE for updates", "Call CASCADE for deletes", "name of the foreign key" )
            $this->forge->addForeignKey("users_id", "users", "id",
                                            "CASCADE", "CASCADE", "article_users_id_fk");
                            //CASCADE means that when a parent recorded changed (updated or deleted) the corresponding child object is too.
            $this->forge->processIndexes("article");

            //NOTE -- Both linked columns "users_id" and "id" must have the same data types/"rules"
    }

    public function down()
    {
        $this->forge->dropForeignKey("article", "article_users_id_fk");
        $this->forge->dropColumn("article", "users_id");
}
}