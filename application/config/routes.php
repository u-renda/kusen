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
$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* MAIN */
$route['index'] = 'beranda/index';
$route['produk/(:any)'] = 'produk/index/$1';
$route['produk/(:any)/(:any)'] = 'produk/index/$1';

/* ADMIN */
$route['admin'] = 'admin/login/index';
$route['admin/admin_create'] = 'admin/lainnya/admin_create';
$route['admin/admin_delete'] = 'admin/lainnya/admin_delete';
$route['admin/admin_get'] = 'admin/lainnya/admin_get';
$route['admin/admin_lists'] = 'admin/lainnya/admin_lists';
$route['admin/admin_update'] = 'admin/lainnya/admin_update';
$route['admin/akun_saya'] = 'admin/lainnya/akun_saya';
$route['admin/galeri'] = 'admin/galeri/galeri_lists';
$route['admin/galeri_create'] = 'admin/galeri/galeri_create';
$route['admin/galeri_delete'] = 'admin/galeri/galeri_delete';
$route['admin/galeri_get'] = 'admin/galeri/galeri_get';
$route['admin/galeri_update'] = 'admin/galeri/galeri_update';
$route['admin/keunggulan'] = 'admin/keunggulan/keunggulan_lists';
$route['admin/keunggulan_create'] = 'admin/keunggulan/keunggulan_create';
$route['admin/keunggulan_delete'] = 'admin/keunggulan/keunggulan_delete';
$route['admin/keunggulan_get'] = 'admin/keunggulan/keunggulan_get';
$route['admin/keunggulan_update'] = 'admin/keunggulan/keunggulan_update';
$route['admin/logout'] = 'admin/login/logout';
$route['admin/pengaturan'] = 'admin/lainnya/pengaturan_lists';
$route['admin/pengaturan_create'] = 'admin/lainnya/pengaturan_create';
$route['admin/pengaturan_delete'] = 'admin/lainnya/pengaturan_delete';
$route['admin/pengaturan_get'] = 'admin/lainnya/pengaturan_get';
$route['admin/pengaturan_update'] = 'admin/lainnya/pengaturan_update';
$route['admin/produk'] = 'admin/produk/produk_lists';
$route['admin/produk_create'] = 'admin/produk/produk_create';
$route['admin/produk_delete'] = 'admin/produk/produk_delete';
$route['admin/produk_get'] = 'admin/produk/produk_get';
$route['admin/produk_update'] = 'admin/produk/produk_update';
$route['admin/produk_tipe'] = 'admin/produk/produk_tipe_lists';
$route['admin/produk_tipe_create'] = 'admin/produk/produk_tipe_create';
$route['admin/produk_tipe_delete'] = 'admin/produk/produk_tipe_delete';
$route['admin/produk_tipe_detail'] = 'admin/produk/produk_tipe_detail_lists';
$route['admin/produk_tipe_detail_create'] = 'admin/produk/produk_tipe_detail_create';
$route['admin/produk_tipe_detail_delete'] = 'admin/produk/produk_tipe_detail_delete';
$route['admin/produk_tipe_detail_get'] = 'admin/produk/produk_tipe_detail_get';
$route['admin/produk_tipe_detail_update'] = 'admin/produk/produk_tipe_detail_update';
$route['admin/produk_tipe_get'] = 'admin/produk/produk_tipe_get';
$route['admin/produk_tipe_update'] = 'admin/produk/produk_tipe_update';
$route['admin/slider'] = 'admin/slider/slider_lists';
$route['admin/slider_create'] = 'admin/slider/slider_create';
$route['admin/slider_delete'] = 'admin/slider/slider_delete';
$route['admin/slider_get'] = 'admin/slider/slider_get';
$route['admin/slider_update'] = 'admin/slider/slider_update';
$route['admin/testimonial'] = 'admin/testimonial/testimonial_lists';
$route['admin/testimonial_create'] = 'admin/testimonial/testimonial_create';
$route['admin/testimonial_delete'] = 'admin/testimonial/testimonial_delete';
$route['admin/testimonial_get'] = 'admin/testimonial/testimonial_get';
$route['admin/testimonial_update'] = 'admin/testimonial/testimonial_update';
