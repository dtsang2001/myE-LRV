<?php 

	Route::get('/user', 'UserController@list')->name('user');
	Route::get('/add-user', 'UserController@add')->name('add-user');
	Route::post('/add-user', 'UserController@create')->name('add-user');
	Route::get('/edit-user', 'UserController@edit')->name('edit-user');
	Route::get('/delete-user', 'UserController@delete')->name('delete-user');

	Route::get('/view-user/{id}', 'UserController@view')->name('view-user');
	Route::post('/view-user/{id}', 'UserController@upload_avatar')->name('upload-avatar-user');
	
?>