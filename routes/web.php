<?php

Route::get('/{slug}', 'PageController@show');
Route::post('/{slug}', 'PageController@buy');

Route::get('confirmation/{id}', 'ConfirmationController@show');

Route::any('{all}', 'PageController@random')->where(['all' => '.*']);