<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Entities\Article;
use App\Entities\Category;
use DateTime;

use function PHPUnit\Framework\stringStartsWith;

class Search extends BaseController 
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }
 
    public function search() {

        $searchInput = $this->request->getPost(esc("search"));
        $categories = new CategoryModel;
        $categories = $categories->findAll();

        $data = $this->model
                     ->select("article.*, users.username")
                     //selecting all columns from the article table, but only the username from the users table
                     ->like("article.content", $searchInput, "both")

                     ->orLike("article.title", $searchInput, "both")
                     
                     ->join("users", "users.id = article.users_id")
                     //then join to the users table, the id from the users table and the users_id from the article table
                     ->orderBy("created_at DESC")
                     //order the below paginate list by created date
                     ->paginate(3); 
                     //grabs all articles and puts them into pages with the number passed being the amount of records per page
        

                     return view ("Search/search", [ //inputs the article data into the index view to be displayed
                        "articles" => $data,
                        "pager" => $this->model->pager,
                        "search" => $searchInput,
                        "categories" => $categories
                    ]);

    }
    public function archive()
    {
        
        $archiveDate = $this->request->getPost("archive");
        $rangeDate = Time::parse($archiveDate)->addMonths(1)->toLocalizedString();
        
        $data = $this->model
                
                ->select("article.*, users.username")
                //selecting all columns from the article table, but only the username from the users table
                ->where("article.created_at >=", $archiveDate)
                ->where("article.created_at <", $rangeDate)
                ->join("users", "users.id = article.users_id")
                //then join to the users table, the id from the users table and the users_id from the article table
                ->orderBy("created_at DESC")
                //order the below paginate list by created date
                ->paginate(3); 
                //grabs all articles and puts them into pages with the number passed being the amount of records per page


                return view ("Search/archive", [ //inputs the article data into the index view to be displayed
                "articles" => $data,
                "pager" => $this->model->pager,
                "archive" => $archiveDate
            ]);  
        
    }
    public function category($id) // provides one article based on the id of the article within the Articles table
    {
       $categoryId = $id;
       $categories = new CategoryModel;
       $category = $categories->select("categories.name")
                              ->where("categories.id = $categoryId")
                              ->first();
                              
                            
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
    public function tag($tag) {
       $articles = new ArticleModel;
       $data = $articles
                     ->select("article.*, users.username")
                     //selecting all columns from the article table, but only the username from the users table
                     ->like("article.tags", $tag, "both")
                     
                     ->join("users", "users.id = article.users_id")
                     //then join to the users table, the id from the users table and the users_id from the article table
                     ->orderBy("created_at DESC")
                     //order the below paginate list by created date
                     ->paginate(3); 
                     //grabs all articles and puts them into pages with the number passed being the amount of records per page
       
       return view("Search/tag", [ //inputs the data for the given article into the show view.
            "articles" => $data,
            "pager" => $this->model->pager,
            "tag" => $tag
        ]);
    }
    
    }

    
    

