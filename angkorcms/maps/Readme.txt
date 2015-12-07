######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmsmap:install"

Register the service provider in 'config/app.php' :
		'AngkorCMS\Maps\AngkorCMSMapsServiceProvider',

Register the module nature in 'config/angkorcmsmodules.php' :
		"map" => "angkorcmsmap",



######################
#                    #
#        Usage       #
#                    #
######################


Attributes available :
	'map-height':
		 To set the height of the map.

	'map-width':
		 To set the max-width of the map.