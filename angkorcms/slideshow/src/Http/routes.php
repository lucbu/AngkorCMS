<?php

Route::group([
	'namespace' => 'AngkorCMS\Slideshow\Http\Controllers',
	'middleware' => Config::get('angkorcmsslideshows.middleware'),

], function () {
	Route::controller(Config::get('angkorcmsslideshows.route'), 'AngkorCMSSlideshowController', [
		'postAddSlide' => 'angkorcmsslideshows.addSlide.ajax',
		'postSaveOrder' => 'angkorcmsslideshows.saveOrder.ajax',
		'postDelSlide' => 'angkorcmsslideshows.delSlide.ajax',
	]);
});