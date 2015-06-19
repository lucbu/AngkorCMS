!! This plugin is using JQuery 2.1.3 & Bootstrap 3.3.2 !!


######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmsslideshow:install"

Register the service provider in 'config/app.php' :
	'AngkorCMS\Medias\AngkorCMSSlideshowServiceProvider',

Add this line in $routeMiddleware in 'kernel.php' : 
	'angkorcmsslideshow' => 'AngkorCMS\Medias\Http\Middleware\AngkorCMSSlideshow',



######################
#                    #
#        USAGE       #
#                    #
######################

Config file 'angkorcmsslideshow.php':

	- You can add the middleware you want to restrict the access to some users.

You can pass some attributes to the view :
	'slideshow-indicator' => Boolean to show or not the indicators on the slideshow (By default it's true)
	'slideshow-height' => String to choose the height of the slideshow
	'slideshow-width' => String to choose the width of the slideshow
	'slideshow-interval' => Integer number of milliseconde between slides