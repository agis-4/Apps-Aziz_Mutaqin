<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// login
// Route::get('admin/login', 'AdminController@getLogin')->name('login');
// Route::post('admin/post-login', 'AdminLoginController@postLogin')->name('postLogin');
// Route::post('admin/post-login', 'AdminController@postLogin')->name('postLogin');
// Route::get('admin/logout', 'AdminController@logout')->name('logout');

// Main Controller
Route::get('/index_login','MainController@index')->name('main');
Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin')->name('dashboard');
Route::get('main/logout', 'MainController@logout')->name('logout');

// User Data
Route::get('/index_user','DataUserController@index')->name('index_us');
Route::get('/add_data','DataUserController@add_user')->name('add_user');
Route::post('/save_data_us','DataUserController@save_us')->name('save_us');
Route::get('/edit_data_us/{id}','DataUserController@edit_us')->name('edit_us');
Route::post('/save_edit_us','DataUserController@save_edit_us')->name('save_edit_us');
Route::get('/detail_data_us/{id}','DataUserController@detail_us')->name('detail_us');
Route::get('/delete_us/{id}','DataUserController@delete_us')->name('delete_us');

// Data Undangan Pribadi
Route::get('/dashboard','UndanganPribadiController@dashboard')->name('dashboard');
Route::get('/index_data','UndanganPribadiController@index')->name('index_up');
Route::get('/tambah_data_up','UndanganPribadiController@tambah')->name('input_up');
Route::post('/save_data_up','UndanganPribadiController@simpan')->name('save_up');
Route::get('/edit_data_up/{id}','UndanganPribadiController@edit')->name('edit_up');
Route::post('/save_edit_up','UndanganPribadiController@save')->name('save_edit_up');
Route::get('/detail_data_up/{id}','UndanganPribadiController@detail')->name('detail_up');
Route::get('/delete_up/{id}','UndanganPribadiController@delete')->name('delete_up');

// Data Undangan Keluarga
Route::get('/index_data_uk','UndanganKeluargaController@index_uk')->name('index_uk');
Route::get('/tambah_data_uk','UndanganKeluargaController@tambah_uk')->name('input_uk');
Route::post('/save_data_uk','UndanganKeluargaController@simpan_uk')->name('save_uk');
Route::get('/edit_data_uk/{id}','UndanganKeluargaController@edit_uk')->name('edit_uk');
Route::post('/save_edit_uk','UndanganKeluargaController@save_uk')->name('save_edit_uk');
Route::get('/detail_data_uk/{id}','UndanganKeluargaController@detail_uk')->name('detail_uk');
Route::get('/delete_uk/{id}','UndanganKeluargaController@delete_uk')->name('delete_uk');

// Test
Route::get('/new','UndanganKeluargaController@new')->name('new');

// Pengeluaran Uang
Route::get('/index_pengeluaran','PengeluaranController@index_pe')->name('index_pe');
Route::get('/tambah_data_pe','PengeluaranController@tambah_pe')->name('input_pe');
Route::post('/save_data_pe','PengeluaranController@simpan_pe')->name('save_pe');
Route::get('/edit_data_pe/{id}','PengeluaranController@edit_pe')->name('edit_pe');
Route::post('/save_edit_pe','PengeluaranController@save_pe')->name('save_edit_pe');
Route::get('/delete_pe/{id}','PengeluaranController@delete_pe')->name('delete_pe');

// List Photo
Route::get('/index_photo','PhotoController@index_photo')->name('index_photo');
Route::get('/tambah_data_photo','PhotoController@tambah_photo')->name('input_photo');
Route::post('/save_data_photo','PotoController@simpan_photo')->name('save_photo');



// AJAX DATA
Route::get('/get_user/{id}', function ($id)
{
	$us = DB::table('users')
            ->where('id',$id)            
			->first();
	return [
		'data' => $us
	];

})->name('ajax_get_user');

Route::get('/get_user_detail/{id}', function ($id)
{
	$show = DB::table('users')
            ->where('id',$id)            
			->first();
	return [
		'data' => $show
	];
})->name('ajax_get_user_detail');

// Ajak Undangan Pribadi
Route::get('/get_up/{id}', function ($id)
{
	$undangan = DB::table('undangan')
            ->where('id',$id)            
			->first();
	return [
		'data' => $undangan
	];

})->name('ajax_get_up');

Route::get('/get_up_detail/{id}', function ($id)
{
	$show = DB::table('undangan')
            ->where('id',$id)            
			->first();
	return [
		'data' => $show
	];
})->name('ajax_get_up_detail');

// Ajak Undangan Keluarga
Route::get('/get_uk/{id}', function ($id)
{
	$undangan_k = DB::table('undangan_k')
            ->where('id',$id)            
			->first();
	return [
		'data' => $undangan_k
	];

})->name('ajax_get_uk');

Route::get('/get_uk_detail/{id}', function ($id)
{
	$show = DB::table('undangan_k')
            ->where('id',$id)            
			->first();
	return [
		'data' => $show
	];
})->name('ajax_get_uk_detail');

// Ajak Pengeluaran
Route::get('/get_pe/{id}', function ($id)
{
	$pe = DB::table('pengeluaran')
            ->where('id_pengeluaran',$id)            
			->first();
	return [
		'data' => $pe
	];

})->name('ajax_get_pe');
