<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//using the group method allows you to group routes that are using the same root and controller namespace.
$routes->group("admin", ["namespace" => "Admin\Controllers"], static function ($routes){ 
    $routes->get("users", "Users::index");
    $routes->get("users/(:num)", "Users::show/$1");
    $routes->post("users/(:num)/toggle-ban", "Users::toggleBan/$1");
});
 