<?php

Route::group(['middleware' => ['installation']], function () {
	Route::get('install', ['as' => 'install', function () {
		return view('install/install');
	}]);
	Route::post('create-env', ['as' => 'create-env', function () {
		return view('install/create-env');
	}]);
	Route::get('install-db', ['as' => 'install-db', function () {
		return view('install/install-db');
	}]);
});

Route::get('/hello/{macroute?}', ['middleware' => ['auth', 'admin'], function ($macroute = 'bla') {
	return view('test', ['user' => $macroute]);
}]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::controller('/', 'AdminController', [
		'getIndex' => 'admin.index',
	]);
});

Route::get('/testing', 'FrontController@test');

Route::group(['middleware' => ['angkorcmslanguage']], function () {
	$languages = Config::get('angkorcmsmultilanguages.languages'); // A changer
	$prefix = null;
	if (in_array(Request::segment(1), $languages)) {
		$prefix = Request::segment(1);
	}

	Route::group(['prefix' => $prefix], function () {
		Route::get('/{slug}', 'FrontController@index');
		Route::get('/{slug}/{parameters}', 'FrontController@indexWithParameters')->where('parameters', '(.*)');
		Route::get('/', ['uses' => 'FrontController@byDefault', 'as' => 'home']);
	});
});