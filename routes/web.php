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
//     return view('pocetna');
// });

Route::group(['middleware' => ['auth', 'nastavnik']], function(){
	//Route::resource('/novosti','NovostiController');
	Route::post('/novosti', ['uses' => 'NovostiController@store', 'as' => 'novosti.store']);
	Route::get('/novosti/create', ['uses' => 'NovostiController@create', 'as' => 'novosti.create']);
	Route::delete('/novosti/{novosti}', ['uses' => 'NovostiController@destroy', 'as' => 'novosti.destroy']);
	Route::put('/novosti/{novosti}', ['uses' => 'NovostiController@update', 'as' => 'novosti.update']);
	Route::get('/novosti/{novosti}/edit', ['uses' => 'NovostiController@edit', 'as' => 'novosti.edit']);

	Route::resource('/vraboteni', 'VraboteniController');

	Route::get('/gallery', ['uses' => 'GalleryController@index', 'as' => 'gallery.index']);
	Route::post('/gallery', ['uses' => 'GalleryController@store', 'as' => 'gallery.store']);
	Route::delete('/gallery/{id}', ['uses' => 'GalleryController@delete', 'as' => 'gallery.delete']);


	Route::get('/misc', ['uses' => 'PagesController@misc', 'as' => 'pages.misc']);
	Route::post('/zanas/storetekst', ['uses' => 'PagesController@store_zanas_tekst', 'as' => 'zanas.storetekst']);
	Route::post('/zanas/storeslika', ['uses' => 'PagesController@store_zanas_slika', 'as' => 'zanas.storeslika']);
	Route::post('/raspored', 'PagesController@set_raspored');

});

Route::group(['middleware' => ['auth', 'administrator']], function(){
	Route::get('/korisnici', ['uses' => 'UserController@index', 'as' => 'admin.users']);
	Route::post('/korisnici/{id}/chmod', ['uses' => 'UserController@update_permissions', 'as' => 'user.chmod']);
	Route::delete('/korisnici/{id}/delete', ['uses' => 'UserController@destroy', 'as' => 'users.delete']);
});

Route::get('/', 'PagesController@gethome');
Route::get('/novosti/{novosti}', ['uses' => 'NovostiController@show', 'as' => 'novosti.show']);
Route::get('/zanas', 'PagesController@getAbout');
Route::get('/novosti', 'NovostiController@index');
Route::get('/contact','PagesController@getContact');
Route::post('/contact', 'PagesController@send_contact_mail');
Route::get('/raspored', 'PagesController@get_raspored');

Auth::routes();

Route::get('/home', 'PagesController@gethome');
