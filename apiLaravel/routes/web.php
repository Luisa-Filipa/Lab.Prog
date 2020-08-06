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

Route::get('/login', function () {
    return view('login');
});



Route::get('/register', function () {
    return view('register');
});


Route::get('/contactos', function () {
    return view('contactos');
});

Auth::routes();

Route::get('/logout', 'LogoutController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/books/','BooksController@index')->name('books');
Route::get('/livrosrequesitados/','RequesitadoController@index')->name('pedido');
Route::get('/todosrequesitados/','RequesitadoController@indexadmin')->name('pedidoadmin');
Route::get('/booksearch/', 'BooksController@booksredirect')->name('bookredirect');
Route::get('/addbook', 'BooksController@create')->name('createbook');

Route::get('/download', 'PDFController@save')->name('booksavepdf');
Route::get('/view', 'PDFController@open')->name('bookopenpdf');
Route::get('/send', 'PDFController@send')->name('booksendpdf');

Route::get('/devolver/{id}', 'DevolvidoController@redirect');
Route::get('/deletebook/{id}', 'BooksController@redirect');
Route::get('/requesitar/{id}', 'RequesitadoController@redirect');


Route::post('/requesitar/{id}', 'RequesitadoController@edit')->name('requesitar');
Route::post('/devolver/{id}', 'DevolvidoController@edit')->name('devolver');
Route::post('/addbook', 'BooksController@insert')->name('addbook');

Route::delete('/deletebook/{id}', 'BooksController@delete')->name('deletebook');
