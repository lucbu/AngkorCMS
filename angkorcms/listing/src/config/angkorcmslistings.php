<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Listing',
	'model' => 'AngkorCMSList',
	'table' => 'angkorcms_lists',
	'repository' => 'AngkorCMS\Listing\Repositories\Eloquent\AngkorCMSListRepository',
	'route' => 'angkorcmslistings',
	'makerView' => 'angkorcms/listing/maker',
	'showView' => 'angkorcms/listing/list',

	/*
	 * What middleware is needed to access the media manager
	 */
	'middleware' => [],

	/*
	 * What prefix will be used to the url accessing the media manager
	 */
	'prefix' => '',

	/*
	 * Path where images will be uploaded
	 */
	'path' => 'uploads/images',

	/*
	 * The table with the images
	 */
	'image_table' => 'angkorcms_images',

	/*
	 * The id of the images
	 */
	'image_id' => 'id',

	/*
	 * The image model
	 */
	'image_model' => 'AngkorCMS\Medias\AngkorCMSImage',

	/*
	 * The table with the langs
	 */
	'lang_table' => 'angkorcms_langs',

	/*
	 * The id of the langs
	 */
	'lang_id' => 'id',

	/*
	 * The lang model
	 */
	'lang_model' => 'AngkorCMS\MultiLanguages\AngkorCMSLang',
);