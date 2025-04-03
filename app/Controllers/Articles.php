<?php

namespace App\Controllers;

class Articles extends BaseController 
{
    public function index()
    {
        $db = db_connect();
        $db->listTables();
        return view ("Articles/index");
    }
}