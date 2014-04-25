<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'api/blog1';
$route['404_override'] = '';
$route['admin'] = 'admin/dashboard';
$route['homepage'] = 'page/index';
//$route['blog/(:num)'] = 'page/index/$1';
//$route['blog'] = 'page/index';
//$route['blog/(:num)/(:any)'] = 'article/index/$1/$2';
//$route['blog/tag/(:any)'] = 'article/get_by_tag/$1';
$route['api'] = 'api/blog1';
$route['api/(:num)'] = 'api/blog1/$1';
$route['article/(:num)'] = 'api/index/$1';
$route['api/blog/(:num)'] = 'api/read/$1';
$route['api/blog'] = 'api/blog';
$route['api/blog/(:num)/(:any)'] = 'article/index/$1/$2';
$route['api/blog/tag/(:any)'] = 'article/get_by_tag/$1';
$route['article/no/(:num)'] = 'api/blog1/$1';
$route['article/no'] = 'api/blog1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */