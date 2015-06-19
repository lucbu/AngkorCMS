<?php

Route::group([
	'namespace' => 'AngkorCMS\Content\Http\Controllers',
	'middleware' => Config::get('angkorcmscontent.middleware'),

], function () {
	Route::controller(Config::get('angkorcmscontent.route'), 'AngkorCMSContentController', [
		'postUpdateContent' => 'angkorcmscontent.updateContent',
	]);
});