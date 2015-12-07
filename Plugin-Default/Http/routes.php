<?php

Route::group([
	'namespace' => '-namespace-\Http\Controllers',
	'middleware' => Config::get('-pluginmin-.middleware'),
	], function () {
		Route::controller(Config::get('-pluginmin-.route'), '-Object-Controller', [
			'' => '-pluginmin-.',
	]);
});