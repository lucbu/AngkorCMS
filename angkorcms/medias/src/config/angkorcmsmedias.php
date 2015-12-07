<?php

return array(
	/*
	 * What middleware is needed to access the media manager
	 */
	'middleware' => ['auth', 'admin'],

	/*
	 * What prefix will be used to the url accessing the media manager
	 */
	'prefix' => '',

	/*
	 * Path where images will be uploaded
	 */
	'path' => 'uploads/images',

);