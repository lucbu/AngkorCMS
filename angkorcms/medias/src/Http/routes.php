<?php

Route::group([
	'namespace' => 'AngkorCMS\Medias\Http\Controllers',
	'middleware' => Config::get('angkorcmsmedias.middleware'),
	'prefix' => Config::get('angkorcmsmedias.prefix'),
], function () {

	Route::get('angkorcmsmedias', ['as' => 'angkorcms.medias', 'uses' => 'AngkorCMSMediaController@index']);

	Route::controller('angkorcmsimage', 'AngkorCMSImageController', array(
		'postImageAjax' => 'image.store.ajax',
		'putImageFolderAjax' => 'image.changeFolder.ajax',
		'deleteImageAjax' => 'image.delete.ajax',
	));

	Route::controller('angkorcmsfolder', 'AngkorCMSFolderController', [
		'postFolderAjax' => 'folder.store.ajax',
		'putParentFolderAjax' => 'folder.changeParent.ajax',
		'deleteFolderAjax' => 'folder.delete.ajax',
		'postOpenFolderAjax' => 'folder.open.ajax',
	]);
});
