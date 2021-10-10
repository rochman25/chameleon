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
$route['default_controller'] = 'Welcome';

$route['login']                 = 'user/Home/login';
$route['daftar']                = 'user/Home/register';
$route['keluar']                = 'user/Home/logout';
$route['profil']                = 'user/Home/profil';
$route['ubah_profile']          = 'user/home/ubah_profile';
$route['panduan/pemesanan']     = 'user/Home/panduan_pemesanan';
$route['panduan/retur']         = 'user/Home/panduan_return';
$route['panduan/ukuran']        = 'user/Home/panduan_ukuran';
$route['promo']                 = 'user/Home/promo';
$route['pembayaran']            = 'user/Home/konfirmasi';
$route['prosespembayaran']      = 'user/Home/konfirmasi_proses';
$route['search']                = 'user/Home/search';

$route['produk']        = 'user/Home/produk';
$route['produk/semua'] = 'user/Home/produk/semua';
$route['produk/(:any)'] = 'user/Home/produk/$1';
$route['detail']        = 'user/Home/produk_detail/';
$route['verifikasi']    = 'user/home/verifikasi';
$route['order']         = 'user/order/index';
$route['order_detail/(:any)']   = 'user/order/order_detail/$1';

$route['admin/prerelease'] = 'admin/PreRelease/index';
$route['admin/prerelease/tambah'] = 'admin/PreRelease/tambah';
$route['admin/prerelease/ubah/(:any)'] = 'admin/PreRelease/ubah';
$route['admin/prerelease/hapus'] = 'admin/PreRelease/hapus';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
