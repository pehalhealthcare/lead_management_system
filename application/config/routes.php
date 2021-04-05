<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This route is used to user login
$route['default_controller'] = 'user';
$route["logout"] = 'user/logout';

// This routes are used for products crud operation
$route["products"] = "products/index";
$route["products/add"] = "products/addproducts";
$route["products/edit/(:any)"] = "products/editproducts/$1";
$route["products/update/(:any)"] = "products/updateproducts/$1";
$route["products/delete/(:any)"] = "products/deleteproducts/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
