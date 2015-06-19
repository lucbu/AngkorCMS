<?php

Route::group([
	'namespace' => 'AngkorCMS\Medias\Http\Controllers',
	'middleware' => Config::get('angkorcmsmedias.middleware'),
	'prefix' => Config::get('angkorcmsmedias.prefix'),
], function () {

	Route::get('angkorcmsmedias', ['as' => 'angkorcms.medias', 'uses' => 'AngkorCMSMediaController@index']);

	Route::controller('angkorcmsimage', 'AngkorCMSImageController', array(
		'postStoreImageAjax' => 'image.store.ajax',
		'postChangeImageFolderAjax' => 'image.changeFolder.ajax',
		'postDelImageAjax' => 'image.del.ajax',
	));

	Route::controller('angkorcmsfolder', 'AngkorCMSFolderController', [
		'postStoreFolderAjax' => 'folder.store.ajax',
		'postChangeParentFolderAjax' => 'folder.changeParent.ajax',
		'postDelFolderAjax' => 'folder.del.ajax',
		'postOpenFolderAjax' => 'folder.open.ajax',
	]);
});
