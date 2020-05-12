<?php 
	Route::get('/full_data', 'DataController@FullData')->name('/full_data'); 
	Route::get('/random_data', 'DataController@RandomData')->name('/random_data'); 

?>