
!! This plugin is using JQuery 2.1.3 & Bootstrap 3.3.2 !!
This mean you have to extends the view ('index.php' in 'resources/views/angkorcms/medias') after publishing them with a template using JQuery 2.1.3 & Bootstrap 3.3.2


######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan amgkormedias:install"

Register the service provider in 'config/app.php' :
	'AngkorCMS\Medias\AngkorCMSMediasServiceProvider',

Add this line in $routeMiddleware in 'kernel.php' : 
	'angkorcmsajax' => 'AngkorCMS\Medias\Http\Middleware\AngkorCMSAjax',



######################
#                    #
#        Usage       #
#                    #
######################


The route name to access the media manager is 'angkorcms.medias.index'

Config file 'angkorcmsmedias.php':

	- You can add the middleware you want to restrict the access to some users.

	- The path where files are uploaded.

	- The link to the media manager.