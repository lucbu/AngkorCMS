<?php

Route::group([
	'namespace' => 'AngkorCMS\News\Http\Controllers',
	'middleware' => Config::get('angkorcmsnews.middleware'),
	'prefix' => Config::get('angkorcmsnews.prefix'),
], function () {
	Route::resource('angkorcmsnews', 'AngkorCMSPostController');
	Route::get('angkorcmsnews/tag/{tag}', ['uses' => 'AngkorCMSPostController@getTag', 'as' => 'angkorcmsnews.tag']);
});

Route::group([
	'namespace' => 'AngkorCMS\News\Http\Controllers',
	'middleware' => ['auth'],
], function () {
	Route::controller('angkorcmscomment', 'AngkorCMSCommentController', [
		'postComment' => 'angkorcmscomment.add',
		'deleteComment' => 'angkorcmscomment.del',
	]);
});
