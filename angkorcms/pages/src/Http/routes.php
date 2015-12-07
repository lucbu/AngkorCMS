<?php

Route::group([
	'namespace' => 'AngkorCMS\Pages\Http\Controllers',
	'middleware' => Config::get('angkorcmspages.middleware'),
	'prefix' => Config::get('angkorcmspages.prefix'),
], function () {
	//Page/Module management
	Route::resource('angkorcmspages', 'AngkorCMSPageController', ['except' => ['show']]);
	Route::resource('angkorcmspages.angkorcmspagestrans', 'AngkorCMSPageTransController', ['except' => ['show']]);
	Route::controller('angkorcmspagestrans', 'AngkorCMSPageTransController', [
		'postAddModuleAjax' => 'angkorcmspagestrans.addModule.ajax',
		'postSaveOrderAjax' => 'angkorcmspagestrans.saveOrder.ajax',
		'postDelModuleAjax' => 'angkorcmspagestrans.delModule.ajax',
	]);
	Route::resource('angkorcmsmodules', 'AngkorCMSModuleController', ['except' => ['show']]);

	//Template management
	Route::resource('angkorcmstemplates', 'AngkorCMSTemplateController', ['except' => ['show']]);
	Route::resource('angkorcmstemplates.angkorcmsthemes', 'AngkorCMSThemeController', ['except' => ['show']]);
	Route::controller('angkorcmsblocks', 'AngkorCMSBlockController', [
		'postAddBlockAjax' => 'angkorcmsblocks.addBlock.ajax',
		'postDelBlockAjax' => 'angkorcmsblocks.delBlock.ajax',
	]);

	Route::controller(Config::get('angkorcmsgroupsmodules.route'), 'AngkorCMSGroupModuleController', [
		'postAddModule' => 'angkorcmsgroupsmodules.addModule.ajax',
		'postSaveOrder' => 'angkorcmsgroupsmodules.saveOrder.ajax',
		'postDelModule' => 'angkorcmsgroupsmodules.delModule.ajax',
	]);
});
