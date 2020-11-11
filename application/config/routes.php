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
$route['unauthorized'] = 'Custom_error/unauthorized';
$route['debug'] = 'Debug/index';

// begin::SUPER
// begin::admin-desa
$route['super'] = 'Super/Dashboard/index';
$route['super/admin-desa'] = 'Super/Admin_desa/index';
$route['super/admin-desa/create'] = 'Super/Admin_desa/create';
$route['super/admin-desa/store'] = 'Super/Admin_desa/store';
$route['super/admin-desa/get-admin-desa'] = 'Super/Admin_desa/get_admin_desa';
// end::admin-desa

// begin::admin-capil
$route['super/admin-capil'] = 'Super/Admin_capil/index';
$route['super/admin-capil/create'] = 'Super/Admin_capil/create';
$route['super/admin-capil/store'] = 'Super/Admin_capil/store';
$route['super/admin-capil/get-admin-capil'] = 'Super/Admin_capil/get_admin_capil';
// end::admin-capil
// end::SUPER

// begin::DESA
// begin::identitas-desa
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

//banjar
$route['desa/banjar']                           = 'Desa/Banjar/index';
$route['desa/banjar/create']                    = 'Desa/Banjar/create';
$route['desa/banjar/edit']                      = 'Desa/Banjar/edit';
$route['desa/banjar/update']                    = 'Desa/Banjar/update';
$route['desa/banjar/store']                     = 'Desa/Banjar/store';
$route['desa/banjar/data']                      = 'Desa/Banjar/banjar_data';

//pengumuman
$route['desa/pengumuman']                       = 'Desa/Pengumuman/index';
$route['desa/pengumuman/create']                = 'Desa/Pengumuman/create';
$route['desa/pengumuman/edit']                  = 'Desa/Pengumuman/edit';
$route['desa/pengumuman/update']                = 'Desa/Pengumuman/update';
$route['desa/pengumuman/store']                 = 'Desa/Pengumuman/store';
$route['desa/pengumuman/data']                  = 'Desa/Pengumuman/pengumuman_data';
$route['desa/pengumuman/(:any)']                = 'Desa/Pengumuman/show/$1';

//galeri
$route['desa/galeri']                           = 'Desa/Galeri/index';
$route['desa/galeri/create']                    = 'Desa/Galeri/create';
$route['desa/galeri/store']                     = 'Desa/Galeri/store';
$route['desa/galeri/data']                      = 'Desa/Galeri/galeri_data';
// end::identitas-desa

// begin::pengajuan
$route['desa/pengajuan']                        = 'Desa/Pengajuan/index';
$route['desa/pengajuan/data-pengajuan']         = 'Desa/Pengajuan/get_pengajuan';
$route['desa/pengajuan/show/(:any)']            = 'Desa/Pengajuan/show/$1';
$route['desa/pengajuan/buat-pengajuan']         = 'Desa/Pengajuan/buat_pengajuan';
$route['desa/pengajuan/pilih-layanan']          = 'Desa/Pengajuan/pilih_layanan';
$route['desa/pengajuan/data-masyarakat']        = 'Desa/Pengajuan/get_data_masyarakat';
$route['desa/pengajuan/set-nik-to-session']     = 'Desa/Pengajuan/set_nik_to_session';
// end::pengajuan

// begin::penerbitan-kk
$route['desa/pengajuan/penerbitan-kk-baru']                 = 'Desa/Penerbitan_kk/index'; /** @deprecated */
$route['desa/pengajuan/penerbitan-kk-baru/create']          = 'Desa/Penerbitan_kk/penerbitan_kk_baru';
$route['desa/pengajuan/penerbitan-kk-baru/store']           = 'Desa/Penerbitan_kk/store_penerbitan_kk_baru';
$route['desa/pengajuan/penerbitan-kk-baru/detail-f101']     = 'Desa/Penerbitan_kk/input_detail_f101';
// end::penerbitan-kk

// begin::f101
$route['desa/pengajuan/f101']                   = 'Desa/f101/index';
$route['desa/pengajuan/data-f101']              = 'Desa/f101/get_f101';
$route['desa/pengajuan/f101/(:any)']            = 'Desa/f101/show/$1';
// end::f101

