<?php

Route::group([
	'namespace' => 'AngkorCMS\Listing\Http\Controllers',
	'middleware' => Config::get('angkorcmslistings.middleware'),

], function () {
	Route::controller(Config::get('angkorcmslistings.route'), 'AngkorCMSListController', [
		'postAddListItem' => 'angkorcmslistings.addListItem.ajax',
		'postSaveOrder' => 'angkorcmslistings.saveOrder.ajax',
		'postDelListItem' => 'angkorcmslistings.delListItem.ajax',
	]);
});