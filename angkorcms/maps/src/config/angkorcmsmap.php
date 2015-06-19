<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Maps',
	'model' => 'AngkorCMSMap',
	'table' => 'angkorcms_maps',
	'repository' => 'AngkorCMS\Maps\Repositories\Eloquent\AngkorCMSMapRepository',
	'route' => 'angkorcmsmap',
	'makerAjax' => 'angkorcmsmap.makerAjax',
	'makerView' => 'angkorcms/map/maker',
	'showView' => 'angkorcms/map/map',

	/*
	 * What middleware is needed to access this plugin
	 */
	'middleware' => [],

	/*
	 * What prefix will be used to the url accessing this plugin
	 */
	'prefix' => '',
);