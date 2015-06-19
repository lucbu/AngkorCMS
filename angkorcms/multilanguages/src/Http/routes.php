<?php

Route::group([
	'namespace' => 'AngkorCMS\MultiLanguages\Http\Controllers',
	'middleware' => Config::get('angkorcmsmultilanguages.middleware'),
], function () {
	Route::resource('angkorcmslang', 'AngkorCMSLangController', ['except' => ['show']]);
	Route::get('changelang/{code}', ['as' => 'changelang', 'uses' => 'AngkorCMSLangController@changeLang']);
});