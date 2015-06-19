!! This plugin is using JQuery 2.1.3 & Bootstrap 3.3.2 !!


######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmsmultilanguages:install"

Register the service provider in 'config/app.php' :
	'AngkorCMS\MultiLanguages\AngkorCMSLanguagesServiceProvider',

Add this line in $routeMiddleware in 'kernel.php' : 
	'angkorcmslanguage' => 'AngkorCMS\MultiLanguages\Http\Middleware\AngkorCMSLanguage',

Register the module nature in 'config/angkorcmsmodules.php' :
		"changelang" => "angkorcmschangelang",


######################
#                    #
#        USAGE       #
#                    #
######################

The change-lang module :
	
	Attributes available :
		'lang-class':
			 To set a class to the div element surrounding the changelang links.
		'lang-img':
			 To set or not the image in the changelang link (true by default).


######################
#                    #
#       PLUGIN       #
#                    #
######################

When you add a route, add it in the config file ('config/angkorcmsmultilanguages.php') and on the web interface, 
for the code, please use the standard ISO 639-1 (http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes)

To use the multilanguages system, you'll have to set the route that can be accessed in several languages under the middleware 'angkorcmslanguage'.

To change languages, use the view 'changelang.blade.php', pass it the list of the lang you want to display with one of the forms : 
	- 'langs' => {'1' => { code, image => { path, filename, extension } }, ... }
	- 'langs' => {'1' => { code }, ... }

The route name to access the media manager is 'angkorcmslang.index'

Config file 'angkorcmslanguage.php':

	- You can add the middleware you want to restrict the access to some users.
	- You can choose the default language and the list of language.