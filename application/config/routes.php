<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This route is used to user login
$route['default_controller'] = 'user';
$route["logout"] = 'user/logout';
$route["forgot-password"] = 'user/forgotpassword';
$route["usernamecheck"] = 'user/usernamecheck';
$route["password-reset"] = 'user/password_reset';




$route["dashboard"]                                    = "dashboard/index";

$route["dashboard/add/user"]                           = 'user/add_user';
$route["dashboard/user"]                               = 'user/view_user';
$route["dashboard/edit/user/(:any)"]                   = 'user/edit/$1';

$route["dashboard/add/leads"]                          =  "leads/add"; 
$route["dashboard/leads"]                              =  "leads/viewdata"; 
$route["dashboard/leads/agent/(:any)"]                 =  "leads/assign_agent/$1"; 
$route["dashboard/assign/leads/(:any)"]                =  "leads/assign";
$route["dashboard/edit/leads/(:any)"]                  =  "leads/edit/$1";
$route["dashboard/delete/leads/(:any)"]                =  "leads/destroy/$1"; 

$route["dashboard/add/category"]                       =  "category/add";
$route["dashboard/category"]                           =  "category/viewdata";
$route["dashboard/edit/category/(:any)"]               =  "category/edit/$1";
$route["dashboard/delete/category/(:any)"]             =  "category/destroy/$1";


$route["dashboard/add/department"]                     =  "deparment/add";
$route["dashboard/department"]                         =  "department/viewdata";
$route["dashboard/edit/department/(:any)"]             =  "department/edit/$1";
$route["dashboard/delete/department/(:any)"]           =  "department/destroy/$1";

// This routes are used for products crud operation

// $route["products/add"] = "products/addproducts";
// $route["products/edit/(:any)"] = "products/editproducts/$1";
// $route["products/update/(:any)"] = "products/updateproducts/$1";
// $route["products/delete/(:any)"] = "products/deleteproducts/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
