<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController 
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }
    public function index() //provides the list of articles based on the ArticleModel which handles the Articles table data.
    {

        
        
        $data = $this->model->findAll(); //grabs all articles
        
        return view ("Articles/index", [ //inputs the article data into the index view to be displayed
            "articles" => $data
        ]);
    }

    public function show($id) // provides one article based on the id of the article within the Articles table
    {
        
       $article = $this->getArticleOr404($id); //grabs one article by id OR spits out error if the id does not exist

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

        

        $article = new Article($this->request->getPost()); //will process the post request through the Article entity, which will set all properties of the object that are set within the ArticleModel (ie allowedFields)

        $id = $this->model->insert($article); //using the insert method to insert whatever we pull from the getPost request.

        if($id === false) {
            return redirect()->back() //redirects back to the original page
                             ->with("errors", $this->model->errors()) //displays errors based on the validation criteria in the ArticleModel
                             ->withInput(); //retains the input data in the form
        }
        return redirect()->to("articles/$id") //provides a redirect to a different page
                         ->with("message", "Blog entry created successfully."); //outputs a message after redirect
       
    }

    public function edit($id)
    {
        

       $article = $this->getArticleOr404($id); //grabs one article by id OR spits out error if the id does not exist

        return view("Articles/edit", [ //inputs the data for the given article into the show view.
            "article" => $article
        ]);
    }

    public function update($id)
    {
        
        $article = $this->getArticleOr404($id);

        $article->fill($this->request->getPost()); // use the Entity fill method during the getPost request to update the properties

        $article->__unset("_method");
        
        if ( ! $article->hasChanged()) {

            return redirect()->back()
                             ->with("message", "No changes have been made.");
        }

        if ($this->model->save($article)){ //save method will update the article that we have already selected which does nto require us to pass in the id object, just the article object

            return redirect()->to("articles/$id") //provides a redirect to a different page
                             ->with("message", "Blog entry updated successfully."); //outputs a message after redirect

        }

        
         
         return redirect()->back() //redirects back to the original page
                          ->with("errors", $this->model->errors()) //displays errors based on the validation criteria in the ArticleModel
                          ->withInput(); //retains the input data in the form
        
       
    }

    public function confirmDelete($id)
    {
        $article = $this->getArticleOr404($id);

        return view("Articles/delete", [
            "article" =>$article
        ]);

    }

    public function delete($id)
    {
            $article = $this->getArticleOr404($id);
        
            $this->model->delete($id);

            return redirect()->to("articles")
                             ->with("message", "Your blog entry was deleted.");

        
    }

    private function getArticleOr404($id): Article
    {
        $article = $this->model->find($id); //grabs one article by id OR spits out error if the id does not exist

       if ($article === null){ //if the ID does not exist it will show the built in PageNotFoundException, otherwise it will return the article via id as normal
        throw new PageNotFoundException("Blog entry with id $id not found");
       }

        return $article;
    }
        
    
}