######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmscontent:install"

Register the service provider in 'config/app.php' :
		'AngkorCMS\Content\AngkorCMSContentServiceProvider',

Register the module nature in 'config/angkorcmsmodules.php' :
		"content" => "angkorcmscontent",



######################
#                    #
#        Usage       #
#                    #
######################

This module will show exactly what have been written in the textarea of the edit page