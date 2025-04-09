<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Articles extends BaseController 
{
    public function index() //provides the list of articles based on the ArticleModel which handles the Articles table data.
    {

        $model = new ArticleModel;
        
        $data = $model->findAll(); //grabs all articles
        
        return view ("Articles/index", [ //inputs the article data into the index view to be displayed
            "articles" => $data
        ]);
    }

    public function show($id) // provides one article based on the id of the article within the Articles table
    {
        $model = new ArticleModel;

       $article = $model->find($id); //grabs one article by id

        return view("Articles/show", [ //inputs the data for the given article into the show view.
            "article" => $article
        ]);
    }

    public function new() //
    {
        return view("Articles/new");
    }
        
    
}