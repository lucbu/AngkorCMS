<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Users',
	'model' => '',
	'table' => '',
	'repository' => 'AngkorCMS\Users\Repositories\Eloquent\AngkorCMSUserRepository',
	'route' => 'angkorcmsusers',

	/*
	 * What middleware is needed to access this plugin
	 */
	'middleware' => ['auth', 'admin'],

	/*
	 * What prefix will be used to the url accessing this plugin
	 */
	'prefix' => '',
);