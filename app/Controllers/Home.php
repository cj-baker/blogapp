<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;

class Home extends BaseController
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }
    public function index()
    {
        if (session("magicLogin")) { //Will detect if they have gone through the magic login process, and direct them to reset password if so.
            return redirect()->to("set-password")
                             ->with("message", "Please update your password.");
        }
        return view("Home/index");
    }

    public function articles() {    
        $data = $this->model
                     ->select("article.*, users.username")
                     //selecting all columns from the article table, but only the username from the users table
                     ->join("users", "users.id = article.users_id")
                     //then join to the users table, the id from the users table and the users_id from the article table
                     ->orderBy("created_at")
                     //order the below paginate list by created date
                     ->paginate(3); 
                     //grabs all articles and puts them into pages with the number passed being the amount of records per page
        
        return view ("Home/index", [ //inputs the article data into the index view to be displayed
            "articles" => $data,
            "pager" => $this->model->pager
        ]);
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();

        $email->setTo("casey_abc_123@hotmail.com");
        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>Blog App</i>");

        if ($email->send()){

            echo "Email sent";
        } else {

            echo "Email was NOT sent.";
        }
    }
}
