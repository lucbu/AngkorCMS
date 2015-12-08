<?php

return array(

	/*
	 * What middleware is needed to access the module manager
	 */
	'middleware' => ['auth', 'admin'],

	/*
	 * What prefix will be used to the url accessing the module manager
	 */
	'prefix' => '',

	/*
	 * List of differents types of modules installed
	 * Add it this way : "nature" => "configfile.php" (ex: "slideshow" => "angkorcmsslideshow")
	 */
	'natures' => [
		"slideshow" => "angkorcmsslideshows",
		"listing" => "angkorcmslistings",
		"content" => "angkorcmscontent",
		"map" => "angkorcmsmap",
		"groupmodules" => "angkorcmsgroupsmodules",
		"login" => "angkorcmslogin",
		"profile" => "angkorcmsprofile",
		"changelang" => "angkorcmschangelang",
		"news" => "angkorcmsnewsmodule",
	],

);
