<?php

Route::group([
	'namespace' => 'AngkorCMS\Maps\Http\Controllers',
	'middleware' => Config::get('angkorcmsmap.middleware'),

], function () {
	Route::controller(Config::get('angkorcmsmap.route'), 'AngkorCMSMapController', [
		'postUpdateMap' => 'angkorcmsmap.updateMap',
	]);
});