// begin::penerbitan-ktp
$route['desa/pengajuan/penerbitan-ktp-baru/create'] = 'Desa/Penerbitan_ktp/penerbitan_ktp_baru';
$route['desa/pengajuan/penerbitan-ktp-baru/store'] = 'Desa/Penerbitan_ktp/store_penerbitan_ktp_baru';
// end::penerbitan-ktp
// end::DESA

// begin::CAPIL
$route['capil']                     = 'Capil/Dashboard/index';
$route['capil/get_all_wilayah']     = 'Capil/Wilayah/get_all_wilayah';

// begin::penerbitan-kk
$route['capil/pengajuan/penerbitan-kk-baru']                        = 'Capil/Penerbitan_kk/index';
$route['capil/pengajuan/penerbitan-kk-baru/data-pengajuan']         = 'Capil/Penerbitan_kk/get_data_pengajuan';
$route['capil/pengajuan/penerbitan-kk-baru/set-status-pengajuan']   = 'Capil/Penerbitan_kk/set_status_pengajuan';
$route['capil/pengajuan/penerbitan-kk-baru/show/(:any)']            = 'Capil/Penerbitan_kk/show/$1';
// end::penerbitan-kk

// begin::f101
$route['capil/pengajuan/f101/generate/(:any)']      = 'Capil/f101/generate/$1';
$route['capil/pengajuan/f101/(:any)']               = 'Capil/f101/show/$1';
// end::f101

// begin::penerbitan-ktp
$route['capil/pengajuan/penerbitan-ktp-baru']                       = 'Capil/Penerbitan_ktp/index';
$route['capil/pengajuan/penerbitan-ktp-baru/data-pengajuan']        = 'Capil/Penerbitan_ktp/get_data_pengajuan';
$route['capil/pengajuan/penerbitan-ktp-baru/set-status-pengajuan']  = 'Capil/Penerbitan_ktp/set_status_pengajuan';
$route['capil/pengajuan/penerbitan-ktp-baru/show/(:any)']           = 'Capil/Penerbitan_ktp/show/$1';
// end::penerbitan-ktp
// end::CAPIL

// begin::UMUM
$route['umum'] = 'Umum/Dashboard/index';

// begin::pengajuan
$route['umum/pengajuan/daftar-pengajuan']   = 'Umum/Pengajuan/index';
$route['umum/pengajuan/data-pengajuan']     = 'Umum/Pengajuan/get_data_pengajuan';
$route['umum/pengajuan/pilih-layanan']      = 'Umum/Pengajuan/pilih_layanan';
$route['umum/pengajuan/show/(:any)']        = 'Umum/Pengajuan/show/$1';
// end::pengajuan

// begin::penerbitan-kk-baru
$route['umum/pengajuan/penerbitan-kk-baru/create']          = 'Umum/Penerbitan_kk/penerbitan_kk_baru';
$route['umum/pengajuan/penerbitan-kk-baru/store']           = 'Umum/Penerbitan_kk/store_penerbitan_kk_baru';
$route['umum/pengajuan/penerbitan-kk-baru/detail-f101']     = 'Umum/Penerbitan_kk/input_detail_f101';
// end::penerbitan-kk-baru

// begin::f101
$route['umum/pengajuan/f101/generate/(:any)']   = 'Umum/f101/generate/$1';
$route['umum/pengajuan/f101/(:any)']            = 'Umum/f101/show/$1';
// end::f101

// begin::penerbitan-ktp-baru
$route['umum/pengajuan/penerbitan-ktp-baru/create']     = 'Umum/Penerbitan_ktp/penerbitan_ktp_baru';
$route['umum/pengajuan/penerbitan-ktp-baru/store']      = 'Umum/Penerbitan_ktp/store_penerbitan_ktp_baru';
// end::penerbitan-ktp-baru

// begin::identitas-desa
$route['umum/identitas-desa'] = 'Umum/Identitas_desa/index';
$route['umum/identitas-desa/kades'] = 'Umum/Identitas_desa/kades_index';
$route['umum/identitas-desa/sekdes'] = 'Umum/Identitas_desa/sekdes_index';
// end::identitas-desa

// end::UMUM
