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
    return view('main');
});

Route::get('/start', 'HomeController@home');

Route::get('/category/{id}', 'CategoriesController@index');

Route::get('/category/{id}/subcategory/create', 'SubcategoriesController@create');
Route::get('/category/{cid}/subcategory/{sid}', 'SubcategoriesController@index');
Route::post('/category/{id}/subcategory/create', 'SubcategoriesController@store');
Route::get('/category/{cid}/subcategory/{sid}/update', 'SubcategoriesController@update');
Route::put('/category/{cid}/subcategory/{sid}', 'SubcategoriesController@put');
Route::delete('/category/{cid}/subcategory/{sid}', 'SubcategoriesController@delete');


Route::get('/category/{cid}/subcategory/{sid}/decks/add', 'DecksController@newDeck');
Route::post('/category/{cid}/subcategory/{sid}/decks/add', 'DecksController@add');

Route::get('/deck/{id}', 'DecksController@index');
Route::get('/deck/{id}/all', 'DecksController@preview');
Route::get('/deck/once/{id}/{l1}/{l2}', 'DecksController@learnOnce');
Route::post('/deck/once/{id}/{l1}/{l2}', 'DecksController@resultOnce');
Route::get('/deck/multi/{id}/{l1}/{l2}', 'DecksController@learnMulti');
Route::post('/deck/multi/{id}/{l1}/{l2}', 'DecksController@resultMulti');
Route::get('/deck/test/{id}', 'DecksController@testKnowledgeStart');
Route::post('/deck/test/{id}', 'DecksController@testKnowledge');
Route::get('/deck/test_pl_en/{id}','DecksController@testKnowledgeStartSingle');
Route::post('/deck/test_pl_en/{id}','DecksController@testKnowledgePlEn');
Route::get('/deck/test_en_pl/{id}','DecksController@testKnowledgeStartSingleEn');
Route::post('/deck/test_en_pl/{id}','DecksController@testKnowledgeEnPl');
Route::get('/deck/{id}/edit', 'DecksController@edit');
Route::put('/deck/{id}', 'DecksController@update');
Route::delete('/deck/{id}', 'DecksController@delete');

Route::get('/results', 'ResultsController@index')->name('results');

Auth::routes();

Route::get('/panel', function() {
	return view('/adminpanel');
})->middleware('auth','1');

Route::get('/dbusers', 'AdminController@index')->name('dbusers')->middleware('auth','1');
Route::get('/dbusers/user/{id}', 'AdminController@update')->middleware('auth','1');
Route::put('/dbusers/user/{id}', 'AdminController@put')->middleware('auth','1');
Route::delete('/dbusers/user/{id}', 'AdminController@delete')->middleware('auth','1');

Route::get('/cats', 'CategoriesController@list')->middleware('auth','1');
Route::get('/cats/new/create', 'CategoriesController@create')->middleware('auth','1');
Route::post('/cats/create', 'CategoriesController@store')->middleware('auth','1');
Route::get('/cats/{id}/update', 'CategoriesController@update')->middleware('auth','1');
Route::put('/cats/{id}', 'CategoriesController@put')->middleware('auth','1');
Route::delete('/cats/{id}', 'CategoriesController@delete')->middleware('auth','1');

Route::get('/subs', 'SubcategoriesController@list')->middleware('auth','1');
Route::get('/subs/{id}/create', 'SubcategoriesController@create')->middleware('auth','1');
Route::get('/subs/{cid}/subcategory/{sid}/update', 'SubcategoriesController@update')->middleware('auth','1');
Route::post('/subs/{id}/create', 'SubcategoriesController@store')->middleware('auth','1');
Route::put('/subs/{cid}/subcategory/{sid}', 'SubcategoriesController@put')->middleware('auth','1');
Route::delete('/subs/{cid}/subcategory/{sid}', 'SubcategoriesController@delete')->middleware('auth','1');

Route::get('/sets', 'DecksController@list')->middleware('auth','1');
Route::get('/sets/{id}/edit', 'DecksController@edit')->middleware('auth','1');
Route::put('/sets/{id}', 'DecksController@update')->middleware('auth','1');

Route::get('/sets/{cid}/subcategory/{sid}/add', 'DecksController@newDeck')->middleware('auth','1');
Route::post('/sets/{cid}/subcategory/{sid}/add', 'DecksController@add')->middleware('auth','1');
Route::delete('/sets/{id}', 'DecksController@delete')->middleware('auth','1');







