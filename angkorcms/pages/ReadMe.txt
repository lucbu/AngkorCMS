
!! This plugin is using JQuery 2.1.3 & Bootstrap 3.3.2 !!
This mean you have to extends the view ('index.php' in 'resources/views/angkorcms/medias') after publishing them with a template using JQuery 2.1.3 & Bootstrap 3.3.2


######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmspages:install"

Register the service provider in 'config/app.php' :
	'AngkorCMS\Pages\AngkorCMSPagesServiceProvider',

Register the facades in 'config/app.php' :
		'AngkorBlade' => 'AngkorCMS\Pages\Facades\AngkorCMSBladeFacade',


######################
#                    #
#        Usage       #
#                    #
######################


To display a blocks of modules, you can use the facade AngkorBlade like below :

	 {!! AngkorBlade::display($block, $parameters, $div, $attributes, $attributesToHtml) !!}

	#########################################################################################
	#											#
	#	$block :									#
	#		The block containing the modules					#
	#											#
	#	$parameters :									#
	#		Array of url parameters each modules					#
	#											#
	#	$div :										#
	#		Boolean for the presence or not af an div around each module		#
	#											#
	#	$attributes :									#
	#		Array of attributes for the div around each modules			#
	#											#
	#	$attributesToHtml :								#
	#		Array of attributes that will be passed to each module			#
	#											#
	#########################################################################################

