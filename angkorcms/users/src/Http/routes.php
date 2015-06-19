<?php

Route::group([
	'namespace' => 'AngkorCMS\Users\Http\Controllers',
	'middleware' => Config::get('angkorcmsusers.middleware'),

], function () {
	Route::resource('angkorcmsusers', 'AngkorCMSUsersController');
});