<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Article;
use App\Models\CategoryModel;
use App\Models\ArticleModel;
use App\Entities\Category;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class Categories extends BaseController
{

    private CategoryModel $model;

    public function __construct()
    {
        $this->model = new CategoryModel;
    }
    public function index()
    {
        $data = $this->model
                     ->findAll();
                              
        return view("Settings\Categories\categories", [
            "categories" => $data
        ] ); 
        return view("Search\archive", [
            "categories" => $data
        ] ); 

    }
    
    public function addCategory()
    {
        $category = new Category($this->request->getPost()); //will process the post request through the Article entity, which will set all properties of the object that are set within the ArticleModel (ie allowedFields)

        $id = $this->model->insert($category); //using the insert method to insert whatever we pull from the getPost request.

        if($id === false) {
            return redirect()->back() //redirects back to the original page
                             ->with("errors", $this->model->errors()) //displays errors based on the validation criteria in the ArticleModel
                             ->withInput(); //retains the input data in the form
        }
        return redirect()->back() //provides a redirect to a different page
                         ->with("message", "Category added successfully."); //outputs a message after redirect
       
    }

    public function delete($id)
    {
           
        
        $category = $this->getCategoryOr404($id);
        $this->model->delete($id);

            return redirect()->to("categories")
                             ->with("message", "Category deleted.");

        
    }
    public function show($id) // provides one article based on the id of the article within the Articles table
    {
       $category = $this->getCategoryOr404($id);
       $categoryId = $id;
       $categoryName = $category->name;
       $articles = new ArticleModel;
       $data = $articles
                     ->select("article.*, users.username")
                     //selecting all columns from the article table, but only the username from the users table
                     ->where("article.category_id = $categoryId")
                     
                     ->join("users", "users.id = article.users_id")
                     //then join to the users table, the id from the users table and the users_id from the article table
                     ->orderBy("created_at DESC")
                     //order the below paginate list by created date
                     ->paginate(3); 
                     //grabs all articles and puts them into pages with the number passed being the amount of records per page
       
       return view("Search/category", [ //inputs the data for the given article into the show view.
            "articles" => $data,
            "pager" => $this->model->pager,
            "category" => $categoryName
        ]);
    }
    private function getCategoryOr404($id): Category
    {
        $category = $this->model->find($id); //grabs one article by id OR spits out error if the id does not exist

       if ($category === null){ //if the ID does not exist it will show the built in PageNotFoundException, otherwise it will return the article via id as normal
        throw new PageNotFoundException("Category with id $id not found");
       }

        return $category;
    }

}
