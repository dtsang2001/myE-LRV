<?php 

	Route::get('/product', 'ProductController@list')->name('product');
	Route::get('/add-product', 'ProductController@add')->name('add-product');
	Route::post('/add-product', 'ProductController@create')->name('add-product');
	Route::get('/edit-product/{id}', 'ProductController@edit')->name('edit-product');
	Route::post('/edit-product/{id}', 'ProductController@update')->name('edit-product');
	Route::get('/delete-product/{id}', 'ProductController@delete')->name('delete-product');
	Route::get('/view-product/{id}', 'ProductController@view')->name('view-product');

?>