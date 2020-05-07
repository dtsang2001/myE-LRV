<?php 

	Route::get('/category-news', 'CategoryNewsController@list')->name('category-news');
	Route::get('/add-category-news', 'CategoryNewsController@add')->name('add-category-news');
	Route::post('/add-category-news', 'CategoryNewsController@create')->name('add-category-news');
	Route::get('/edit-category-news/{id}', 'CategoryNewsController@edit')->name('edit-category-news');
	Route::post('/edit-category-news/{id}', 'CategoryNewsController@update')->name('edit-category-news');
	Route::get('/delete-category-news/{id}', 'CategoryNewsController@delete')->name('delete-category-news');

?>