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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/member', 'Auth\LoginController@showMemberLoginForm')->name('login.member');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/member', 'Auth\LoginController@memberLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
// Route::post('/register/writer', 'Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/member', 'member');

Route::resource('/datatables', 'BookController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);

Route::resource('/books', 'BookController');


Route::get('/bookview', 'BookController@anyData');

Route::get('/deleteBook/{book}', 'BookController@deleteBook')->name('bookss.delete');

Route::get('/anyData', 'BookController@anyData')->name('datatables.data');

Route::get('/adminLogout', 'Auth\LoginController@AdminLogout')->name('admin.logout');
Route::get('/memberLogout', 'Auth\LoginController@MemberLogout')->name('member.logout');
