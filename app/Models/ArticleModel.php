<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
 protected $table = "article";

 protected $allowedFields =["title", "content"];


 protected $validationRules =[  //putting validation rules within the Model avoids repeating validation rules within Controllers
    "title" => "required|max_length[128]",
    "content" => "required"
 ];

 protected $validationMessages = [ //Assign custom error messages for the above validation rules.
    "title" => [
        "required" => "Please enter a title.",
        "max_length" => "The blog {field} must be less than {param}."
    ],
    "content" => [
        "required" => "Please provide content for the blog."
    ]
    ];
}