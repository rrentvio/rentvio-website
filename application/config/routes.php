<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['giris'] = "home/index";
$route['giris-yap'] = "users/login";
$route['homepage/(:any)'] = "home/homepage/$1";
$route['homepage'] = "home/index";
$route['logout/(:any)'] = "users/logout/$1";     //temporary --7over  (not temprory anymore @v8) 
$route['profile/(:any)'] = "userprofile/profile/$1";
//$route['addproduct/(:any)'] = "userprofile/addproduct/$1";  taşındı 
$route['addproductdb/(:any)'] = "fileupload/addproduct/$1";
$route['editproductdb/(:any)'] = "fileupload/editproduct/$1";
$route['deleteproductdb/(:any)'] = "fileupload/deleteproduct/$1";   
$route['profile'] = "userprofile";
//$route['signup'] = "signup";
$route['sign-up'] = "signup/addusr";  
//$route['signup/(:any)'] = "signup/$1";
$route['dropzone/(:any)'] = "fileupload/dropzone/$1"; //dropzone deneme amaçlı silinecek ()
$route['deleteimage/(:any)'] = "fileupload/deletedropzone/$1";
$route['product/(:any)'] = "product/getdetails/$1";
$route['pedit/(:any)'] = "profileedit/auth/$1";
$route['pupdtusr/(:any)'] = "profileedit/ppupdate/$1";
$route['updtusrp/(:any)'] = "profileedit/passupdate/$1";
$route['updtusrn/(:any)'] = "profileedit/nameupdate/$1";
$route['deneme/(:any)'] = "product/date/$1";
$route['payment/(:any)'] = "product/getdetailsforpayment/$1";
$route['confirm/(:any)'] = "payment/addb/$1";
