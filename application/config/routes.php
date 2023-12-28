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
|	https://codeigniter.com/userguide3/general/routing.html
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
// Route untuk halaman dashboard_data_wisata
$route['visit/dashboard/wisata_dash_data'] = 'visit/dashboard_data_wisata';

// Route untuk halaman dash_data_wisata_user
$route['visit/dashboard/dash_wisata_user'] = 'visit/dash_data_wisata_user';

// Route untuk halaman dash_data_wisata_admin
$route['visit/dashboard/dash_wisata_admin'] = 'visit/dash_data_wisata_admin';

$route['visit/dashboard/dash_wisata_komen'] = 'visit/dash_data_wisata_komen';

// Route untuk halaman tambah data user
$route['visit/dashboard/dash_wisata_user/tambah_data_user'] = 'visit/tambah_data_user';

// Route untuk halaman tambah data wisata
$route['visit/dashboard/wisata_dash_data/tambah_data_wisata'] = 'visit/tambah_data_wisata';

// Route untuk halaman detail data wisata
$route['visit/dashboard/wisata_dash_data/detail_wisata/(:any)'] = 'visit/detail_wisata/$1';

// Route untuk halaman ubah data wisata
$route['visit/dashboard/wisata_dash_data/ubah_data_wisata/(:any)'] = 'visit/ubah_data_wisata/$1';


// Route untuk halaman ubah data user
$route['visit/dashboard/dash_wisata_user/ubah_data_user/(:any)'] = 'visit/ubah_data_user/$1';

// Route untuk halaman tambah data admin
$route['visit/dashboard/wisata_dash_admin/tambah_data_admin'] = 'visit/tambah_data_admin';

// Route untuk halaman ubah data admin
$route['visit/dashboard/dash_wisata_admin/ubah_data_admin/(:any)'] = 'visit/ubah_data_admin/$1';


// Route untuk halaman komen
$routes['visit/dash_data_wisata_komen/(:any)'] = 'visit/dash_data_wisata_komen/$1';



// Route untuk halaman hubungi 
$route['visit/dashboard/dash_wisata_hubungi'] = 'visit/wisata_dash_hubungi';

$route['default_controller'] = 'visit';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
