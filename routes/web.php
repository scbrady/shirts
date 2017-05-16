<?php

Route::get('/{slug}', 'PageController@show');
Route::post('/{slug}', 'PageController@buy');
