######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmslisting:install"

Register the service provider in 'config/app.php' :
		'AngkorCMS\Listing\AngkorCMSListingServiceProvider',

Register the module nature in 'config/angkorcmsmodules.php' :
		"listing" => "angkorcmslistings",



######################
#                    #
#        Usage       #
#                    #
######################

Attributes available :
	'list-class':
		 To set a class to the ul element.

	'list-item-class':
		 To set a class to each li element.