<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//generate app
$router->get('/key', function(){
    return Str::random(32);
});

//TABELBAHAN
$router->get('/bahan', 'bahancontroller@index');
$router->post('/bahan', 'bahancontroller@post');
$router->get('/bahan/{id}', 'bahancontroller@getid');
$router->put('/bahan/{id}', 'bahanController@update');
$router->delete('/bahan/{id}', 'bahanController@del');


//TABELKEUANGAN
$router->get('/keuangan', 'keuangancontroller@index');
$router->post('/keuangan', 'keuangancontroller@post');
$router->get('/keuangan/{id}', 'keuangancontroller@getid');
$router->put('/keuangan/{id}', 'keuangancontroller@update');




//TABEL MENU
$router->get('/menu', 'menucontroller@index');
$router->post('/menu', 'menucontroller@post');
$router->get('/menu/{id}', 'menucontroller@getid');
$router->put('/menu/{id}', 'menucontroller@update');


//TABEL MENU_BAHAN
$router->get('/menu_bahan', 'menu_bahancontroller@index');
$router->post('/menu_bahan', 'menu_bahancontroller@post');
$router->get('/menu_bahan/{id}', 'menu_bahancontroller@getid');
$router->put('/menu_bahan/{id}', 'menu_bahancontroller@update');


//TABEL PEMBELIAN
$router->get('/pembelian', 'pembeliancontroller@index');
$router->post('/pembelian', 'pembeliancontroller@post');
$router->get('/pembelian/{id}', 'pembeliancontroller@getid');
$router->put('/pembelian/{id}', 'pembeliancontroller@update');



//TABEL PEMBELIAN_DETAIL
$router->get('/pembelian_detail', 'pembelian_detailcontroller@index');
$router->post('/pembelian_detail', 'pembelian_detailcontroller@post');
$router->get('/pembelian_detail/{id}', 'pembelian_detailcontroller@getid');
$router->put('/pembelian_detail/{id}', 'pembelian_detailcontroller@update');


//TABEL PENGELUARAN
$router->get('/pengeluaran', 'pengeluarancontroller@index');
$router->post('/pengeluaran', 'pengeluarancontroller@post');
$router->get('/pengeluaran/{id}', 'pengeluarancontroller@getid');
$router->put('/pengeluaran/{id}', 'pengeluarancontroller@update');

//TABEL PENJUALAN
$router->get('/penjualan', 'penjualancontroller@index');
$router->post('/penjualan', 'penjualancontroller@post');
$router->get('/penjualan/{id}', 'penjualancontroller@getid');
$router->put('/penjualan/{id}', 'penjualancontroller@update');

//TABEL PENJUALAN_DETAIL
$router->get('/penjualan_detail', 'penjualan_detailcontroller@index');
$router->post('/penjualan_detail', 'penjualan_detailcontroller@post');
$router->get('/penjualan_detail/{id}', 'penjualan_detailcontroller@getid');
$router->put('/penjualan_detail/{id}', 'penjualan_detailcontroller@update');

//TABEL RETUR_BELI
$router->get('/retur_beli', 'retur_belicontroller@index');
$router->post('/retur_beli', 'retur_belicontroller@post');
$router->get('/retur_beli/{id}', 'retur_belicontroller@getid');
$router->put('/retur_beli/{id}', 'retur_belicontroller@update');

//TABEL SUPPLIER
$router->get('/supplier', 'suppliercontroller@index');
$router->post('/supplier', 'suppliercontroller@post');
$router->get('/supplier/{id}', 'suppliercontroller@getid');
$router->put('/supplier/{id}', 'suppliercontroller@update');

//TABEL USER
$router->get('/user', 'usercontroller@index');
$router->post('/user', 'usercontroller@post');
$router->get('/user/{id}', 'usercontroller@getid');
$router->put('/user/{id}', 'usercontroller@update');