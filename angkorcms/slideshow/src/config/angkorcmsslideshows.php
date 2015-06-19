<?php

return array(

	/*
	 * Module's informations
	 */
	'namespace' => 'AngkorCMS\Slideshow',
	'model' => 'AngkorCMSSlides',
	'table' => 'angkorcms_slideshows',
	'repository' => 'AngkorCMS\Slideshow\Repositories\Eloquent\AngkorCMSSlideshowRepository',
	'route' => 'angkorcmsslideshows',
	'makerAjax' => 'angkorcmsslideshows.makerAjax',
	'makerView' => 'angkorcms/slideshow/maker',
	'showView' => 'angkorcms/slideshow/slideshow',

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
	 * The table with the images
	 */
	'lang_table' => 'angkorcms_langs',

	/*
	 * The id of the images
	 */
	'lang_id' => 'id',

	/*
	 * The lang model
	 */
	'lang_model' => 'AngkorCMS\MultiLanguages\AngkorCMSLang',
);