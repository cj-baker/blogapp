<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
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
        ]

        );
    
       
    }
    

    public function addCategory()
    {
        $category = new Category($this->request->getPost()); //will process the post request through the Article entity, which will set all properties of the object that are set within the ArticleModel (ie allowedFields)

        $category_id = $this->model->insert($category); //using the insert method to insert whatever we pull from the getPost request.

        if($category_id === false) {
            return redirect()->back() //redirects back to the original page
                             ->with("errors", $this->model->errors()) //displays errors based on the validation criteria in the ArticleModel
                             ->withInput(); //retains the input data in the form
        }
        return redirect()->back() //provides a redirect to a different page
                         ->with("message", "Category added successfully."); //outputs a message after redirect
       
    }

    public function delete($category_id)
    {
           
        
        $category = $this->getCategoryOr404($category_id);
        $this->model->delete($category_id);

            return redirect()->to("categories")
                             ->with("message", "Category deleted.");

        
    }
    private function getCategoryOr404($category_id): Category
    {
        $category = $this->model->find($category_id); //grabs one article by id OR spits out error if the id does not exist

       if ($category === null){ //if the ID does not exist it will show the built in PageNotFoundException, otherwise it will return the article via id as normal
        throw new PageNotFoundException("Category with id $category_id not found");
       }

        return $category;
    }

}
