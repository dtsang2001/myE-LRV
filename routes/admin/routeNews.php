<?php 

	Route::get('/news', 'NewsController@list')->name('news');
	Route::get('/add-news', 'NewsController@add')->name('add-news');
	Route::post('/add-news', 'NewsController@create')->name('add-news');
	Route::get('/edit-news/{id}', 'NewsController@edit')->name('edit-news');
	Route::post('/edit-news/{id}', 'NewsController@update')->name('edit-news');
	Route::get('/delete-news/{id}', 'NewsController@delete')->name('delete-news');
	Route::get('/view-news/{id}', 'NewsController@view')->name('view-news');

?>