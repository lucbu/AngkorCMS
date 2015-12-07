<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Content',
	'model' => 'AngkorCMSContent',
	'table' => 'angkorcms_contents',
	'repository' => 'AngkorCMS\Content\Repositories\Eloquent\AngkorCMSContentRepository',
	'route' => 'angkorcmscontent',
	'makerAjax' => 'angkorcmscontent.makerAjax',
	'makerView' => 'angkorcms/content/maker',
	'showView' => 'angkorcms/content/content',

	/*
	 * What middleware is needed to access this plugin
	 */
	'middleware' => ['auth', 'admin'],

	/*
	 * What prefix will be used to the url accessing this plugin
	 */
	'prefix' => '',
);