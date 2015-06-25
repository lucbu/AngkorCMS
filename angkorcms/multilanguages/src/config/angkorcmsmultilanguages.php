<?php

return array(
	/*
	 * What middleware is needed to access multilanguages manager
	 */
	'middleware' => ['auth', 'admin'],

	/*
	 * The table with the images
	 */
	'image_table' => 'angkorcms_images',

	/*
	 * The id of the images
	 */
	'image_id' => 'id',

	/*
	 * The model
	 */
	'image_model' => 'AngkorCMS\Medias\AngkorCMSImage',

	/*
	 * List of languages used in application
	 */
	'languages' => ['fr', 'en'],

	/*
	 * List of languages used in application
	 */
	'default_language' => 'en',

);