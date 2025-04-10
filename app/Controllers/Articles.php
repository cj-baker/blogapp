<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;

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
        return view("Articles/new", [
            "article" => new Article
        ]);
    }

    public function create()
    {

        $model = new ArticleModel;

        $id = $model->insert( $this->request->getPost()); //using the insert method to insert whatever we pull from the getPost request.

        if($id === false) {
            return redirect()->back() //redirects back to the original page
                             ->with("errors", $model->errors()) //displays errors based on the validation criteria in the ArticleModel
                             ->withInput(); //retains the input data in the form
        }
        return redirect()->to("articles/$id") //provides a redirect to a different page
                         ->with("message", "Blog entry created successfully."); //outputs a message after redirect
       
    }

    public function edit($id)
    {
        $model = new ArticleModel;

       $article = $model->find($id); //grabs one article by id

        return view("Articles/edit", [ //inputs the data for the given article into the show view.
            "article" => $article
        ]);
    }

    public function update($id)
    {
        $model = new ArticleModel;

        if ($model->update($id, $this->request->getPost())) //using the update method to insert whatever we pull from the getPost request.
        {
            return redirect()->to("articles/$id") //provides a redirect to a different page
                             ->with("message", "Blog entry updated successfully."); //outputs a message after redirect

        }
         
         return redirect()->back() //redirects back to the original page
                          ->with("errors", $model->errors()) //displays errors based on the validation criteria in the ArticleModel
                          ->withInput(); //retains the input data in the form
        
       
    }
        
    
}