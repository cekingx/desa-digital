<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth';
$route['logout'] = 'Auth/logout';
$route['post_login'] = 'Auth/login';
$route['debug'] = 'Debug/index';

// begin::DESA
$route['desa']                                  = 'Desa/Dashboard/index';
$route['desa/identitas-desa']                   = 'Desa/Identitas_desa/index';
$route['desa/identitas-desa/edit']              = 'Desa/Identitas_desa/edit';
$route['desa/identitas-desa/update']            = 'Desa/Identitas_desa/update';
$route['desa/identitas-desa/kades']             = 'Desa/Identitas_desa/kades_index';
$route['desa/identitas-desa/kades/edit']        = 'Desa/Identitas_desa/kades_edit';
$route['desa/identitas-desa/kades/update']      = 'Desa/Identitas_desa/kades_update';
$route['desa/identitas-desa/sekdes']            = 'Desa/Identitas_desa/sekdes_index';
$route['desa/identitas-desa/sekdes/edit']       = 'Desa/Identitas_desa/sekdes_edit';
$route['desa/identitas-desa/sekdes/update']     = 'Desa/Identitas_desa/sekdes_update';
// end::DESA

// begin::CAPIL
$route['capil'] = 'Capil/Dashboard/index';
// end::CAPIL
