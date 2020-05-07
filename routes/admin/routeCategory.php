<?php 

	Route::get('/category', 'CategoryController@list')->name('category');
	Route::get('/add-category', 'CategoryController@add')->name('add-category');
	Route::post('/add-category', 'CategoryController@create')->name('add-category');
	Route::get('/edit-category/{id}', 'CategoryController@edit')->name('edit-category');
	Route::post('/edit-category/{id}', 'CategoryController@update')->name('edit-category');
	Route::get('/delete-category/{id}', 'CategoryController@delete')->name('delete-category');
	
?>