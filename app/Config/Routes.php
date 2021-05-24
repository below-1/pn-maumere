<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/article', 'ArticleController::index');
$routes->get('/article/(:num)', 'ArticleController::show/$1');
$routes->get('/article/(:segment)', 'ArticleController::showSlug/$1');

$routes->get('/media', 'MediaController::index');
$routes->get('/media/(:num)', 'MediaController::show/$1');
$routes->get('/media/(:segment)', 'MediaController::showSlug/$1');

$routes->get('/sidang', 'Sidang::index');
// $routes->get('/profil-hakim-pegawai', function () {
//     $media = new \App\Controllers\Media();
//     return $media->listForTag('profil-staf');
// });
// $routes->get('/profil-pengadilan', function () {
//     $article = new \App\Controllers\Article();
//     return $article->listForTag('profil-pengadilan');
// });
// $routes->get('/profil-pengadilan/(:segment)', 'Article::showSlug\$1');
// $routes->get('/layanan-publik/(:segment)', 'Article::showSlug\$1');
// $routes->get('/layanan-hukum/(:segment)', 'Article::showSlug\$1');
// $routes->get('/berita', function () {
//     $article = new \App\Controllers\Article();
//     return $article->listForTag('berita');
// });
// $routes->get('/berita/(:id)/(:segment)', 'Article::show\$1\$2');
// $routes->get('/galeri', function () {
//     $media = new \App\Controllers\Media();
//     return $media->listForTag('galeri');
// });
// $routes->get('/kontak', function () {
//     $articleController = new \App\Controllers\Article();
//     return $articleController->showSlug('kontak');
// });

$routes->get('/admin', 'Admin\Home::index', ['as' => 'admin_home']);
$routes->get('/admin/article', 'Admin\AdArticle::index');
$routes->get('/admin/article/new', 'Admin\AdArticle::create_form');
$routes->post('/admin/article/new', 'Admin\AdArticle::create');
$routes->get('/admin/article/(:num)/update_content', 'Admin\AdArticle::update_content_form/$1');
$routes->post('/admin/article/(:num)/update_content', 'Admin\AdArticle::update_content/$1');
$routes->post('/admin/article/(:num)/upload_image', 'Admin\AdArticle::upload_image/$1');
$routes->get('/admin/upload_file', 'Admin\Home::upload_file_form');
// $routes->get('/admin/media/(:alpha)', 'Admin\AdMedia::list/$1', ['as' => 'admin_media_list']);
// $routes->get('/admin/media/(:alpha)/(:alpha)/new', 'Admin\AdMedia::create_form/$1/$2', ['as' => 'form_create_media']);
// $routes->get('/admin/media/(:alpha)/(:num)/update_info', 'Admin\AdMedia::update_form/$1/$2', ['as' => 'form_update_media_info']);
// $routes->post('/admin/media/(:alpha)/(:alpha)', 'Admin\AdMedia::create/$1/$2',['as' => 'create_media']);

$routes->get('(:any)', 'Pages::view/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
