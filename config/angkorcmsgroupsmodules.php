<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Pages',
	'model' => 'AngkorCMSGroupModule',
	'table' => 'angkorcms_groupsmodules',
	'repository' => 'AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSGroupModuleRepository',
	'route' => 'angkorcmsgroupsmodules',
	'makerAjax' => 'angkorcmsgroupsmodules.makerAjax',
	'makerView' => 'angkorcms/pages/groupsmodules/maker',
	'showView' => 'angkorcms/pages/groupsmodules/show',
	'showDiv' => false,

	/*
	 * What middleware is needed to access this plugin
	 */
	'middleware' => [],

	/*
	 * What prefix will be used to the url accessing this plugin
	 */
	'prefix' => '',
);