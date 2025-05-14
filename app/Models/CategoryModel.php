<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'category_id';
    protected $allowedFields    = ['name', 'ordering'];

    protected $useTimestamps = true;

    protected $returnType = \App\Entities\Category::class;

    protected $validationRules =[  //putting validation rules within the Model avoids repeating validation rules within Controllers
        "name" => "required|max_length[255]|is_unique[categories.name]",
        
     ];


    protected $validationMessages = [ //Assign custom error messages for the above validation rules.
        "name" => [
            "required" => "Please enter a category name.",
            "max_length" => "The category {field} must be less than {param}.",
            "is_unique" => "A category of that {field} already exists. Please try a different name."
        ]
    
        ];
}

