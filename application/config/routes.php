<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This route is used to user login
$route['default_controller'] = 'user';
$route["logout"] = 'user/logout';
$route["forgot-password"] = 'user/forgotpassword';
$route["usernamecheck"] = 'user/usernamecheck';
$route["password-reset"] = 'user/password_reset';




$route["dashboard/"]                                        = "dashboard/index";

$route["dashboard/add/user"]                                = 'user/add_user';
$route["dashboard/user"]                                    = 'user/view_user';
$route["dashboard/edit/user/(:any)"]                        = 'user/edit_user/$1';
$route["dashboard/delete/user/(:any)"]                      = 'user/delete_user/$1';


$route["dashboard/lead/opporunity/delete/(:any)"]            = "leads/opportunity_delete/$1";

$route["dashboard/lead/activity/delete/(:any)"]              = "leads/activity_delete/$1";


$route["dashboard/add/leads"]                               =  "leads/add"; 
$route["dashboard/leads"]                                   =  "leads/viewdata"; 
$route["dashboard/leads/agent/(:any)"]                      =  "leads/assign_agent/$1"; 
$route["dashboard/leads/assign/(:any)"]                     =  "leads/assign_customer/$1"; 
$route["dashboard/leads/quotation/(:any)/(:any)/(:any)"]    =   "leads/lead_quotation/$1/$2/$3";
$route["dashboard/assign/leads/(:any)"]                     =  "leads/assign";
$route["dashboard/edit/leads/(:any)"]                       =  "leads/lead_edit/$1";
$route["dashboard/delete/leads/(:any)"]                     =  "leads/destroy/$1"; 
$route["dashboard/lead/generate_pdf/(:any)/(:any)"]         =  "quotation/generate_pdf/$1/$2";
$route["dashboard/lead/view_quotation/(:any)/(:any)"]       =  "quotation/view_quotation/$1/$2";
$route["dashboard/lead/generate_quotation/(:any)/(:any)"]   =  "quotation/generate_quotation/$1/$2";
$route["dashboard/order/submit"]                            =  "leads/ordersubmit";

$route["dashboard/leadcustomer"]                            = "leadcustomer/viewdata";
$route["dashboard/create/leadcustomer"]                     = "leadcustomer/add";
// $route["dashboard/leadcustomer/create"]                     = "leadcustomer/createcustomer";
$route["dashboard/leadcustomer/edit/(:any)"]                = "leadcustomer/editdata/$1";
$route["dashboard/leadcustomer/update/(:any)"]              = "leadcustomer/updatedata/$1";
$route["dashboard/leadcustomer/delete/(:any)"]              = "leadcustomer/deletedata/$1";


$route["dashboard/purchase-order"]                          = "purchaseorder/viewdata";
$route["dashboard/add/purchase-order/(:any)"]               = "purchaseorder/adddata/$1";
$route["dashboard/edit/purchase-order/(:any)"]              = "purchaseorder/editdata/$1";
$route["dashboard/delete/purchase-order/(:any)"]            = "purchaseorder/deletedata/$1";

$route["dashboard/test/sms/(:any)/(:any)/(:any)"]           = "ajax/sms_template_1/$1/$2/$3";



$route["dashboard/customer-item"]                           = "customer_item/viewdata";
$route["dashboard/add/customer-item/(:any)/(:any)"]         = "customer_item/adddata/$1/$2";
$route["dashboard/edit/customer-item/(:any)"]               = "customer_item/editdata/$1";
$route["dashboard/delete/customer-item/(:any)"]             = "customer_item/deletedata";

$route["dashboard/add/category"]                            =  "category/add_category";
$route["dashboard/category"]                                =  "category/view_category";
$route["dashboard/edit/category/(:any)"]                    =  "category/edit/$1";
$route["dashboard/delete/category/(:any)"]                  =  "category/delete_category/$1";


$route["dashboard/add/department"]                          =  "deparment/add";
$route["dashboard/department"]                              =  "department/viewdata";
$route["dashboard/edit/department/(:any)"]                  =  "department/edit/$1";
$route["dashboard/delete/department/(:any)"]                =  "department/destroy/$1";

// This routes are used for products crud operation



$route["dashboard/products"]                                = "products/index";
$route["dashboard/create/products"]                            = "products/addproducts";
$route["dashboard/product/import"]                          = "products/importproduct";
$route["dashboard/products/edit/(:any)"]                    = "products/editproducts/$1";
$route["dashboard/products/delete/(:any)"]                  = "products/deleteproducts/$1";

$route["dashboard/create/products/item"]                       = "products/add_item";
$route["dashboard/products/item/(:any)"]                    = "products/view_item/$1";
$route["dashboard/products/item/edit/(:any)"]               = "products/edit_item/$1";
$route["dashboard/products/item/delete/(:any)"]             = "products/delete_item/$1";

$route["dashboard/terms"]                                   = "products/view_term";
$route["dashboard/create/terms"]                            = "products/add_term";
$route["dashboard/terms/edit/(:any)"]                       = "products/edit_term/$1";
$route["dashboard/terms/delete/(:any)"]                     = "products/delete_term/$1";


//This routes are used for services

$route["dashboard/services"]                                = "services/index";
$route["dashboard/create/services"]                            = "services/addservices";
$route["dashboard/service/import"]                          = "services/importservice";
$route["dashboard/services/edit/(:any)"]                    = "services/editservices/$1";
$route["dashboard/services/delete/(:any)"]                  = "services/deleteservices/$1";

$route["dashboard/create/services/items"]                       = "services/add_services_item";
$route["dashboard/services/item/(:any)"]                    = "services/view_services_item/$1";
$route["dashboard/services/item/edit/(:any)"]               = "services/edit_services_item/$1";
$route["dashboard/services/item/delete/(:any)"]             = "services/delete_services_item/$1";

$route["dashboard/operation/order"]                         = "orders/order_details/" ;
$route["dashboard/operation/order/assign/(:any)"]           = "orders/order_assign/$1" ;
$route["dashboard/operation/order/view/(:any)"]            = "orders/order_view/$1";
$route["dashboard/operation/order/verification/(:any)"]     = "orders/order_verification/$1" ;
$route["dashboard/operation/payment/verification"]          = "orders/lead/payment_verification/";
$route["dashboard/operation/customer/verification"]         = "orders/lead/customer_verification/";




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
