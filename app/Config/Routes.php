<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes); //shield authorization routes
//$routes->resource("articles", ["placeholder" => "(:num)"]); // the resource route automatically generates all of the RESTful crud routes below
$routes->get("/articles", "Articles::index");
$routes->get("articles/(:num)", "Articles::show/$1");
$routes->group("", ["filter" => "group: admin, user"], static function ($routes){
    $routes->get("articles/new", "Articles::new");
    $routes->post("articles", "Articles::create");
    $routes->get("articles/(:num)/edit", "Articles::edit/$1");
    $routes->patch("articles/(:num)", "Articles::update/$1"); 
    $routes->delete("articles/(:num)", "Articles::delete/$1");
    $routes->get("articles/(:num)/delete", "Articles::confirmDelete/$1");
   
    $routes->get("set-password", "Password::set");
    $routes->post("set-password", "Password::update");
});
