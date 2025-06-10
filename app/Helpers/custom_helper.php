<?php
use App\Models\ArticleModel;
use App\Models\CategoryModel;

if(!function_exists("get_categories")) {
    function get_categories(){
        $categoryModel = new CategoryModel;
        $categories = $categoryModel->findAll();
        return $categories;
    }

}
if(!function_exists("get_tags")) {
    function get_tags(){
        $article = new ArticleModel;
        $tagsArray = [];
        $articles = $article->select("article.tags")->where("tags !=", NULL)->orderBy("created_at", "desc")->findAll();
        foreach($articles as $article) {
            array_push($tagsArray,$article->tags);
            
        }
        $tags = implode(",", $tagsArray);
        
        return array_unique(array_map('trim',array_filter(explode(',', $tags), 'trim')));
        
        
    }
}